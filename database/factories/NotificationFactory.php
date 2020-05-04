<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use App\User;
use Faker\Factory as Faker;

$factory->define(Notification::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'message' => $faker->sentence(6),
        'status' => $faker->numberBetween(0,1),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
