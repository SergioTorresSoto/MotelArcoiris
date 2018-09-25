<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userJornada extends Model
{
    protected $table ="users_jornadas";

    protected $fillable=['id_user', 'id_jornada', 'color','fecha_entrada', 'fecha_salida'];
    
       public function users(){
       		return $this->belongsTo('App\User');
		}


}
