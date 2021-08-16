<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Booking extends Model
{
    //
    use Notifiable;

    protected $table="bookings";
    public $timestamps=true;

    protected $dates = ['from_date','to_date'];
}
