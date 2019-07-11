<?php

use Faker\Generator as Faker;

$factory->define(App\Maintenance::class, function (Faker $faker) {
    return [
        'equipment_id' => rand(1,5),
        'type' => 'Limpieza',
        'provider' => 'Victor',
        'maintenance_at' => date('Y-m-d'),
    ];
});
