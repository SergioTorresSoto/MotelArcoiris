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
       'color' => 'width: 60px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; background-color:#0C981F;',
       'estilo' => 'width: 70px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; color:#ffffff; background-color:#0C981F;',
       ]);

        DB::table('estado_habitaciones')->insert([

       'estado' => 'Ocupado',
       'color' => 'width: 60px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; background-color:#AB1919;',
       'estilo' => 'width: 60px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; color:#ffffff; background-color:#AB1919;',
       ]);

        DB::table('estado_habitaciones')->insert([

       'estado' => 'Limpieza',
       'color' => 'width: 60px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; background-color:#2D94D0;',
       'estilo' => 'width: 60px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; color:#ffffff; background-color:#2D94D0;',


       ]); 
    }
}
