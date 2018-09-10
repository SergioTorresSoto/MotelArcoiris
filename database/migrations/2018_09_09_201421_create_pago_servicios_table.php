<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('pago_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_servicio')->unsigned();
            $table->date('fecha');
            $table->integer('valor_servicio');
            $table->string('cantidad');
            $table->timestamps();

            $table->foreign('id_tipo_servicio')->references('id')->on('tipo_servicios')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('pago_servicios');
    }
}
