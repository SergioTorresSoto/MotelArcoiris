<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacion extends Model
{
    protected $table ="tipo_habitaciones";

    protected $fillable=['tipo'];

        public function habitacion(){
    	return $this->hasMany('App\Habitacion');
    }
}
