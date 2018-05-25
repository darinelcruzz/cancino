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
            'name' => 'Victor Cancino',
            'username' => 'victorj',
            'password' => Hash::make('gaussito'),
            'level' => 1,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Adveel López',
            'username' => 'adveel',
            'password' => Hash::make('tapachula'),
            'level' => 4,
            'store_id' => 4
        ]);
        factory(\App\User::class)->create([
            'name' => 'Jorge Gonzalez',
            'username' => 'jorge',
            'password' => Hash::make('altos'),
            'level' => 4,
            'store_id' => 4
        ]);
    }
}
