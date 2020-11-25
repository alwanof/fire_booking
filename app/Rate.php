<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function Service(){
        return $this->belongsTo(Service::class);
    }



}
