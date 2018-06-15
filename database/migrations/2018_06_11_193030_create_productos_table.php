<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tipo_producto')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen')->default('productos/default.jpg');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('id_tipo_producto')->references('id')->on('tipos_productos')->onDelete('cascade');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
