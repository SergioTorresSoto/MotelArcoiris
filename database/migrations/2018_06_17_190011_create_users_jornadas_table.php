<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersJornadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_jornadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jornada')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->date('fecha_entrada');
            $table->date('fecha_salida')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();

            $table->foreign('id_jornada')->references('id')->on('jornadas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_jornadas');
    }
}
