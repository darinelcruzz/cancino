<?php

use Illuminate\Database\Seeder;

class MaintenancesTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Maintenance::class, 10)->create();
    }
}
