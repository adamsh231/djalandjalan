<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Partner;
use App\User;
use Faker\Factory as Faker;

$factory->define(Comment::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();
    $partner = Partner::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'partner_id' => $faker->randomElement($partner),
        'message' => $faker->text(200),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
