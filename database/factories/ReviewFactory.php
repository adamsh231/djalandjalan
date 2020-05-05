<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Join;
use App\User;
use App\Review;
use Faker\Factory as Faker;

$factory->define(Review::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();
    $join = Join::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        // 'join_id' => $faker->randomElement($join),
        'message' => $faker->optional()->text(200),
        'rating' => $faker->numberBetween(1,5),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
