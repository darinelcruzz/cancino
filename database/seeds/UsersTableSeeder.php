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
            'username' => 'victor',
            'password' => Hash::make('victor'),
            'level' => 1,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Aparicio Serrano',
            'username' => 'aparicio',
            'password' => Hash::make('aparicio'),
            'level' => 4,
            'store_id' => 2
        ]);
        factory(\App\User::class)->create([
            'name' => 'Adveel López',
            'username' => 'adveel',
            'password' => Hash::make('adveel'),
            'level' => 4,
            'store_id' => 3
        ]);
        factory(\App\User::class)->create([
            'name' => 'Jorge Gonzalez',
            'username' => 'jorge',
            'password' => Hash::make('jorge'),
            'level' => 4,
            'store_id' => 4
        ]);
        factory(\App\User::class)->create([
            'name' => 'Sergio Cancino',
            'username' => 'cheko',
            'password' => Hash::make('cheko'),
            'level' => 5,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Cynthia Masa',
            'username' => 'cynthia',
            'password' => Hash::make('cynthia'),
            'level' => 5,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Rosario Gonzalez',
            'username' => 'chayi',
            'password' => Hash::make('chayi'),
            'level' => 2,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'b2b',
            'username' => 'b2b',
            'password' => Hash::make('b2b'),
            'level' => 6,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Ecatherine Murcia',
            'username' => 'ecatherine',
            'password' => Hash::make('ecatherine'),
            'level' => 6,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Adrian Martinez',
            'username' => 'adrian',
            'password' => Hash::make('adrian'),
            'level' => 3,
            'store_id' => 1
        ]);
    }
}
