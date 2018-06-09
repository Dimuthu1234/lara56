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

// model binding
Route::model('product', 'App\Product');
Route::model('user', 'App\User');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add-to-cart/{id}', [
  'uses' => 'ProductController@getAddToCart',
  'as' => 'product.addToCart'
  ]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
    ]);


Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
    ]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout'
    ]);

Route::resource('/product', 'ProductController', resourceNames('product'))->middleware('auth');
Route::resource('/user', 'UserController', resourceNames('user'))->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
