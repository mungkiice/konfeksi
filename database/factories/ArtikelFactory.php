<?php

use Faker\Generator as Faker;

$factory->define(App\Artikel::class, function (Faker $faker) {
    return [
        'judul' => $faker->sentence,
        'deskripsi' => $faker->paragraph,
        'gambar' => 'artikel/' . $faker->image('public/storage/artikel', 800, 600, 'nature', false),
    ];
});
