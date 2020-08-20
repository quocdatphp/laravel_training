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

Route::get('/', function () {
	return view('welcome');
});

Route::get('product', 'ProductController@index');

Route::get('product/them-san-pham/{id}', 'ProductController@addToCart')->name('addToCart');

Route::get('product/xem-san-pham', 'ProductController@showCart')->name('showCart');

Route::get('product/cap-nhat-san-pham', 'ProductController@updateCart')->name('updateCart');

Route::get('product/Xoa-san-pham', 'ProductController@deleteCart')->name('deleteCart');