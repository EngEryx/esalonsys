<?php

namespace App\Http\Controllers;

use App\Booking;
use App\SalonItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function book(SalonItem $salonitem)
    {
        return view('salonitem-info',compact('salonitem'));
    }

    public function bookconfirm(SalonItem $salonitem)
    {
        $booking = Booking::create([
            'user_id' => auth()->user()->id,
            'salon_item_id' => $salonitem->id,
            'status' => 0
        ]);
        if(!$booking){
            return redirect()->back()->withStatus('Sorry!Could not complete request at the moment.');
        }
        return redirect()->route('home');
    }

    public function viewBooking(Booking $booking)
    {

        return view('booking-view-pay', compact('booking'));
    }
}
