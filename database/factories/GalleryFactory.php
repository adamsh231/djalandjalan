<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gallery;
use App\User;
use Faker\Factory as Faker;

$factory->define(Gallery::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'path' => 'https://picsum.photos/seed/'.$faker->word.'/800/600',
        'caption' => $faker->sentence(5),
        'description' => $faker->sentence(5),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
