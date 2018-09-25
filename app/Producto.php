<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
	{
	protected $table ="productos";

    protected $fillable=['id_tipo_producto', 'nombre', 'descripcion', 'imagen','precio','stock'];
    
       public function tipoproductos(){
       return $this->belongsTo('App\tipoProducto');

	}

	 public function scopeTipopro($query, $type){
        
        if($type !="" || isset($type[$type])){
            return $query->where('id_tipo_producto', $type);
        }

    }
    public function scopeNombrepro($query, $nombre){
        
        if(trim($nombre)!=""){
            return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }
	
}