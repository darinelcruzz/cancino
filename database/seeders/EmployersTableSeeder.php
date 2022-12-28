<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployersTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Employer::class, 1)->create();
    }
}
