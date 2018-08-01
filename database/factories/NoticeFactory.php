<?php

use Faker\Generator as Faker;

$factory->define(App\Notice::class, function (Faker $faker) {
    return [
        'titular' => $faker->word,
        'descripcion' => $faker->paragraph,
        'img' => $faker->numberBetween(1, 10)
    ];
});
