<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_habitaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_habitacion')->unsigned();
            $table->integer('tiempo_reserva');
            $table->dateTime('tiempo_inicio');
            $table->dateTime('tiempo_fin')->nullable();
            $table->dateTime('tiempo_fin_real')->nullable();
            $table->integer('tarifa');
            $table->string('observacion')->nullable();
            $table->integer('tarifa_horas_extras')->nullable();
            $table->boolean('es_online');
            $table->boolean('activa')->default(false);
            $table->boolean('reserva')->nullable();
            $table->boolean('notificacion_inicio')->nullable()->default(false);
            $table->string('patente')->nullable();
            $table->string('tipo_pago');
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_habitacion')->references('id')->on('habitaciones')->onDelete('cascade');
        });

        DB::unprepared('
        CREATE TRIGGER actualizar_estado_ocupada AFTER INSERT ON usuarios_habitaciones FOR EACH ROW
            BEGIN
                
                IF (NEW.tiempo_inicio <= NOW()) THEN
                    UPDATE habitaciones SET id_estado_habitacion = 2
                    WHERE habitaciones.id = NEW.id_habitacion;
                END IF;
            END
        ');
        DB::unprepared('
        CREATE TRIGGER actualizar_estado_limpieza AFTER UPDATE ON usuarios_habitaciones FOR EACH ROW
            BEGIN
                IF (OLD.tarifa_horas_extras IS NULL) THEN
                    IF (NEW.tarifa_horas_extras IS NOT NULL) THEN
                        UPDATE habitaciones SET id_estado_habitacion = 3
                        WHERE habitaciones.id = NEW.id_habitacion;
                    END IF;
                END IF;
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
        Schema::dropIfExists('usuarios_habitaciones');
    }
}
