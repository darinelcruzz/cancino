<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    function run()
    {
        factory(\App\Client::class)->create([
            'social' => 'Electronica Chiapas SA de CV',
            'rfc' => 'ECI970918G14',
            'business' => 'Steren Centro',
            'phone' => '9616131296',
            'email' => 'tuxtla@steren.com.mx',
            'address' => '2da Ote Sur #235',
            'city' => 'Tuxtla Gutierrez',
            'contact' => 'Aparicio Serrano',
            'position' => 'Gerente',
            'cellphone' => '9621453485',
            'store_id' => 2,
            'user_id' => 8
        ]);
    }
}
