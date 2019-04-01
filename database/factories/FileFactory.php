<?php

use Faker\Generator as Faker;

$factory->define(App\File::class, function(Faker $faker){
	return [];
});
$factory->state(App\File::class, 'file', function (Faker $faker) {
    return [
        'path' => 'file/' . $faker->file('/fakepdf', 'public/storage/file'),
        'type' => $faker->randomElement(['pdf', 'cdr', 'psd']),
    ];
});

$factory->state(App\File::class, 'image', function (Faker $faker) {
    return [
        'path' => 'image/' . $faker->image('public/storage/image', 800, 600, 'nature', false),
        'type' => 'img'
    ];
});

