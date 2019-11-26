<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actuation;
use Faker\Generator as Faker;

$factory->define(Actuation::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence(20),
        'origin' => $faker->randomElement(array('tech', 'customer')),
    ];
});
