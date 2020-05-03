<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Join;
use App\Partner;
use App\User;
use Faker\Factory as Faker;

$factory->define(Join::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();
    $partner = Partner::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'partner_id' => $faker->randomElement($partner),
        'review' => $faker->optional()->text(200),
        'rating' => $faker->numberBetween(1,5),
        'status' => $faker->numberBetween(0,1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
