<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleConfiguration extends Model
{
    
    public function Configuration()
    {
            return $this->belongsTo(Configuration::class);
        
    }
}
