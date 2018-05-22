<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Lab 3',
            'username' => 'admin',
            'password' => Hash::make('helefante')
        ]);
    }
}
