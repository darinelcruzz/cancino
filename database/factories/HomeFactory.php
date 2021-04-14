<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Home;
use Faker\Generator as Faker;

$factory->define(Home::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'postcode' => $faker->postcode,
        'phone' => $faker->tollFreePhoneNumber,
    ];
});
