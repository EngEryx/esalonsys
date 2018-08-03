<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function booking()
    {
        return $this->hasOne(Booking::class,'id','booking_id');
    }
}
