<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoProducto extends Model
{
    protected $table ="tipos_productos";

    protected $fillable=['tipo'];

        public function producto(){
    	return $this->hasMany('App\Producto');
    }
 }
