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
            'golden' => '0',
            'account' => '0155996007'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Chiapas',
            'color' => 'primary',
            'type' => 'p',
            'star' => '1.2',
            'golden' => '1.2',
            'account' => '0155996007'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Soconusco',
            'color' => 'primary',
            'type' => 'p',
            'star' => '1.25',
            'golden' => '1.15',
            'account' => '0166866913'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Altos',
            'color' => 'primary',
            'type' => 'p',
            'star' => '1.30',
            'golden' => '1.20',
            'account' => '0192810603'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Gale Tux',
            'color' => 'danger',
            'type' => 's',
            'star' => '1.25',
            'golden' => '1.20',
            'account' => '0103373908'
        ]);

        factory(\App\Store::class)->create([
            'name' => 'Gale Tapa',
            'color' => 'danger',
            'type' => 's',
            'star' => '1.25',
            'golden' => '1.20',
            'account' => '0113347451'
        ]);
    }
}
