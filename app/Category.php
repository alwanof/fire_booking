<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;
class Category extends Model
{
  use Multitenantable;
    //7
    public function Models()
    {
      return $this->hasMany(UserModel::class);
    }
}
