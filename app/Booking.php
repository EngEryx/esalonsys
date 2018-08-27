<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    protected $casts = [
        'items' => 'array'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class,'booking_id','id');
    }
//    public function salonitem()
//    {
//        return $this->hasOne(SalonItem::class,'id','salon_item_id');
//    }

    public function customer()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getCustomerNameAttribute()
    {
        return $this->customer->name;
    }

//    public function getSalonitemNameAttribute()
//    {
//        return $this->salonitem->name;
//    }
//
//    public function getPriceTextAttribute()
//    {
//        return $this->salonitem->price_text;
//    }

    public function getStatusTextAttribute()
    {
        switch ($this->status){
            case 1:
                return "Paid";
            case 0:
                return "Un-Paid";
        }
        return '';
    }

    public function getViewUrlAttribute()
    {
        return route('frontend.booking.view-pay', $this);
    }

    public function getBookingNameAttribute()
    {
        return $this->id.' '.$this->salonitem_name;
    }
}
