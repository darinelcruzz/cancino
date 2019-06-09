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
        $this->call(ExpensesTableSeeder::class);
        $this->call(EmployersTableSeeder::class);
        $this->call(MaintenancesTableSeeder::class);
    }
}
