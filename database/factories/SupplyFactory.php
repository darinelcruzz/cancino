<?php

use Faker\Generator as Faker;

$factory->define(App\Supply::class, function (Faker $faker) {
	$price = $faker->randomFloat(2, 20, 100);
    return [
        'description' => $faker->sentence(3),
        'code' => $faker->regexify('[A-Z0-90-9A-Z]{5,7}'),
        'sat_key' => $faker->ean8,
        'quantity' => $faker->numberBetween(15, 50),
        'unit' => $faker->randomElement(['pza', 'm', 'l', 'kg']),
        'purchase_price' => $price,
        'sale_price' => $price * 1.16,
    ];
});
