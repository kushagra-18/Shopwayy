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


Route::get('/', 'PostController@index')->name('post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::post('/cart', 'CartController@store')->name('cart');

    Route::get('/cartItems', 'CartController@show')->name('cartItems');
    
    
    Route::post('/cartItems', 'CartController@destroy')->name('cartItemsDelete');
    
    Route::get('/cart', 'CartController@index')->name('cartIndex');
    
    Route::get('/checkout/{id}', 'CartController@checkoutCart')->name('checkout');

    Route::post('/confirmOrder', 'UserController@checkoutCartFinal')->name('checkoutFinal');
    
    Route::get('/products/{id}', 'ProductPageController@index')->name('products');
    
    Route::get('/category/{category}', 'PostController@category')->name('category');

    Route::get('/category/{category}', 'PostController@category')->name('category');
    
    Route::get('/category/{category}/{sort}', 'PostController@categorySort')->name('categorySort');

    Route::get('/seller', 'SellerController@index')->name('sellerProduct');

    Route::post('/seller', 'SellerController@addProduct')->name('addProduct');


});


