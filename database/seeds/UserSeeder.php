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
        	'nombre' => 'Anyolina',
        	'apellido' => 'Soto',
        	'rut' => '9.130.666-2',
        	'telefono' => '997327722',
        	'email' => 'anyolinasotop@hotmail.cl',

        	'username' => 'anyolina',
        	'password' => bcrypt('1234')


        ]);

            DB::table('users')->insert([
        	'id_type' => '1',

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

            'nombre' => 'Margarita',
            'apellido' => 'Soto',
            'rut' => '8.145.838-3',
            'telefono' => '983274464',
            'email' => 'margarita@gmail.com',
            'username' => 'margarita',
            'password' => bcrypt('1234')





        ]);

        DB::table('users')->insert([
            'id_type' => '2',

            'nombre' => 'Carolina',
            'apellido' => 'Catril',
            'rut' => '17.000.221-0',
            'telefono' => '765384543',
            'email' => 'Carolina123@gmail.com',
            'username' => 'carolina',
            'password' => bcrypt('1234')

        ]);

        DB::table('users')->insert([
            'id_type' => '2',

            'nombre' => 'Cristian',
            'apellido' => 'Ramirez',
            'rut' => '19.826.868-2',
            'telefono' => '9962625277',
            'email' => 'cristian123@gmail.com',
            'username' => 'cristian',
            'password' => bcrypt('1234')

        ]);

        DB::table('users')->insert([
            'id_type' => '3',
            'email' => '1',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);

        DB::table('users')->insert([
            'id_type' => '3',
            'email' => '2',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);

         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '3',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);

          DB::table('users')->insert([
            'id_type' => '3',
            'email' => '4',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);

           DB::table('users')->insert([
            'id_type' => '3',
            'email' => '5',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '6',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
          DB::table('users')->insert([
            'id_type' => '3',
            'email' => '7',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '8',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
          DB::table('users')->insert([
            'id_type' => '3',
            'email' => '9',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '10',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '11',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '12',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);

         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '13',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '14',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '15',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);

         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '16',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '17',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '18',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '19',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '20',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '21',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '22',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '23',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
         DB::table('users')->insert([
            'id_type' => '3',
            'email' => '24',
            'password' => bcrypt('123456'),
            'password_cliente' => encrypt('123456')
           

        ]);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

    }
}
