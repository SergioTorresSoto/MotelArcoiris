<?php

use Illuminate\Database\Seeder;

class Habitaciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('habitaciones')->insert([
        	'id_tipo_habitacion' => '1',
        	'id_estado_habitacion' => '1',
        	'numero_habitacion' => '1',
        	'descripcion' => 'descripcion habitacion 1',
        	'observacion' => 'arreglar telefono de la habitacion 1',
        	
        ]);

         DB::table('habitaciones')->insert([
        	'id_tipo_habitacion' => '1',
        	'id_estado_habitacion' => '1',
        	'numero_habitacion' => '2',
        	'descripcion' => 'descripcion habitacion 2',
        	'observacion' => 'arreglar telefono de la habitacion 2',
        	
        ]);
          DB::table('habitaciones')->insert([
        	'id_tipo_habitacion' => '2',
        	'id_estado_habitacion' => '2',
        	'numero_habitacion' => '3',
        	'descripcion' => 'descripcion habitacion 3',
        	'observacion' => 'arreglar telefono de la habitacion 3',
        	
        ]);
    }
}
