<?php

use Faker\Generator as Faker;

$factory->define(App\Voter::class, function (Faker $faker) {
    return [
        'id' => $faker->numberBetween(1000, 9999),
        'name' => $faker->name,
        'access_code' => str_random(5)
    ];
});
