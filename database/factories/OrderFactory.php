<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'category' =>$faker->text(10),
        'academic_level' =>$faker->text(10),
        'urgency' =>$faker->text(10),
        'cost' =>$faker->numberBetween($min = 1000, $max = 9000),
        'amount_payed' =>$faker->numberBetween($min = 1000, $max = 9000),
        'number_of_questions' =>$faker->numberBetween($min = 1, $max =20),
        'progress' =>$faker->numberBetween($min = 15, $max =100),
        'instructions' =>$faker->text(10),
        'user_id' =>'1',
   ];
});
