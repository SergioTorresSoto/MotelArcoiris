<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
	{
	protected $table ="productos";

    protected $fillable=['id_tipo_producto', 'nombre', 'descripcion', 'imagen', 'stock'];
    /*
       public function tipoproductos(){
       return $this->belongsTo('App\tipoProducto');

	}
	*/
}