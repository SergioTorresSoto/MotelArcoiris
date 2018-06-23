<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TipoInsumoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_insumos')->insert([

       'tipo' => 'aseo'

       ]);

        DB::table('tipo_insumos')->insert([

       'tipo' => 'calefaccion'

       ]);

        DB::table('tipo_insumos')->insert([

       'tipo' => 'otro'

       ]);
    }
}
