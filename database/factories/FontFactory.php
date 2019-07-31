<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Font;
use Faker\Generator as Faker;

$factory->define(Font::class, function (Faker $faker) {
    return [
        'name' => $faker->text(10),
        'slug' => $faker->text(10),
    ];
});
