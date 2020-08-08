<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'shortname' => strtolower($faker->company),
        'email' => $faker->freeEmail, 
    ];
});
