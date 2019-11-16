<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("company_name");
            $table->string("position");
            $table->date("started_at");
            $table->date("finished_at")->nullable();
            $table->boolean("is_current_job")->false;
            
            $table->string("reference_name")->nullable();
            $table->string("reference_email")->nullable();
            $table->string("reference_phone")->nullable();
            $table->bigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
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
        Schema::dropIfExists('work_experiences');
    }
}
