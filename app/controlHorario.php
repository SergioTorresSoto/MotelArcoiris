<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class controlHorario extends Model
{
    protected $table ="control_horario";

    protected $fillable=['id_user', 'hora_entrada', 'hora_salida', 'fecha', 'rut'];

       public function user(){
       	return $this->belongsTo('App\User');
       }

}
