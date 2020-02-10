<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cart', 'CartController@show')->name('cart');

Route::post('/add-to-cart', 'CartController@add')
    ->name('addToCart');

Route::get('/thank-you', function () {
    return view('thankYou');
})->name('thankYou');

Route::get('/products', 'ProductController@allProducts')
    ->name('products');

Route::get('/payment', 'PayPalController@payment')
    ->name('payment');

Route::get('/cancel', 'PayPalController@cancel')
    ->name('payment.cancel');

Route::get('/payment/success', 'PayPalController@success')
    ->name('payment.success');

Route::get('/category/{categorySlug}', 'CategoryController@show')->name('category');

Route::get('/products/{productSlug}', 'ProductController@showProduct')
    ->name('product');

Route::resource('/admin/products', '/Admin/ProductController');

