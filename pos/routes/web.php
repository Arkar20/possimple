<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\Environment\Runtime;

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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/brand/{brand}', 'CategoryController@findCategory');
Route::get('/addtocart/{item_id}', 'CartController@addtocart')->name(
    'addtocart'
);
Route::put('/addtocart/{item_id}', 'CartController@updateCart')->name(
    'cart.update'
);
Route::post('/addtocart/{item_id}/remove', 'CartController@removeCart')->name(
    'cart.remove'
);
Route::get('/shoppingcart', 'CartController@showCart')
    ->name('cart.view')
    ->middleware('auth');
Route::get('/checkout', 'CartController@showCheckout')
    ->name('cart.checkout')
    ->middleware('auth');
Route::get('/history', 'OrderController@showOrder')
    ->name('history.show')
    ->middleware('auth');
Route::get('/shop', 'ShopController@index')->name('shop');
Route::get('/detail/{id}', 'ShopController@showdetail')->name('detail');
Route::post('/order', 'OrderController@store')->name('order.store');

Route::group(
    ['prefix' => 'auth', 'middleware' => ['auth', 'admin']],
    function () {
        Route::resource('brand', 'BrandController');
        Route::resource('category', 'CategoryController');
        Route::resource('size', 'SizeController');

        Route::get('/item', 'ItemController@index')->name('item.index');
        Route::get('/item/create', 'ItemController@create')->name(
            'item.create'
        );
        Route::post('/item/store', 'ItemController@store')->name('item.store');
        Route::get('/item/{item}/edit', 'ItemController@edit')->name(
            'item.edit'
        );
        Route::patch('/item/{item}/update', 'ItemController@update')->name(
            'item.update'
        );
        Route::delete('/item/{item}', 'ItemController@destroy')->name(
            'item.destroy'
        );
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ClientSiteController@index')->name('home');
