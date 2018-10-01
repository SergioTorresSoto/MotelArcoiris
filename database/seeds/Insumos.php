<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Insumos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table("insumos")->insert([
        	'id_tipo_insumo' => '1',
        	'nombre' => 'Detergente',
        	'descripcion' => ' Detergente para lavar ropa de cama',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);

        DB::table("insumos")->insert([
        	'id_tipo_insumo' => '1',
        	'nombre' => 'Lava loza',
        	'descripcion' => ' Detergente para lavar loza',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);

            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '1',
        	'nombre' => 'Limpia pizo',
        	'descripcion' => ' limpiador para el piso',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);


            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '3',
        	'nombre' => 'Toalla',
        	'descripcion' => ' toalla para la habitacion',
        	'observacion' => 'avisar a administrador al dejar',
        	'stock' => '120'
        
        ]);


            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '3',
        	'nombre' => 'Cubre cama',
        	'descripcion' => ' cubre cama para las habitaciones',
        	'observacion' => 'avisar a administrador al dejar',
        	'stock' => '120'
        
        ]);

            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '3',
        	'nombre' => 'Sabanas',
        	'descripcion' => ' sabanas para la/las camas de las habitaciones',
        	'observacion' => 'avisar a administrador al dejar',
        	'stock' => '120'
        
        ]);

            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '3',
        	'nombre' => 'toalla',
        	'descripcion' => ' toalla para la habitacion',
        	'observacion' => 'avisar a administrador al dejar',
        	'stock' => '120'
        
        ]);

            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '2',
        	'nombre' => 'Leña',
        	'descripcion' => 'Leña para la calefaccion del motel',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);


            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '1',
        	'nombre' => 'Jabon',
        	'descripcion' => 'Jabon para los baños de la habitacion',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);

            DB::table("insumos")->insert([
        	'id_tipo_insumo' => '1',
        	'nombre' => 'Shampoo',
        	'descripcion' => 'shampoo para los baños de la habitacion',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);

             DB::table("insumos")->insert([
        	'id_tipo_insumo' => '1',
        	'nombre' => 'Papel higenico',
        	'descripcion' => 'Papel para los baños de la habitacion',
        	'observacion' => 'avisar a administrador al sacar',
        	'stock' => '120'
        
        ]);

         
    }
}
    

