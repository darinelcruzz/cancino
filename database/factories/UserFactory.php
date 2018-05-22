<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->freeEmail,
        'username' => $faker->unique()->userName,
        'remember_token' => str_random(10),
        'level' => 1,
        'store_id' => 1
    ];
});
