<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory
 *  $table->bigIncrements('id');
            $table->bigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('users');
            $table->bigInteger('visit_event_id');
            $table->foreign('visit_event_id')->references('id')->on('visit_events');
            $table->text('comment')->nullable();
            $table->date('reference_date');
            $table->tinyInteger('complaint_type');
            $table->timestamps(); */

use App\Complaint;
use Faker\Generator as Faker;

$factory->define(Complaint::class, function (Faker $faker) {
    return [
        'client_id' => $faker->numberBetween(31,41),
        'visit_event_id' => $faker->numberBetween(1,50),
        'comment' => $faker->text,
        'reference_date'=>$faker->date(),
        'complaint_type'=>$faker->numberBetween(1,2)
    ];
});
