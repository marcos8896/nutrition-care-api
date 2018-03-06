<?php

use Faker\Generator as Faker;

$factory->define(App\UserProgress::class, function (Faker $faker) {
    return [
      'weight' => $faker->randomDigit,
      'fat_percentage' => $faker->randomDigit,
      'fat_kilogram' => $faker->randomDigit,
      'muscle_kilogram' => $faker->randomDigit,
      'progress_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
