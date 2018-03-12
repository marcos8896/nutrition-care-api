<?php

use Faker\Generator as Faker;

$factory->define(App\BodyArea::class, function (Faker $faker) {
    return [
      'description' => $faker->sentence
    ];
});
