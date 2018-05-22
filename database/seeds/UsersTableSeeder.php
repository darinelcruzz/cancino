<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Lab 3',
            'username' => 'lab3',
            'password' => Hash::make('helefante'),
            'level' => 1,
            'store' => 1,
        ]);
    }
}
