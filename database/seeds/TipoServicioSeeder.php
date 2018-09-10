<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  		DB::table('tipo_servicios')->insert([

       'tipo' => 'Luz'

       ]);

        DB::table('tipo_servicios')->insert([

       'tipo' => 'Agua'

       ]);

        DB::table('tipo_servicios')->insert([

       'tipo' => 'Gas'

       ]);

        DB::table('tipo_servicios')->insert([

       'tipo' => 'Otro'

       ]);
    }
}
