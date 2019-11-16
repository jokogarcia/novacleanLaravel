<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string("name");
            $table->string('photo_url')->nullable();
            $table->bigInteger("city_id")->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string("address_street_name");
            $table->string("address_street_number");
            $table->string("address_floor")->nullable();
            $table->string("address_appartment")->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string("phone_number")->nullable();
            $table->string("local_contact_name");
            $table->string("local_contact_email")->nullable();
            $table->string("local_contact_phone")->nullable();
            $table->string("contract_number")->nullable();
            $table->bigInteger("supervisor_id")->unsigned()->nullable();
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete("set null");
            $table->bigInteger("client_id")->unsigned();
            $table->foreign('client_id')->references('id')->on('users')->onDelete("cascade");

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
        Schema::dropIfExists('locations');
    }
}
