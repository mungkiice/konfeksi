<?php

use Faker\Generator as Faker;

$factory->define(App\Ulasan::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'rating' => $faker->numberBetween(1, 5),
        'komentar' => $faker->sentence,
        'gambar' => 'ulasan/' . $faker->image('public/storage/ulasan', 800, 600, 'food', false),
    ];
});
