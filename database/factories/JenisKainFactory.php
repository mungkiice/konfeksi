<?php

use Faker\Generator as Faker;

$factory->define(App\JenisKain::class, function (Faker $faker) {
    return [
        'nama' => $faker->sentence,
        'deskripsi' => $faker->paragraph,
    ];
});
