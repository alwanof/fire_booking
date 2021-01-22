<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class AgeGroupDiscount extends Model
{
     use Multitenantable;
}
