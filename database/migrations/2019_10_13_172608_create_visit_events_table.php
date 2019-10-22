<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_events', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger("location_id")->unsigned();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->time("starts_at");
            $table->time("duration");
            $table->date("date")->nullable();
            $table->date("starting_date")->nullable();
            $table->boolean("repeats")->default(false);
            $table->boolean("monday")->default(false);
            $table->boolean("tuesday")->default(false);
            $table->boolean("wednesday")->default(false);
            $table->boolean("thursday")->default(false);
            $table->boolean("friday")->default(false);
            $table->boolean("saturday")->default(false);
            $table->boolean("sunday")->default(false);
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
        Schema::dropIfExists('visit_events');
    }
}
