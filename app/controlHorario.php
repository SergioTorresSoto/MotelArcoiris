<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class controlHorario extends Model
{
    protected $table ="control_horario";

    protected $fillable=['id_user', 'hora_entrada', 'hora_salida', 'fecha_entrada', 'fecha_salida', 'rut'];

       public function user(){
       	return $this->belongsTo('App\User');
       }

       public function scopeNombre3($query, $nombre){
        
       if(trim($nombre)!=""){
       return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }
       
}
