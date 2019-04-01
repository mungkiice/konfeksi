<?php

use Faker\Generator as Faker;

$factory->define(App\Ulasan::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        	return factory('App\User')->create()->id;
        },
        'rating' => $faker->numberBetween(1, 6),
        'komentar' => $faker->sentence
    ];
});
