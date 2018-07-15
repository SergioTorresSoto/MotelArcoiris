<?php

use Illuminate\Database\Seeder;

class EstadoHabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_habitaciones')->insert([

       'estado' => 'Disponible',
       'color' => '#0C981F',
       ]);

        DB::table('estado_habitaciones')->insert([

       'estado' => 'Ocupado',
       'color' => '#AB1919',
       ]);

        DB::table('estado_habitaciones')->insert([

       'estado' => 'Limpieza',
       'color' => '#2D94D0',


       ]); 
    }
}
