<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Store::class)->create([
            'name' => 'VKS',
            'color' => 'black',
            'type' => 'c',
            'star' => '0',
            'golden' => '0',
            'account' => '0155996007',
            'rfc' => 'VDN123456201A',
            'social' => 'VKS Administración de Negocio SC',
            'salary' => '0',
            'manger' => '2'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Chiapas',
            'color' => 'primary',
            'type' => 'p',
            'star' => '1.2',
            'golden' => '1.2',
            'account' => '0155996007',
            'rfc' => 'ECI970918G14',
            'social' => 'Electronica Chiapas SA de CV',
            'salary' => '2100',
            'manger' => '3'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Soconusco',
            'color' => 'primary',
            'type' => 'p',
            'star' => '1.25',
            'golden' => '1.15',
            'account' => '0166866913',
            'rfc' => 'ESO010731CU1',
            'social' => 'Electronica el Soconusco  SA de CV',
            'salary' => '2100',
            'manger' => '4'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Altos',
            'color' => 'primary',
            'type' => 'p',
            'star' => '1.30',
            'golden' => '1.20',
            'account' => '0192810603',
            'rfc' => 'EAL040830RG8',
            'social' => 'Electronica los Altos SA de CV',
            'salary' => '2100',
            'manger' => '5'
        ]);
        factory(\App\Store::class)->create([
            'name' => 'Gale Tux',
            'color' => 'danger',
            'type' => 's',
            'star' => '1.25',
            'golden' => '1.20',
            'account' => '0103373908',
            'rfc' => 'EPC150917R95',
            'social' => 'Electronica Plaza Chiapas SA de CV',
            'salary' => '2300',
            'manger' => '6'
        ]);

        factory(\App\Store::class)->create([
            'name' => 'Gale Tapa',
            'color' => 'danger',
            'type' => 's',
            'star' => '1.25',
            'golden' => '1.20',
            'account' => '0113347451',
            'rfc' => 'EPS190205FR2',
            'social' => 'Electronica Plaza Soconusco SA de CV',
            'salary' => '2300',
            'manger' => '7'
        ]);
    }
}
