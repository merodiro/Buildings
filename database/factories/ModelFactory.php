<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    $faker = \Faker\Factory::create('ar_SA');

    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Building::class, function (Faker\Generator $faker) {
    $faker = \Faker\Factory::create('ar_SA');

    return [
        'name' => $faker->sentence(3),
        'price' => $faker->randomNumber(5),
        'rent' => rand(0, 1),
        'rooms' => $faker->randomNumber(2),
        'area' => $faker->randomNumber(3),
        'city' => rand(0, 26),
        'type' => rand(0, 2),
        'short_description' => $faker->paragraph(rand(1, 2)),
        'meta' => $faker->sentence,
        'longitude' => $faker->randomFloat,
        'latitude' => $faker->randomFloat,
        'full_description' => $faker->paragraph(rand(3, 7)),
        'status' => rand(0, 1),
        'user_id' => rand(1, 11),
    ];
});