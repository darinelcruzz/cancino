<?php

namespace Database\Factories;

use Faker\Generator as Faker;

$factory->define(App\Store::class, function (Faker $faker) {
    return [
        'name' => 'Todas',
        'color' => 'primary'
    ];
});
