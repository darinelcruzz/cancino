<?php

namespace Database\Factories;

use Faker\Generator as Faker;

$factory->define(App\Employer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'birthday' => $faker->date,
        'address' => $faker->address,
        'ingress' => $faker->date,
        'store_id' => rand(1,5),
        'job' => 'Vendedor',
        'married' => 0,
        'sons' => 0,
    ];
});
