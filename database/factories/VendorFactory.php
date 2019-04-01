<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'alamat' => $faker->address,
        'deskripsi' => $faker->paragraph,
        'valid' => true
    ];
});