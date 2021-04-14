<?php

use Illuminate\Database\Seeder;

class HomesTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Home::class, 4)->create();
    }
}
