<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Rinvex\Bookings\Models\BookableBooking;
class Booking extends BookableBooking
{
    protected $table = 'bookable_bookings';

  
}
