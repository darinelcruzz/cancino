<?php

use Illuminate\Database\Seeder;

class ShoppingsTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Shopping::class,10)->create();
    }
}
