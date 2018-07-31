<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'category' =>$faker->text(10),
        'academic_level' =>$faker->text(10),
        'urgency' =>$faker->text(10),
        'instructions' =>$faker->text(200)
    ];
});
