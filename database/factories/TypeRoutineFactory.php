<?php

use Faker\Generator as Faker;

$factory->define(App\TypeRoutine::class, function (Faker $faker) {
  return [
    'description' => $faker->sentence
  ];
});
