<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Argument extends Model
{
    use Multitenantable;
    //n
    public function User(){
        return $this->belongsTo(User::class);
    }
}
