<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use App\Comment;
use App\User;
use Faker\Factory as Faker;

$factory->define(Reply::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();
    $comment = Comment::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'comment_id' => $faker->randomElement($comment),
        'message' => $faker->text(200),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
