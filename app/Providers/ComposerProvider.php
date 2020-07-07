<?php

namespace App\Providers;

use App\Product;
use Illuminate\Support\Facades\Validator;
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
        Validator::extendDependent('maxquantity', function ($attribute, $value, $parameters, $validator) {
            return $value <= Product::find(data_get($validator->getData(), $parameters[0]))->quantity;
        });

        Validator::replacer('maxquantity', function ($message, $attribute, $rule, $parameters) {
            return "The number of products is too high.";
        });

    
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
