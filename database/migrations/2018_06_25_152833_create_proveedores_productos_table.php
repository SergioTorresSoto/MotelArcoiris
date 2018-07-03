<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedoresProductosTable extends Migration
{
 public function up()
    {
        Schema::create('proveedores_productos', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_proveedor')->unsigned();
        $table->integer('id_producto')->unsigned();
        $table->integer('id_detalle_compra')->nullable();
        $table->string('marca_producto');
        $table->string('contenido');
        $table->integer('cantidad');
        $table->integer('precio_unitario');
        $table->integer('precio_total');
        $table->timestamps();
        

        $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
        $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedores_productos');
    }
}

