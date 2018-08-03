<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function salonitem()
    {
        return $this->hasOne(SalonItem::class,'id','salon_item_id');
    }

    public function customer()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getSalonitemNameAttribute()
    {
        return $this->salonitem->name;
    }

    public function getPriceTextAttribute()
    {
        return $this->salonitem->price_text;
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status){
            case 1:
                return "<i class='alert alert-success'>Paid</i>";
            case 0:
                return "<i class='alert alert-danger'>Un-Paid</i>";
        }
        return '';
    }

    public function getViewUrlAttribute()
    {
        return route('frontend.booking.view-pay', $this);
    }
}
