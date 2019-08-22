<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $dateTime = $faker->dateTime;

    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'is_for_kids' => $faker->boolean,
        // 'created_at' => $dateTime,
        // 'updated_at' => $dateTime,
    ];
});
