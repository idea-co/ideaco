<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrganizationUser;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(OrganizationUser::class, function (Faker $faker) {
    $user = \App\User::inRandomOrder()->first();
    $org = \App\Organization::inRandomOrder()->first();
    return [
        'user_id'=> $user->id,
        'organization_id' => $org->id,
        'email' => $user->email,
        'displayName' => $faker->name,
        'password' => Hash::make('password'),
    ];
});
