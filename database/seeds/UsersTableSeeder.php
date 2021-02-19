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
            'password' => Hash::make('helefante'),
            'email' => 'labtr3s@gmail.com'
        ]);
        factory(\App\User::class)->create([
            'name' => 'Victor Cancino',
            'username' => 'victor',
            'password' => Hash::make('victor')
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
            'name' => 'Ecatherine Murcia',
            'username' => 'ecat',
            'password' => Hash::make('ecat'),
            'level' => 4,
            'store_id' => 4
        ]);
        factory(\App\User::class)->create([
            'name' => 'Lizbeth Gomez',
            'username' => 'liz',
            'password' => Hash::make('liz'),
            'level' => 4,
            'store_id' => 5
        ]);
        factory(\App\User::class)->create([
            'name' => 'Brenda Carrasco',
            'username' => 'brenda',
            'password' => Hash::make('brenda'),
            'level' => 4,
            'store_id' => 6
        ]);
        factory(\App\User::class)->create([
            'name' => 'Roberto Mendez',
            'username' => 'rober',
            'password' => Hash::make('rober'),
            'level' => 4,
            'store_id' => 7
        ]);
        factory(\App\User::class)->create([
            'name' => 'Sergio Cancino',
            'username' => 'cheko',
            'password' => Hash::make('cheko'),
            'level' => 5,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Dulce Gómez',
            'username' => 'dulce',
            'password' => Hash::make('dulce'),
            'level' => 5,
            'store_id' => 2
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
            'name' => 'Adrian Martinez',
            'username' => 'adrian',
            'password' => Hash::make('adrian'),
            'level' => 3,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Jaqueline Magañanez',
            'username' => 'jaque',
            'password' => Hash::make('jaque'),
            'level' => 5,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Corte',
            'username' => 'corte',
            'password' => Hash::make('corte'),
            'level' => 7,
            'store_id' => 1
        ]);
        factory(\App\User::class)->create([
            'name' => 'Despacho',
            'username' => 'despacho',
            'password' => Hash::make('despacho'),
            'level' => 1,
            'store_id' => 1,
            'email' => 'victorjcg_6@hotmail.com'
        ]);
    }
}
