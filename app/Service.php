<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;
use Rinvex\Bookings\Traits\Bookable;
class Service extends Model
{
  use Multitenantable;
  use Bookable;
    //

    public function Model()
    {
      return $this->belongsTo(UserModel::class);
    }
    public function serviceTimes()
    {
       return $this->hasMany(ServiceTime::class);
    }
    public function Images()
    {
       return $this->hasMany(ServiceImage::class);
    }



      /**
     * Get the booking model name.
     *
     * @return string
     */
    public static function getBookingModel(): string
    {
        return Booking::class;
    }

    /**
     * Get the rate model name.
     *
     * @return string
     */
    public static function getRateModel(): string
    {
        return Rate::class;
    }

    /**
     * Get the availability model name.
     *
     * @return string
     */
    public static function getAvailabilityModel(): string
    {
        return Availability::class;
    }
}
