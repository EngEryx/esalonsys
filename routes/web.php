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

Route::get('/', 'IndexController@index');
Route::get('/products', 'IndexController@products');
Route::get('/services', 'IndexController@services');

Route::group(['prefix'=>'admin'],function(){
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('bookings', 'AdminController@bookings');
    Route::get('customers', 'AdminController@customers');
    Route::get('payments', 'AdminController@payments');
    Route::get('products', 'AdminController@products');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
