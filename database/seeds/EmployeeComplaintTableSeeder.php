<?php

use Illuminate\Database\Seeder;

class EmployeeComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_complaint')->delete();
        $array = [];
        for($i=0;$i<50;$i++){
            array_push($array,
                    ['employee_id' => rand(12,22),
                     'complaint_id' => rand(1,50)   
                        ]);
        }
        DB::table('employee_complaint')->insert($array);
    }
}
