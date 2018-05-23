<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Store::class)->create([
            'name' => 'Todas',
            'color' => 'primary'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Chiapas',
            'color' => 'primary'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Soconusco',
            'color' => 'success'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Altos',
            'color' => 'danger'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Plaza',
            'color' => 'info'
        ]);
    }
}
