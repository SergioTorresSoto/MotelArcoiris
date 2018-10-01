<?php

use Illuminate\Database\Seeder;

class TarifasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tarifas')->insert([

	       	'id_tipo' => '1',
	       	'horas' => '12',
	       	'precio' =>'18000',
	      	

       ]);
        DB::table('tarifas')->insert([

	       	'id_tipo' => '1',
	       	'horas' => '4',
	       	'precio' =>'11000',
	      	

       ]);

        DB::table('tarifas')->insert([

	       	'id_tipo' => '2',
	       	'horas' => '12',
	       	'precio' =>'28000',
	      	

       ]);

      
    }
}
