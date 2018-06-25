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
            $table->string('tipo_comprobante');
            $table->integer('total');
            $table->dateTime('fecha_compra')->nullable();
            $table->timestamps();

            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
            $table->foreign('id_insumo')->references('id')->on('insumos')->onDelete('cascade');
        });


        /*DB::unprepared('
        CREATE TRIGGER actualizar_stock_insumo AFTER INSERT ON proveedores_insumos FOR EACH ROW
            BEGIN
                UPDATE insumos SET stock = stock + NEW.cantidad
                WHERE insumos.id = NEW.id_insumo;
            END
        ');*/

    
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
