<?php

use Faker\Generator as Faker;

$factory->define(App\Exercise::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence,
    'srcImage' => $faker->imageUrl()
  ];
});
