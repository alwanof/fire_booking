<?php

namespace App;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use Multitenantable;
}
