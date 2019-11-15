<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MagicDoor\Models\Role;
use Faker\Generator as Faker;

/**
 * Not needed
 */
$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
