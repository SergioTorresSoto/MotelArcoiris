<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedores_insumos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_insumo')->unsigned();
            $table->string('marca');
            $table->integer('cantidad');
            $table->integer('precio_unitario');
            $table->integer('precio_total');
            $table->string('tipo_comprobante');
            $table->dateTime('fecha_compra')->nullable();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_insumo')->references('id')->on('insumos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores_insumos');
    }
}
