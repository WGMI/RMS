<?php

use Illuminate\Support\Facades\Route;
use \Gloudemans\Shoppingcart\facades\Cart;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/menu','MenuController@index')->name('menu');
Route::get('/cart','CartController@index');
Route::post('/cart','CartController@store');
Route::delete('/cart/{product}','CartController@destroy');
Route::patch('/cart/{product}','CartController@update');
Route::post('/checkout','CheckoutController@store');
Route::get('/checkout','CheckoutController@index')->middleware('auth');
//Route::get('/guestcheckout','CheckoutController@index');
Route::get('/payment','PaymentController@index');

Route::get('/test',function(){
	dd(Cart::content());
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');