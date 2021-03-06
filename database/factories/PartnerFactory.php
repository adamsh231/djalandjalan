<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use App\User;
use App\Category;
use Faker\Factory as Faker;

$factory->define(Partner::class, function () {
    $faker = Faker::create('id_ID');
    $users = User::pluck('id')->toArray();

    $category = Category::pluck('name')->toArray();
    $count_category = $faker->numberBetween(1, 3);
    $categories = "";
    for ($i = 0; $i < $count_category; $i++) {
        $categories .= $faker->unique()->randomElement($category). ",";
    }

    $start_date = $faker->dateTimeBetween('2020-06-01', '2021-01-01')->format('Y-m-d');
    $end_date = $faker->dateTimeBetween($start_date, '2021-01-01')->format('Y-m-d');
    return [
        'user_id' => $faker->randomElement($users),
        'dest_name' => $faker->city,
        'dest_location' => $faker->address,
        'dest_picture' => 'https://picsum.photos/seed/' . $faker->word . '/800/600',
        'start_date' => $start_date,
        'end_date' => $end_date,
        'gather_time' => now(),
        'gather_point' => $faker->address,
        'required_person' => $faker->numberBetween(5, 20),
        'categories' => $categories,
        'description' => $faker->text(200),
        'status' => $faker->numberBetween(-1, 2),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
