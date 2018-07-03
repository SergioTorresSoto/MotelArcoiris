<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users_type')->insert([

       	'type' => 'Administrador'

       ]);

        DB::table('users_type')->insert([

       	'type' => 'Ususario'

       ]);

        DB::table('users_type')->insert([

        'type' => 'Cliente'

       ]);
    }
}
