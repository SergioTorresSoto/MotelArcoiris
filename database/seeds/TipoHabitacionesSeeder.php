<?php

use Illuminate\Database\Seeder;

class TipoHabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('tipo_habitaciones')->insert([

       'tipo' => 'simple'

       ]);

        DB::table('tipo_habitaciones')->insert([

       'tipo' => 'jacuzzi'

       ]);

    }
}
