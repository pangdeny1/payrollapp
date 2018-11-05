<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
        "phone" => $faker->phoneNumber,
        "country" => $faker->country,
        "gender" => rand(0, 1) ? "male" : "female",
        "birthday" => $date = "1988-08-08",
        'password' => "secret", //bcrypt("secret"),
        'remember_token' => str_random(10),
    ];
});
