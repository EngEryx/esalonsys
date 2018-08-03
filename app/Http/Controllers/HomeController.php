<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::where('user_id',auth()->user()->id)->latest()->get();
        return view('home',compact('bookings'));
    }

    public function payments()
    {
        $payments = Payment::where(['customer_id'=>auth()->user()->id])->latest()->get();
        return view('payments',compact('payments'));
    }
}
