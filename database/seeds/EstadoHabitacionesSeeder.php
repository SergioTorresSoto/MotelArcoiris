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

       'estado' => 'Disponible'

       ]);

        DB::table('estado_habitaciones')->insert([

       'estado' => 'Ocupado'

       ]);

        DB::table('estado_habitaciones')->insert([

       'estado' => 'Limpieza'

       ]); 
    }
}
