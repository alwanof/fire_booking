<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //writer role
        $role1 = Role::find(1);
        $user1 =  User::create([
            'name' => Str::random(10),
            'email' => 'writer@gmail.com',
            'password' => Hash::make('password'),
            'avatar'=> asset('/uploads/avatars/'),
        ]);
        $user1->assignRole($role1);
        //admin role
        $role2 = Role::find(2);
        $user2 =  User::create([
            'name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'avatar'=> asset('/uploads/avatars/'),
        ]);
        $user2->assignRole($role2);
            //super admin role
        $role3 = Role::find(3);
        $user3 =  User::create([
            'name' => Str::random(10),
            'email' => 'super-admin@gmail.com',
            'password' => Hash::make('password'),
            'avatar'=> asset('/uploads/avatars/'),
        ]);
        $user3->assignRole($role3);
    }
}
