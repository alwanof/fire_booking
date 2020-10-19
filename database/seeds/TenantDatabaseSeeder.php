<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;


class TenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\TenantUsersSeeder::class);
    }
}