<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: content-type,x-xsrf-token, X-Request-Signature');
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
//Payments
Route::resource('/mnet/sms/gateway', 'GatewayAPI');

Route::get('/', 'IndexController@index')->name('landing');
Route::get('/products', 'IndexController@products');
Route::get('/services', 'IndexController@services');


Route::group(['prefix'=>'admin', 'middleware'=>['auth','admins']],function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('bookings', 'AdminController@bookings')->name('admin.bookings');
    Route::get('customers', 'AdminController@customers')->name('admin.customers');
    Route::get('payments', 'AdminController@payments')->name('admin.payments');
    Route::get('products', 'AdminController@products')->name('admin.products');
    Route::view('products/add-new', 'admin.products-create')->name('admin.products.add');
    Route::post('products/add-save', 'AdminController@saveProduct')->name('admin.products.save');
});

Route::group(['middleware'=>'auth'],function(){
    //Customer dashboard.
    Route::get('/home', 'HomeController@index')->name('home');

    #Booking
    Route::get('/booking/{salonitem}/new', 'BookingController@book')->name('frontend.booking.new');
    Route::get('/booking/{salonitem}/new-confirm', 'BookingController@bookconfirm')->name('frontend.booking.new-confirm');
    Route::get('/booking/{booking}/view/pay', 'BookingController@viewBooking')->name('frontend.booking.view-pay');

});

Auth::routes();

