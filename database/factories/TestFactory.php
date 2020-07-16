<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$statuses = \App\Test::getStatuses();
$factory->define(\App\Test::class, function (Faker $faker) use($statuses) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'creator' => $faker->name,
        'status' => $faker->randomKey($statuses)
    ];
});
