<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MagicDoor\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
