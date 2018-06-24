<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoHabitacion extends Model
{       
    protected $table ="estado_habitaciones";

    protected $fillable=['estado'];

         public function habitacion2(){
    	return $this->hasMany('App\Habitacion');
    }
}
