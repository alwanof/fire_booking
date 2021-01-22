<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Rinvex\Bookings\Models\BookableBooking;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Multitenantable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password', 'avatar','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function UserModels()
    {
      return $this->hasMany(UserModel::class);
    }
    public function Categories()
    {
      return $this->hasMany(Category::class);
    }
    public function Bookings (){
        return $this->hasMany(Booking::class);
    }
    public function Settings (){
        return $this->hasMany(Setting::class);
    }

    public function CustomFields(){
        return $this->hasMany(CustomField::class);
    }
    public function Services () {
        return $this->hasMany(Service::class);
    }
    public function GetAvilableConfig()
    {
        return $this->roles->first()->configurations()->get();
    }
}
