<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('visit_event_id')->unsigned();
            $table->foreign('visit_event_id')->references('id')->on('visit_events')->onDelete("cascade");
            $table->double('latitude');
            $table->double('longitude');
            $table->bigInteger('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_logs');
    }
}
