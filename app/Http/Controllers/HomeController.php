<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
    public function index()
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
}
