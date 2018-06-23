<?php

use Illuminate\Database\Seeder;

class Proveedores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('proveedores')->insert([

       	'nombre' => 'Ganga',
       	'direccion' => 'los notros 192',
       	'telefono' =>'12345678',
      	'descripcion' =>'Supermercado Mayorista'

       ]);

          DB::table('proveedores')->insert([

       	'nombre' => 'Unimarc',
       	'direccion' => 'los nogales 123',
       	'telefono' =>'32145678',
      	'descripcion' =>'Supermercado'

       ]);

          DB::table('proveedores')->insert([

       	'nombre' => 'Adelco',
       	'direccion' => 'concepcion 123',
       	'telefono' =>'65445678',
      	'descripcion' =>'Distribuidor'

       ]);
    }
}
