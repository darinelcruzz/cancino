<?php

use Illuminate\Database\Seeder;

class EmployersTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Employer::class, 1)->create();
    }
}
