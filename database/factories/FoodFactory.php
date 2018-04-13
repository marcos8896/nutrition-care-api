<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
  return [
    'description' => $faker->sentence,
    'proteins' => $faker->randomFloat(2, 0.1, 0.9),
    'carbohydrates' => $faker->randomFloat(2, 0.1, 0.9),
    'fats' => $faker->randomFloat(2, 0.1, 0.9),
    'calories' => $faker->randomFloat(2, 1, 7),
  ];
});
