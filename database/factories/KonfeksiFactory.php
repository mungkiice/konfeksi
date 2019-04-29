<?php

use Faker\Generator as Faker;

$factory->define(App\Konfeksi::class, function (Faker $faker) {
	$faker->addProvider(new Faker\Provider\de_DE\Payment($faker));
    return [
        'alamat' => $faker->address,
        'deskripsi' => $faker->paragraph,
        'gambar' => 'konfeksi/' . $faker->image('public/storage/konfeksi', 800, 600, 'people', false),
        'diverifikasi' => true,
        'bank_nama' => $faker->bank,
        'bank_nomor' => $faker->bankAccountNumber,
        'bank_pemilik' => $faker->name,
    ];
});
