<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_insumo')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('observacion');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('id_tipo_insumo')->references('id')->on('tipo_insumos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insumos');
    }
}
