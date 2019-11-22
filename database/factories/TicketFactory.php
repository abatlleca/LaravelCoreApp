<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'description' => $faker->text(200),
        'origin' => $faker->randomElement(array('email', 'phone', 'app')),
        'priority' => $faker->numberBetween(0, 10),
        'closed' => 0,
    ];
});
