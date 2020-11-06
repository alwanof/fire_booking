<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;
use Rinvex\Bookings\Traits\Bookable;
class UserModel extends Model
{
  use Multitenantable;


  public function User()
  {
    return $this->belongsTo(User::class);
  }
  public function Category()
  {
    return $this->belongsTo(Category::class);
  }
  public function Services()
  {
    return $this->hasMany(Service::class);
  }
}
