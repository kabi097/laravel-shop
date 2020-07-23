<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/{category?}', 'HomeController@products')->name('products');
Route::get('/product/{product?}', 'HomeController@product')->name('product');
Route::get('/summary', 'HomeController@summary')->name('summary');
Route::post('/add_to_cart', 'HomeController@add_to_cart')->name('add_to_cart');
Route::post('/checkout', 'HomeController@checkout')->name('checkout');

Route::get('refresh-csrf', function(){
    return csrf_token();
});