<?php

use Illuminate\Database\Seeder;

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
    }
}
