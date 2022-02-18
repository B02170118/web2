<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Entities\Member\Member;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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

// $factory->define(Member::class, function (Faker $faker) {
//     return [
//         'ac' => 'ac'.rand(00000,99999),
//         'pw' => Hash::make('password'), // password
//         'username' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'remember_token' => Str::random(10),
//     ];
// });
