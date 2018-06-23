<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    protected $table ="jornadas";

    protected $fillable=['hora_entrada', 'hora_salida', 'duracion_hora', 'duracion_minuto'];

       public function user(){
       	return $this->belongsToMany('App\User','users_jornadas','id_jornada','id_user')
       		->withPivot('fecha_entrada','fecha_salida');
       }
}
