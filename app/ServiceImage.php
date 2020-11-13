<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
  public function Service()
  {
    return $this->belongsTo(Service::class);
  }
}
