<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
  return [
    'description' => $faker->sentence,
    'proteins' => $faker->randomDigit,
    'carbohydrates' => $faker->randomDigit,
    'fats' => $faker->randomDigit,
    'calories' => $faker->randomDigit,
  ];
});
