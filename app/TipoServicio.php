<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
       protected $table ="tipo_servicios";

       protected $fillable=['tipo'];

        public function servicio(){
    	return $this->hasMany('App\TipoServicio');
    }
}
