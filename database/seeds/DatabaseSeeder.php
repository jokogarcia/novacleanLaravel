<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call('CitiesAndProvincesSeeder');
        //\App\UserRole::truncate();
        \App\UserRole::create(['Role' => 'GUEST']);
        \App\UserRole::create(['Role' => 'CLIENT']);
        \App\UserRole::create(['Role' => 'EMPLOYEE']);
        \App\UserRole::create(['Role' => 'SUPERVISOR']);
        \App\UserRole::create(['Role' => 'ADMIN']);
        
        //\App\User::truncate();
        $adminUser = factory(\App\User::class)->state("admin")->create();
        
        $guestUsers= factory(\App\User::class,10)->create();
        $employeeUsers = factory(\App\User::class,10)->state("employee")->create();
        $supervisorUsers = factory(\App\User::class,10)->state("supervisor")->create();
        
        $clientUsers = factory(\App\User::class,10)->state("client")->create();
    //    factory(\App\Employee::class)->state("admin")->create();
    //    factory(\App\Employee::class,20)->create();
    //    factory(\App\Client::class,10)->create();
        
        //App\AcademicLevel::truncate();
        \App\AcademicLevel::create(['level_name' => 'PRIMARIA']);
        \App\AcademicLevel::create(['level_name' => 'SECUNDARIA']);
        \App\AcademicLevel::create(['level_name' => 'SECUNDARIA TECNICA']);
        \App\AcademicLevel::create(['level_name' => 'PROFESORADO']);
        \App\AcademicLevel::create(['level_name' => 'TERCIARIO']);
        \App\AcademicLevel::create(['level_name' => 'GRADO']);
        
         //\App\AcademicExperience::truncate();
        $academicExperiences = factory(App\AcademicExperience::class,50)->create();
        
       
       
         //App\WorkExperience::truncate();
        $workExperiences = factory(App\WorkExperience::class,50)->create();
        
        //\App\Location::truncate();
      $locations = factory(\App\Location::class,50)->create();
        
      //\App\Sector::truncate();
      $sectors = factory(\App\Sector::class,100)->create();
      
      //\App\Task::truncate();
      $tasks = factory(\App\Task::class,200)->create();
        
      //\App\VisitEvent::truncate();
      factory(\App\VisitEvent::class,100)->create();
      
      //\App\Complaint::truncate();
      factory(\App\Complaint::class,50)->create();
      
      factory(\App\Raiting::class,50)->create();
      
      $this->call('EmployeeComplaintTableSeeder');
      $this->call('TaskVisitEventTableSeeder');
      $this->call('EmployeeVisitEventTableSeeder');
      
    }    
}
