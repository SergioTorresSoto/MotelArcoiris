<?php

use Illuminate\Database\Seeder;

class Jornadas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornadas')->insert([

       	'hora_entrada' => '20:00',
       	'hora_salida' => '08:00',
       	'duracion_hora' =>'12 hours',
    //  	'duracion_minuto' =>''

       ]);
        DB::table('jornadas')->insert([

       	'hora_entrada' => '08:00',
       	'hora_salida' => '20:00',
       	'duracion_hora' =>'12 hours',
     //  	'duracion_minuto' =>''

       ]);

        DB::table('jornadas')->insert([

       	'hora_entrada' => '08:00',
       	'hora_salida' => '14:00',
       	'duracion_hora' =>'6 hours',
     //  	'duracion_minuto' =>''

       ]);

        DB::table('jornadas')->insert([

       	'hora_entrada' => '14:00',
       	'hora_salida' => '20:00',
       	'duracion_hora' =>'6 hours',
     //  	'duracion_minuto' =>''

       ]);

    }
}
