<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModelImage extends Model
{
  public function UserModel()
  {
    return $this->belongsTo(UserModel::class);
  }
}
