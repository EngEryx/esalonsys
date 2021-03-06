<?php

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;

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
Route::get('/products', 'IndexController@products')->name('index-products');
Route::get('/services', 'IndexController@services')->name('index-services');


Route::group(['prefix'=>'admin', 'middleware'=>['auth','admins']],function(){
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('bookings', 'AdminController@bookings')->name('admin.bookings');
    Route::get('customers', 'AdminController@customers')->name('admin.customers');
    Route::get('payments', 'AdminController@payments')->name('admin.payments');
    Route::get('products', 'AdminController@products')->name('admin.products');
    Route::get('bookings/print', 'AdminController@downloadBookings')->name('admin.print-bookings');
    Route::view('products/add-new', 'admin.products-create')->name('admin.products.add');
    Route::post('products/add-save', 'AdminController@saveProduct')->name('admin.products.save');
    Route::post('products/{salonitem}/delete', 'AdminController@deleteProduct')->name('admin.products.delete');
    Route::get('products/{salonitem}/edit', 'AdminController@editProduct')->name('admin.products.edit');
    Route::post('products/{salonitem}/edit/save', 'AdminController@saveEditProduct')->name('admin.products.edit.save');
    Route::post('/bookings/service/{booking}/date/edit', 'BookingController@editServiceDate')->name('frontend.booking.service-date');

    Route::get('feedback',function(){
        $feedbacks = \App\Feedback::all();
        return view('admin.feedback',compact('feedbacks'));
    });
    Route::get('feedback/print', function(){
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('print.feedback-report')->with([
            'feedbacks' => \App\Feedback::all()
        ]));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        return $dompdf->stream(Carbon::today()->format('d M Y'));
    })->name('admin.print-feedback');

    Route::get('payment/print', function(){
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('print.payment-report')->with([
            'payments' => \App\Payment::all()
        ]));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        return $dompdf->stream(Carbon::today()->format('d M Y'));
    })->name('admin.print-payments');
});

Route::group(['middleware'=>['auth','clients']],function(){

    //Customer dashboard.
    Route::get('/home', 'HomeController@index')->name('home');

    #Booking
    Route::get('/booking/{salonitem}/new', 'BookingController@book')->name('frontend.booking.new');
    Route::post('/booking/{salonitem}/add/cart', 'BookingController@AddToCart')->name('frontend.booking.add-to-cart');
    Route::get('/booking/{salonitem}/new-confirm', 'BookingController@bookconfirm')->name('frontend.booking.new-confirm');
    Route::get('/booking/{booking}/view/pay', 'BookingController@viewBooking')->name('frontend.booking.view-pay');

    Route::view('/new/feedback', 'feedback')->name('feedback');
    Route::post('/feedback/save', 'IndexController@feedback')->name('feedback.save');

    Route::get('/booking/view/cart', 'BookingController@ViewCart')->name('frontend.booking.view-cart');
    Route::get('/booking/checkout/cart', 'BookingController@CheckoutCart')->name('frontend.booking.checkout-cart');

});

Auth::routes();

Route::group(['namespace' => 'Auth'], function(){
    Route::get('registration/{token}/verify', 'RegisterController@verifyUser')->name('user.email.verify');
});

Route::get('/test', function(){
    session()->flash('status',"erterterterttt");
    session()->forget('customer_cart'.auth()->user()->id);
    return redirect('/');
});

