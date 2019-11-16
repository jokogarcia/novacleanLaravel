<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory 
 $table->bigInteger("sector_id");
            $table->time("duration");
            $table->integer("frequency");
            $table->text("description");
 *  */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        //
        'sector_id' => $faker->numberBetween(1,100),
        'duration'=> $faker->time(),
        'frequency' => $faker->numberBetween(1,30),
        'description'=>$faker->text,
    ];
});
