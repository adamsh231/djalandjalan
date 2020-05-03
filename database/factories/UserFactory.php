<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function () {
    $faker = Faker::create('id_ID');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('dayung231'),
        'phone' => $faker->unique()->phoneNumber,
        'birth' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
        'gender' => $faker->numberBetween(0,1),
        'nik' => $faker->optional()->nik(),
        'occupation' => $faker->optional()->jobTitle,
        'city' => $faker->city,
        'picture' => 'https://robohash.org/'.$faker->unique()->sentence(3).'?set=set3',
        'description' => $faker->optional()->text(200),
        'completeness' => $faker->numberBetween(0,100),
        'email_verified_at' => now(),
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
