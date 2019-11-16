<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("name");
            $table->string('photo_url')->nullable();
            $table->text("description")->nullable();
            $table->double("area")->nullable();
            $table->bigInteger("location_id")->unsigned();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete("cascade");
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
        Schema::dropIfExists('sectors');
    }
}
