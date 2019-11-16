<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger("city_id")->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->default(1421);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token',80)->nullable();
            $table->bigInteger('user_role_id')->default(1);
            $table->string("last_name")->nullable();
            $table->string("dni")->nullable()->unique();
            $table->string("phone")->nullable();
            $table->string("cuit")->nullable()->unique();
            $table->date("employee_start_date")->nullable();
            $table->date("birth_date")->nullable();
            $table->integer('tcn_state')->nullable();
            $table->string('photo_url')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
