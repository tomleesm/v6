<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\RoleUser::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'role_id' => $faker->numberBetween(1, 10),
    ];
});
