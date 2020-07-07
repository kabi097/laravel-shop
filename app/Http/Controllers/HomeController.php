<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
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
        $products = Product::all()->take(6);


        return view('index', ['products' => $products]);
    }

    public function products(Category $category = null) {
        $products = $category==null ? Product::paginate(20) : Product::where(['category_id' => $category->id])->paginate(20);

        return view('products', ['products' => $products, 'category' => $category]);
    }

    public function product(Product $product) {
        return view('product', ['product' => $product]);
    }

    public function summary() {
        return view('summary');
    }

    public function submit_cart(Request $request) {
        $this->session()->put('cart', $request->post());
        
        return $this->session()->get();
    }

    public function add_to_cart(Request $request) {
        // $request->session()->flush();
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
        return view('cart');
    }
}
