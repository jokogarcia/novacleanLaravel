<?php

use Illuminate\Database\Seeder;

class EmployeeVisitEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_visit_event')->delete();
        $array = [];
        for($i=0;$i<200;$i++){
            array_push($array,
                    ['employee_id' => rand(12,21),
                     'visit_event_id' => rand(1,100)   
                        ]);
        }
        DB::table('employee_visit_event')->insert($array);
    }
}
