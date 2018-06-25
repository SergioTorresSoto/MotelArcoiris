<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{	
	protected $table ="insumos";

    protected $fillable=['id_tipo_insumo', 'nombre', 'descripcion', 'observacion', 'stock'];

    public function tipoinsumo(){
       return $this->belongsTo('App\TipoInsumo');

	}

	public function proveedor(){
       return $this->belongsTo('App\Proveedor');

	}
}