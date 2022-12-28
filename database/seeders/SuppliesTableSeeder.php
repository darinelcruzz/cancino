<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliesTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Supply::class, 50)->create();
    }
}
