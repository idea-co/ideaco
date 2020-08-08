<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Organization;
use App\User;
use Faker\Generator as Faker;

$factory->define(
    Organization::class, function (Faker $faker) {
        return [
            'name' => $faker->company,
            'shortname' => strtolower($faker->company),
            'email' => $faker->freeEmail, 
            'active' => rand(0,1), 
            'photo_url' => $faker->imageUrl(), 
        ];
    }
);

/**
 * Since an ideaspace AKA organization
 * belongs to a user, we have to first 
 * create a user before creating that space
 */
$factory->afterCreating(
    Organization::class, function ($org, $faker) {
        $org->members()->save(factory(App\User::class)->make());
    }
);
