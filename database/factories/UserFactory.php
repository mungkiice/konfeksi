<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$RRIIyCkawbUSVmyJ2Yc9/eSAuH4isXwFL0o7WaAs3KZvDYZ2O61zK', // secret
        'nomor_telepon' => $faker->tollFreePhoneNumber,
        'role' => 'Member',
        'remember_token' => Str::random(10),
    ];
});
