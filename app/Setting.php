<?php

namespace App;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Multitenantable;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Configuration()
    {
            return $this->belongsTo(Configuration::class);
        
    }
}
