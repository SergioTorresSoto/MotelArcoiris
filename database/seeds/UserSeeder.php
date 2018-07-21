<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id_type' => '1',
        	'nombre' => 'Rodolfo',
        	'apellido' => 'Cores',
        	'rut' => '18.146.996-k',
        	'telefono' => '12341234',
        	'email' => 'toto2129@hotmail.com',
            'color' => '#f45942',
        	'username' => 'toto',
        	'password' => bcrypt('1234')





        ]);

            DB::table('users')->insert([
        	'id_type' => '1',
            'color' => '#4189f4',
        	'nombre' => 'Sergio',
        	'apellido' => 'Torres',
        	'rut' => '17.969.921-4',
        	'telefono' => '22341234',
        	'email' => 'sergio@gmail.com',
        	'username' => 'sergio',
        	'password' => bcrypt('1234')





        ]);
             DB::table('users')->insert([
            'id_type' => '2',
            'color' => '#11151c',
            'nombre' => 'Masiel',
            'apellido' => 'Torres',
            'rut' => '11.111.111-1',
            'telefono' => '76538290',
            'email' => 'masiel@gmail.com',
            'username' => 'masiel',
            'password' => bcrypt('1234')





        ]);
    }
}
