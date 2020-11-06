<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rinvex\Bookings\Traits\HasBookings;
class Customer extends Model
{
    //
    use HasBookings;

    /**
        * Get the booking model name.
        *
        * @return string
        */
       public static function getBookingModel(): string
       {
           return Booking::class;
       }
}
