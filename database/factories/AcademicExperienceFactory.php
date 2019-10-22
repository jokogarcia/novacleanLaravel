<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\AcademicExperience::class, function (Faker $faker) {
     $isFinished= rand(0,10) < 8;
     $isCurrent = $isFinished ? false : rand(0,10) > 8;
    return [
        'school_name'=>$faker->company,
        'career' => $faker->jobTitle,
        'academic_level_id' => rand(1,6),
        'started_at' =>$faker->date,
        'finished_at' =>!$isFinished  ? $faker->date : null,
        'is_current' => $isCurrent,
        'user_id'=>rand(1,31)
    ];
});
