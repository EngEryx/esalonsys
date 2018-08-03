<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonItem extends Model
{
    protected $guarded = [];

    public function getItemTypeTextAttribute()
    {
        if($this->item_type==1)
            return "Product";
        return "Service";
    }

    public function getPriceTextAttribute()
    {
        return sprintf('%sKsh',$this->price);
    }

    public function getPurchaseUrlAttribute()
    {
        if($this->item_type==2)
            return '<a href="'.route('frontend.booking.new', $this).'" class="btn btn-primary btn-lg book-btn pull-right">Book Now</a>';

        return '<a href="'.route('frontend.booking.new', $this).'" class="btn btn-primary btn-lg book-btn pull-right">Buy Now</a>';
    }

    public function getCheckoutUrlAttribute()
    {
        return '<a href="'.route('frontend.booking.new-confirm', $this).'" class="btn btn-success btn-lg book-btn pull-right">Checkout Item</a>';
    }
}
