<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'url' => $faker->imageUrl(),
        // 隨機抓取 User 或 Post model 已經有的 id
        'imageable_id' => ($faker->numberBetween(1, 2) == 1) ?
                              App\User::select('id')->get()->random()->id
                            : App\Post::select('id')->get()->random()->id,
        'imageable_type' => ($faker->numberBetween(1, 2) == 1) ? 'App\User' : 'App\Post',
    ];
});
