<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Store::class)->create([
            'name' => 'Todas',
            'color' => 'primary',
            'type' => 'c',
            'star' => '0',
            'golden' => '0'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Chiapas',
            'color' => 'primary',
            'type' => 'c',
            'star' => '1.2',
            'golden' => '1.2'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Soconusco',
            'color' => 'success',
            'type' => 'c',
            'star' => '1.25',
            'golden' => '1.15'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Altos',
            'color' => 'danger',
            'type' => 'c',
            'star' => '1.25',
            'golden' => '1.15'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Plaza',
            'color' => 'info',
            'type' => 's',
            'star' => '1.25',
            'golden' => '1.15'
        ]);
    }
}
