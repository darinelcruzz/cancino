<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShoppingsTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
    }
}
