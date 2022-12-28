<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->freeEmail,
        'username' => $faker->unique()->userName,
        'remember_token' => Str::random(10),
        'level' => 1,
        'store_id' => 1
    ];
});
