<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class CancelPolicy extends Model
{
        use Multitenantable;

    public function Services (){
        return $this->belongsTo(Service::class);
    }
}

