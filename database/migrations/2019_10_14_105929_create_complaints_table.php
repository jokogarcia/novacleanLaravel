<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('photo_url')->nullable();
            $table->bigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');
            $table->bigInteger('visit_event_id')->unsigned();
            $table->foreign('visit_event_id')->references('id')->on('visit_events');
            $table->text('comment')->nullable();
            $table->date('reference_date');
            $table->tinyInteger('complaint_type');
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
        Schema::dropIfExists('complaints');
    }
}
