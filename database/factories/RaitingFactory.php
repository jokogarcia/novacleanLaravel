<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Raiting;
use Faker\Generator as Faker;

$factory->define(Raiting::class, function (Faker $faker) {
    return [
        //
        'visit_event_id'=>$faker->numberBetween(1,50),
        'client_id'=>$faker->numberBetween(1,10),
        'reference_date'=>$faker->date(),
        'raiting'=>$faker->numberBetween(0,50)/10
        
    ];
});
