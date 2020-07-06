<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\ServiceProvider;

class ComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    public function boot()
    {
        view()->composer('*', function($view)
        {
            $cart = session()->get('cart');
            if ($cart) {
                foreach ($cart as $key => $product) {
                    $cart[$key]['product'] = Product::find($product['productId']);
                }
            }
            $view->with('cart', $cart);
        });
    }
}
