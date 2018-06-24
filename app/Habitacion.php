<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table ="habitaciones";

    protected $fillable=['id_tipo_habitacion','id_estado_habitacion','numero_habitacion', 'descripcion','observacion', 'imagen'];
    
       public function tipoproductos(){
       return $this->belongsTo('App\TipoHabitacion');

	}

	   public function estadohabitacion(){
       return $this->belongsTo('App\EstadoHabitacion');

	}
}
