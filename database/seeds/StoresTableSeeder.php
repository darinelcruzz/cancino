<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Store::class)->create([
            'name' => 'Todas',
            'color' => 'primary'
            'type' => 'c'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Chiapas',
            'color' => 'primary'
            'type' => 'c'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Soconusco',
            'color' => 'success'
            'type' => 'c'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Altos',
            'color' => 'danger'
            'type' => 'c'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Plaza',
            'color' => 'info'
            'type' => 's'
        ]);
    }
}
