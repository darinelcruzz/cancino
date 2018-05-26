<?php

use Faker\Generator as Faker;

$factory->define(App\Shopping::class, function (Faker $faker) {
    return [
        'folio' => $faker->numberBetween(1,1000),
        'date' => date('Y-m-d'),
        'amount' => $faker->numberBetween(100,10000),
        'type' => 'mercancia',
        'document' => $faker->numberBetween(100,1000),
        'store_id' => $faker->numberBetween(2,5),
        'status' => 'pendiente',
        'user_id' => 1
    ];
});
