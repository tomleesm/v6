<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'content' => $faker->text(100),
        'user_id' => $faker->numberBetween(1, 5),
    ];
});
