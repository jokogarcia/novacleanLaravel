<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaitingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raitings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('visit_event_id')->unsigned();
            $table->foreign('visit_event_id')->references('id')->on('visit_events')->onDelete("cascade");

            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users')->onDelete("cascade");

            $table->date('reference_date');
            $table->float('raiting');
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
        Schema::dropIfExists('raitings');
    }
}
