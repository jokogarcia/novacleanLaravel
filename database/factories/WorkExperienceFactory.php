<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WorkExperience;
use Faker\Generator as Faker;

$factory->define(WorkExperience::class, function (Faker $faker) {
    $workPositions=explode(",",
                "Adjunto,Becario,Operario,Técnico Electricista,Maestro mayor de obra,Secretaria,Enfermero,Operador NOC,agente de tránsito");
$nWorkPositions = count($workPositions)-1;
    return [
        'company_name'=>$faker->company,
        'position' => $workPositions[rand(0,$nWorkPositions)],
        'started_at' =>$faker->date,
        'finished_at' =>rand(0,10) < 8 ? $faker->date : null,
        'is_current_job' => rand(0,10) < 8,
        'reference_name' => $faker->name,
        'reference_email' => $faker->email,
        'reference_phone' => $faker->phoneNumber,
        'user_id'=>rand(1,31)
    ];
});
