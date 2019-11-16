<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->company,
        'address_street_name'=>$faker->streetName,
        'address_street_number' => $faker->numberBetween(50,1500),
        'address_floor' => $faker->numberBetween(0,10),
        'phone_number' => $faker->phoneNumber,
        'address_appartment' => $faker->numberBetween(1,7),
        'latitude'=>100/ $faker->numberBetween(1000,10000) - 26.541,
        'longitude'=>100/ $faker->numberBetween(1000,10000) - 64.541,
        'local_contact_name' => $faker ->name,
        'local_contact_email' => $faker->companyEmail,
        'local_contact_phone' => $faker->phoneNumber,
        'contract_number' => $faker->numberBetween(0,100),
        'supervisor_id' =>$faker->numberBetween(22,31),
        'client_id' => $faker->numberBetween(32,41),
        'city_id'=> 1421
        
    ];
});
