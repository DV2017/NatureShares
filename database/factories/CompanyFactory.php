<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
  return [
    'title' => $faker->company,
    'image' => $faker->imageUrl($width = 640, $height = 480),
    'description' => $faker->paragraph(),
    'address' => $faker->address,
    'postcode' => $faker->postcode,
    'city' => $faker->city,
    'state' => $faker->state,
    'country' => $faker->country,
    'telephone' => $faker->phoneNumber,
    'website_url' => $faker->safeEmailDomain
  ];
});
