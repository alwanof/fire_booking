<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;
use Rinvex\Bookings\Traits\Bookable;
use App\BookableRate;

class Service extends Model
{
    use Multitenantable;
    use Bookable;

    public function User ()
    {
        return $this->belongsTo(User::class);
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
        return BookableRate::class;
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

    public function UserModel()
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

    public function Rateer()
    {
        return $this->hasMany(Rate::class);
    }

    public function calc()
    {
        $service = $this;
        if ($service->Rateer->count() != 0) {
            $rates5 = $service->Rateer->where('rate', 5)->count();
            $rates4 = $service->Rateer->where('rate', 4)->count();
            $rates3 = $service->Rateer->where('rate', 3)->count();
            $rates2 = $service->Rateer->where('rate', 2)->count();
            $rates1 = $service->Rateer->where('rate', 1)->count();
            $rate = (5 * $rates5 + 4 * $rates4 + 3 * $rates3 + 2 * $rates2 + 1 * $rates1) / ($rates5 + $rates4 + $rates3 + $rates2 + $rates1);
            return (int)$rate;
        } else {
            return 0;
        }
    }

    public function CancelPolicy(){
        return $this->belongsTo(CancelPolicy::class);
    }

    public function getUnitAttribute()
    {
        return 'day';
    }
}
