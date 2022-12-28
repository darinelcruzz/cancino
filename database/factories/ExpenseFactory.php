<?php

namespace Database\Factories;

use Faker\Generator as Faker;

$factory->define(App\Expense::class, function (Faker $faker) {
    return [
        'check' => 0,
        'date' => '2018-01-01',
        'amount' => 200,
        'concept' => 'inicio',
        'type' => 1
    ];
});
