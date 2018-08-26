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
        return '<a href="'.route('frontend.booking.new-confirm', $this).'" class="btn btn-success btn-xs book-btn"> Checkout Item</a>';
    }

    public function getDeleteBtnAttribute()
    {
        return '<a href="#" onclick="deleteSalonItem('.$this->id.',\''.route("admin.products.delete", $this).'\')" class="btn btn-danger btn-xs book-btn"> Delete </a>';
    }

    public function getEditItemAttribute()
    {
        return '<a href="'.route('admin.products.edit', $this).'" class="btn btn-primary btn-xs"> Edit </a>';
    }

    public function getActionButtonsAttribute()
    {
        return $this->getEditItemAttribute()
            .$this->getDeleteBtnAttribute();
    }
}
