<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory 
 $table->bigInteger("location_id");
            $table->foreign('location_id')->references('id')->on('locations');
            $table->time("starts_at");
            $table->time("duration");
            $table->date("date");
            $table->date("starting_date");
            $table->boolean("repeats")->default(false);
            $table->boolean("monday")->default(false);
            $table->boolean("tuesday")->default(false);
            $table->boolean("wednesday")->default(false);
            $table->boolean("thursday")->default(false);
            $table->boolean("friday")->default(false);
            $table->boolean("saturday")->default(false);
            $table->boolean("sunday")->default(false);
 *  */

use App\VisitEvent;
use Faker\Generator as Faker;

$factory->define(VisitEvent::class, function (Faker $faker) {
    $repeats = $faker->boolean;
    return [
        //
        'location_id'=>$faker->numberBetween(1,50),
        'starts_at'=>$faker->time(),
        'duration'=>$faker->time(),
        'starting_date'=>$faker->date(),
        'date'=>$faker->date(),
        'repeats'=>$repeats,
        'monday' => $repeats ? $faker->boolean : false,
        'wednesday' => $repeats ? $faker->boolean : false,
        'tuesday' => $repeats ? $faker->boolean : false,
        'thursday' => $repeats ? $faker->boolean : false,
        'friday' => $repeats ? $faker->boolean : false,
        'saturday' => $repeats ? $faker->boolean : false,
        'sunday' => $repeats ? $faker->boolean : false,
    ];
});
