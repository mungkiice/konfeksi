<?php

use Faker\Generator as Faker;

$factory->define(App\Konfeksi::class, function (Faker $faker) {
    return [
        'alamat' => $faker->address,
        'deskripsi' => $faker->paragraph,
        'gambar' => 'konfeksi/' . $faker->image('public/storage/konfeksi', 800, 600, 'people', false),
        'diverifikasi' => true
    ];
});
