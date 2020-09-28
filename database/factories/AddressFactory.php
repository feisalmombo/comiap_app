<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        "type" => "physical",
        "building_name" => $faker->streetName,
        "building_number" => $faker->buildingNumber,
        "street_address" => $faker->streetAddress,
        "second_address" => $faker->streetAddress,
        'zipcode' => $faker->numberBetween(10000,99999),
        'city' => $faker->city,
        "state" => $faker->state,
        "longitude" => $faker->randomFloat(6,39.1, 39.279556),
        "latitude" => $faker->randomFloat(6,-6.80235, -6.75),
    ];
});
