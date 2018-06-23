<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TiposProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tipos_productos')->insert([

       'tipo' => 'bebestible'

       ]);

        DB::table('tipos_productos')->insert([

       'tipo' => 'dulces'

       ]);

        DB::table('tipos_productos')->insert([

       'tipo' => 'Salado'

       ]);

        DB::table('tipos_productos')->insert([

       'tipo' => 'Intimidad'

       ]);
    }
}
