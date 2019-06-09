<?php

use Faker\Generator as Faker;

$factory->define(App\Maintenance::class, function (Faker $faker) {
    return [
        'store_id' => rand(1,5),
        'name' => 'PUNTO' . rand(10000,90000),
        'equipment' => 'Computadora',
        'type' => 'Limpieza',
        'provider' => 'Victor',
        'maintenance_at' => date('Y-m-d'),
    ];
});
