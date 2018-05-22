<?php

use Faker\Generator as Faker;

$factory->define(App\Shopping::class, function (Faker $faker) {
    return [
        'folio' => $faker->numberBetween(1,1000),
        'date' => date('Y-m-d'),
        'amount' => $faker->numberBetween(100,10000),
        'type' => 'mercancia',
        'reference' => $faker->numberBetween(100,1000),
        'store_id' => 1,
        'status' => 'pendiente',
        'user_id' => 1
    ];
});
