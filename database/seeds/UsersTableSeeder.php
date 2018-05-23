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
        factory(\App\User::class)->create([
            'name' => 'Aparicio Serrano',
            'username' => 'aparicio',
            'password' => Hash::make('centro'),
            'level' => 4,
            'store_id' => 2
        ]);
    }
}
