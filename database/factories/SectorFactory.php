<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory 
   $table->string("name");
            $table->text("description");
            $table->double("area");
            $table->bigInteger("location_id"); */

use App\Sector;
use Faker\Generator as Faker;

$factory->define(Sector::class, function (Faker $faker) {
    $SECTORES=["Cocina","Baño","Hall de entrada","Living","Habitación","Dormitorio","Escaleras","Zaguan","Patio interno","Comedor","Oficina","Sala de conferencias","Ascensor","Baño de mujeres", "Baño de varones"];
    return [
        'name'=>$SECTORES[$faker->numberBetween(0,count($SECTORES)-1)],
        'description'=>$faker->text,
        'area'=>$faker->numberBetween(10,1000)/10,
        'location_id'=>$faker->numberBetween(1,50)
    ];
});
