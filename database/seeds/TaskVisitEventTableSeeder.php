<?php

use Illuminate\Database\Seeder;

class TaskVisitEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_visit_event')->delete();
        $array = [];
        for($i=0;$i<500;$i++){
            array_push($array,
                    ['task_id' => rand(1,200),
                     'visit_event_id' => rand(1,100)   
                        ]);
        }
        DB::table('task_visit_event')->insert($array);
    }
}
