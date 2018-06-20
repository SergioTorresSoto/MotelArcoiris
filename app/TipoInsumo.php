<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInsumo extends Model
{
    protected $table ="tipo_insumos";

    protected $fillable=['tipo'];

        public function insumo(){
    	return $this->hasMany('App\Insumo');
    }
 }
