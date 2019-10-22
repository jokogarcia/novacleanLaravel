<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
 *       \App\UserRole::create(['Role' => 'GUEST']);
        \App\UserRole::create(['Role' => 'CLIENT']);
        \App\UserRole::create(['Role' => 'EMPLOYEE']);
        \App\UserRole::create(['Role' => 'SUPERVISOR']);
        \App\UserRole::create(['Role' => 'ADMIN']);
|
*/

$factory->define(User::class, function (Faker $faker) {
    $dni = $faker->numberBetween(10000000,50000000);
    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'api_token' => Str::random(80),
        'last_name' => $faker -> lastName,
        'dni' => $dni,
        'cuit' =>"20-$dni-7",
        'phone' => $faker->phoneNumber,
        'user_role_id'=>1,
        'birth_date' => $faker->date,
        'city_id'=> 1421
        
    ];
});
$factory->state(User::class,'client',[
    'user_role_id' => 2,
]);
    
$factory->state(User::class,'employee',function ($faker){
        return[
            'user_role_id' => 3,
            'employee_start_date'=>$faker->date
            
    ];
        
});
    
$factory->state(User::class,'supervisor',function ($faker){
        return[
            'user_role_id' => 4,
            'employee_start_date'=>$faker->date
            
    ];
        
});
    
$factory->state(User::class,'admin',function ($faker){
        return[
            'user_role_id' => 5,
            'employee_start_date'=>$faker->date,
            'email' => 'admin@example.com'
            
    ];
        
});