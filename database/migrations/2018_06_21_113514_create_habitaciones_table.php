<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_habitacion')->unsigned();
            $table->integer('id_estado_habitacion')->unsigned();
            $table->string('numero_habitacion');
            $table->string('descripcion');
            $table->string('observacion');
            $table->string('imagen')->default('habitaciones/default.jpg');
            $table->timestamps();

            $table->foreign('id_tipo_habitacion')->references('id')->on('tipo_habitaciones')->onDelete('cascade');
            $table->foreign('id_estado_habitacion')->references('id')->on('estado_habitaciones')->onDelete('cascade');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::dropIfExists('habitaciones');
    }
}
