<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_experiences', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("school_name");
            $table->string("career")->nullable();
            $table->bigInteger("academic_level_id")->unsigned();
            $table->foreign('academic_level_id')->references('id')->on('academic_levels');
            $table->date("started_at");
            $table->date("finished_at")->nullable();
            $table->boolean("is_current")->default(false);
            $table->bigInteger("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('academic_experiences');
    }
}
