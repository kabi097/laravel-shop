<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Validator;

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
        // dd($request);
        // if ($request->getContentType()=='json') {
        //     $data = [ 'data' => $request->json() ];
        //     $validatedData = Validator::make($data, [
        //         'data.*' => 'required|array',
        //         // '*.productId' => 'required|exists:products,id',
        //         // '*.quantity' => 'required|integer|gt:0',
        //     ]);
        // } else {
            $validatedData = $request->validate([
                'productId' => 'required|exists:products,id',
                'quantity' => 'required|integer|gt:0',
            ]);
        // }
        $found = array_search($validatedData['productId'], array_column($cart, 'productId'));
        if ($found === False) {
            $cart[] = $validatedData;   
        } else {
            $cart[$found]['quantity'] += $validatedData['quantity'];
        }
        if ($cart[$found]['quantity'] <= Product::find($request->input('productId'))->quantity) {
            $request->session()->put('cart', $cart);
        }
        return view('cart');
    }
}
