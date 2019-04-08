<?php

use Faker\Generator as Faker;

$factory->define(App\Produk::class, function (Faker $faker) {
    return [
    	'konfeksi_id' => function(){
    		return factory('App\Konfeksi')->create()->id;
    	},
        'gambar' => 'produk/' . $faker->image('public/storage/produk', 800, 600, 'cats', false),
        'nama' => $faker->sentence,
        'deskripsi' => $faker->paragraph
    ];
});
