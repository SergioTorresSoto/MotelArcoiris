<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitacionesInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones_insumos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_habitacion')->unsigned();
            $table->integer('id_insumo')->unsigned();
            $table->integer('cantidad');
            $table->string('observacion')->nullable();
            $table->timestamps();

            $table->foreign('id_habitacion')->references('id')->on('habitaciones')->onDelete('cascade');
            $table->foreign('id_insumo')->references('id')->on('insumos')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER actualizar_habitacion_activa_disponible AFTER INSERT ON habitaciones_insumos FOR EACH ROW
            BEGIN
                UPDATE habitaciones SET id_estado_habitacion = 1
                WHERE habitaciones.id = NEW.id_habitacion;

                UPDATE usuarios_habitaciones SET activa = 0
                WHERE usuarios_habitaciones.id_habitacion = NEW.id_habitacion;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitaciones_insumos');
    }
}
