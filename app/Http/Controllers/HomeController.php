<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\OrderCompleted;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $lastProducts = Product::all()->take(6);
        $closestProducts = Product::all()->sortByDesc('date')->take(6);
        $featuredProducts = Product::where(['featured' => true])->limit(10)->get();
        return view('index', [
            'title' => 'Strona główna',
            'lastProducts' => $lastProducts,
            'closestProducts' => $closestProducts,
            'featuredProducts' => $featuredProducts
        ]);
    }

    public function products(Category $category = null) {
        $products = $category==null ? Product::paginate(20) : Product::where(['category_id' => $category->id])->paginate(20);

        return view('products', [
            'products' => $products, 
            'category' => $category,
            'title' => ($category) ? 'Produkty - '.$category->name : 'Produkty'
        ]);
    }

    public function product(Product $product) {
        return view('product', [
            'title' => $product->title,
            'product' => $product
        ]);
    }

    public function summary(Request $request) {
        $cart = $request->session()->get('cart');
        if (!$cart) redirect('/');
        return view('summary', [
            'title' => 'Twój koszyk',
            'cart' => $cart
        ]);
    }

    public function add_to_cart(Request $request) {
        // $request->session()->flush();
        if ($request->all() == []) {
            $request->session()->put('cart', []);
            return response()->json([]);
            // return view('cart');
        }

        $cart = $request->session()->get('cart');
        if (!$cart) {
            $cart = [];
        }

        if ($request->getContentType()=='json') {
            $data = [ 'data' => $request->all() ];
        } else {
            $data = [ 'data' => [ $request->all() ] ];
        }

        $validatedData = Validator::make($data, [
            'data.*' => 'required',
            'data.*.productId' => 'required|distinct|exists:products,id',
            'data.*.quantity' => 'required|integer|gt:0|maxquantity:data.*.productId',
        ])->validate();

        if ($request->getContentType()=='json') {
            $cart = $validatedData['data'];
        } else {
            foreach($validatedData['data'] as $product) {
                $found = array_search($product['productId'], array_column($cart, 'productId'));
                if ($found === False) {
                    $cart[] = $product;   
                } else {
                    $productQuantity = Product::find($product['productId'])->quantity;
                    if (($cart[$found]['quantity'] + $product['quantity']) <= $productQuantity) {
                        $cart[$found]['quantity'] += $product['quantity'];
                    } else {
                        $cart[$found]['quantity'] = $productQuantity;
                        // throw ValidationException::withMessages(['quantity' => 'Quantity number is too high!'])
                    }
                }
            }
        }
        $request->session()->put('cart', $cart);
        $cart = session()->get('cart');
        if ($cart) {
            foreach ($cart as $key => $product) {
                $cart[$key]['product'] = Product::find($product['productId'])->only(['title', 'price', 'quantity']);
            }
        }
        return response()->json($cart);
        // return view('cart');
    }

    public function checkout(Request $request) {
        $validatedData = Validator::make($request->all(), [
            'products.*' => 'required|array',
            'products.*.id' => 'required|distinct|exists:products,id',
            'products.*.quantity' => 'required|integer|gt:0|maxquantity:products.*.id',
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'street' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|regex:/^\d{2}-\d{3}$/',
            'phone_number' => 'required',
            'email' => 'required|email',
            'nip' => 'integer',
            'payment' => 'in:card,paypal,payu'
        ])->validate();
        
        $order = new Order($validatedData);
        // $order->payment = $validatedData['payment'];
        $order->user()->associate(auth()->user());
        $order->save();
        foreach($validatedData["products"] as $product) {
            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
            Product::find($product['id'])->decrement('quantity', $product['quantity']);
        }
        $request->session()->put('cart', []);
        $request->session()->flash('success', 'Pomyślnie dokonano zakupu.');
        event(new OrderCompleted($order));
        return redirect('/', 303);
    }
}
