<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondicionAfipsTable extends Migration
{
     function populateConstantsTable(){
        \App\CondicionAfip::create(['description'=>'Sin Datos']);
        \App\CondicionAfip::create(['description'=>'IVA Responsable Inscripto']);
        \App\CondicionAfip::create(['description'=>'IVA Responsable no Inscripto']);
        \App\CondicionAfip::create(['description'=>'IVA no Responsable']);
        \App\CondicionAfip::create(['description'=>'IVA Sujeto Exento']);
        \App\CondicionAfip::create(['description'=>'Consumidor Final']);
        \App\CondicionAfip::create(['description'=>'Responsable Monotributo']);
        \App\CondicionAfip::create(['description'=>'Sujeto no Categorizado']);
        \App\CondicionAfip::create(['description'=>'Proveedor del Exterior']);
        \App\CondicionAfip::create(['description'=>'Cliente del Exterior']);
        \App\CondicionAfip::create(['description'=>'IVA Liberado – Ley Nº 19.640']);
        \App\CondicionAfip::create(['description'=>'IVA Responsable Inscripto – Agente de Percepción']);
        \App\CondicionAfip::create(['description'=>'Pequeño Contribuyente Eventual']);
        \App\CondicionAfip::create(['description'=>'Monotributista Social']);
        \App\CondicionAfip::create(['description'=>'Pequeño Contribuyente Eventual Social']);
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condicion_afips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("description");
            $table->timestamps();
        });
        $this->populateConstantsTable();
    }
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condicion_afips');
    }
}
