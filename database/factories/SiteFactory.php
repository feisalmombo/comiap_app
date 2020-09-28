<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Organization;
use App\Models\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'organization_id' => factory(Organization::class),
        'name' => $faker->company,
        'is_testing_site' => true,
        'operation_capacity' => $faker->numberBetween(0,20),
        'days_of_operation' => $faker->numberBetween(1,7),
        'hours_of_operation' => $faker->numberBetween(3,24),
        'shifts_per_day' => $faker->numberBetween(1,5),
        'testing_capacity' => $faker->numberBetween(10,100),
        'time_spent_per_test' => $faker->numberBetween(1,60),
        'tests_per_hour' => "5",
    ];
});
