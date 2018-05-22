<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Store::class)->create([
            'name' => 'Todas',
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Chiapas',
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Soconusco',
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Altos',
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Plaza',
        ]);
    }
}
