<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use Carbon\Carbon;
use App\Insumo;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Insumo::class, function (Faker\Generator $faker) {
 
    return [
        'id_tipo_insumo'    => $faker->randomElement($array = array('1', '2', '3')),
        'nombre'            => $faker->name,
        'descripcion'       =>$faker->title, 
        'observacion'		=> $faker->paragraph,
        'stock'				=>$faker->numberBetween($min = 1, $max = 150),
    ];
});


$factory->define(App\Producto::class, function (Faker\Generator $faker) {
 
    return [
        'id_tipo_producto'    => $faker->randomElement($array = array('1', '2', '3','4')),
        'nombre'              => $faker->name,
        'descripcion'         => $faker->title, 
        'stock'               => $faker->numberBetween($min = 1, $max = 150),
        'precio'              => $faker->numberBetween($min = 1000, $max = 100000),
        
    ];
});

$factory->define(App\controlHorario::class, function (Faker\Generator $faker) {

            $year = rand(2016, 2018);
            if($year == 2018){
                $month = rand(1, 10);
            }else{
                $month = rand(1, 12);    
            }
            $month = rand(1, 12);
            $day = rand(1, 28);
            $hour = rand(0,23);
            $min = rand(0,59);

            $date = Carbon::create($year,$month ,$day , $hour, $min, 0);
        
 
    return [
        'id_user'    => $faker->randomElement($array = array('5', '3','4')),
        'hora_entrada'       => $date->format('H:i:s'),
        'fecha_entrada'        => $date->format('Y-m-d'),
        'hora_salida'          => $date->addHours(rand(4, 8))->format('H:i:s'),
        'fecha_salida'      => $date->addDays(rand(0, 1))->format('Y-m-d'),
        'rut'           => $faker->randomElement($array = array('8.145.838-3', '17.000.221-0','19.826.868-2')),
        
    ];
});

$factory->define(App\userJornada::class, function (Faker\Generator $faker) {

            $year = rand(2016, 2018);
            if($year == 2018){
                $month = rand(1, 10);
            }else{
                $month = rand(1, 12);    
            }
            $month = rand(1, 12);
            $day = rand(1, 28);
            $hour = rand(0,23);
            $min = rand(0,59);

            $date = Carbon::create($year,$month ,$day , $hour, $min, 0);

            $id_usuario = rand(3,5);
            $color="";
            if($id_usuario==3){
                $color ="#8fd6e4";
            }
            if($id_usuario==4){
                $color = "#e8ca8c";
            }
            if($id_usuario==5){
                $color ="#ce93e1";
            }
        
 
    return [
        'id_jornada'    => $faker->randomElement($array = array('1', '2','3','4')),
        'id_user'       => $id_usuario,
        'fecha_entrada' => $date->format('Y-m-d'),
        'fecha_salida'  => $date->addDays(rand(0, 1))->format('Y-m-d'),
        'color'         => $color,
        'created_at'    => $date->format('Y-m-d H:i:s'),
      
        
    ];
});

$factory->define(App\UsuarioHabitacion::class, function (Faker\Generator $faker) {

            $year = rand(2016, 2018);
            if($year == 2018){
                $month = rand(1, 10);
            }else{
                $month = rand(1, 12);    
            }
            $day = rand(1, 28);
            $hour = rand(0,23);
            $min = rand(0,59);

            $date = Carbon::create($year,$month ,$day , $hour, $min, 0);

            $id_usuario = rand(6,29);
            $id_habitacion = rand(1,25);
            $tiempo_reserva = $faker->randomElement($array = array('4', '12'));
        
 
    return [
        'id_habitacion'    => $id_habitacion,
        'id_usuario'       => $id_usuario,
        'tiempo_reserva'   => $tiempo_reserva,
        'tiempo_inicio'    => $date,
        'tiempo_fin'  => $date->addHours($tiempo_reserva),
        'tiempo_fin_real'=> $date->addHours($tiempo_reserva),
        'tarifa'        => $faker->randomElement($array = array('18000', '11000','28000')),
        'tarifa_horas_extras'=> $faker->randomElement($array = array('1000', '0','2000')),
        'es_online'     => rand(0,1),
        'activa'        => 0,
        'reserva'       =>rand(0,1),
        'tipo_pago'  =>$faker->randomElement($array = array('Efectivo', 'Tarjeta')),
        'created_at' =>$date,
     

        'created_at'    => $date->format('Y-m-d H:i:s'),
      
        
    ];
});

$factory->define(App\HabitacionInsumo::class, function (Faker\Generator $faker) {

            $insumos = Insumo::select('id')->inRandomOrder()->get();
            $year = rand(2016, 2018);
            if($year == 2018){
                $month = rand(1, 10);
            }else{
                $month = rand(1, 12);    
            }
            
            $day = rand(1, 28);
            $hour = rand(0,23);
            $min = rand(0,59);

            $date = Carbon::create($year,$month ,$day , $hour, $min, 0);

            
            $id_habitacion = rand(1,25);
            $id_insumo = rand(1,11);
        
 
    return [
        'id_habitacion'    => $id_habitacion,
        'id_insumo'       => $insumos[0]->id,
        'cantidad'          =>rand(1,5),
    
        'created_at' =>$date,
      
        
    ];
});


