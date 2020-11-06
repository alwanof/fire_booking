<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use App\RoleConfiguration;

class Configuration extends Model
{
    
    static function GetRoles()
    {
        return Role::all();
    }
    
    public function Roles()
    {
        return $this->belongsToMany(Role::class,RoleConfiguration::class);
    }
    
}
