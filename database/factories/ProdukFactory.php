<?php

use Faker\Generator as Faker;

$factory->define(App\Produk::class, function (Faker $faker) {
    return [
    	'vendor_id' => function(){
    		return factory('App\Vendor')->create()->id;
    	},
        'nama' => $faker->sentence,
        'deskripsi' => $faker->paragraph
    ];
});
