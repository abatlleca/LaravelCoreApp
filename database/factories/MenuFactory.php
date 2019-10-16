<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Menu;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'route' => $faker->word,
        'parent_id' => 0,
        'order' => $faker->numberBetween(0, 10),
        'role_name' => $faker->word,
        'isActive' => 1,
    ];
});
