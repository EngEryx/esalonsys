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
        return redirect()->route('frontend.booking.view-pay', $booking);
    }

    public function viewBooking(Booking $booking)
    {

        return view('booking-view-pay', compact('booking'));
    }

    public function AddToCart(SalonItem $salonitem, Request $request)
    {
        $cart_name = 'customer_cart'.auth()->user()->id;
        if(session()->exists($cart_name)){
            $cart_items = session()->get($cart_name);
            $exists = false;
            foreach ($cart_items as $k => $cart_item){
                if($cart_item['id']==$salonitem->id){
                    $cart_item['quantity'] = ((int)$cart_item['quantity'] + (int)$request->quantity);
                    $exists = true;
                    array_forget($cart_items,$k);
                    array_push($cart_items, $cart_item);
                }
            }
            if(!$exists){
                array_push($cart_items,[
                    'id' => $salonitem->id,
                    'type' => $salonitem->item_type,
                    'item' => $salonitem,
                    'quantity' => $request->quantity
                ]);
            }
//            session()->forget($cart_name);
            session()->put($cart_name, $cart_items);
//            return response()->json($cart_items);
        }else{
            $cart_items = [];
            array_push($cart_items,[
                'id' => $salonitem->id,
                'type' => $salonitem->item_type,
                'item' => $salonitem,
                'quantity' => $request->quantity
            ]);
            session()->put($cart_name, $cart_items);
        }
        session()->flash('status',"Item added to cart");
//        return response()->json($cart_items);

        return redirect()->route('frontend.booking.view-cart');
    }

    public function ViewCart()
    {
        return view('view-cart');
    }

    public function CheckoutCart()
    {
        $cart_items = session()->get('customer_cart'.auth()->user()->id);
        if($cart_items == null)
            return redirect()->back();

        $tcost = 0; $qty=0;

        foreach ($cart_items as $k => $cart_item){
            $qty += $cart_item['quantity'];
            $tcost += (int)$cart_item['quantity'] * (int) $cart_item['item']->price;
        }

        $data = [
            'user_id' => auth()->user()->id,
            'items' => $cart_items,
            'quantity' => $qty,
            'total_cost' => $tcost,
            'amount' => $tcost,
            'status' => 0
        ];

        $booking = Booking::create($data);

        session()->flash("Your order has been processed.");

        session()->forget('customer_cart'.auth()->user()->id);

        return view('booking-view-pay', compact('booking'));
    }

    public function editServiceDate(Booking $booking, Request $request)
    {
        $booking->service_date = $request->service_date;
        $booking->save();

        return response()->json(['success' => true]);
    }
}
