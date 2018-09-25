<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorProducto extends Model
{
    protected $table ="proveedores_productos";

    protected $fillable=['id_proveedor', 'id_producto','id_detalle_compra', 'marca_producto', 'precio_unitario','cantidad','precio_total'];



	public function scopeInicio3($query, $inicio){
        
        if($inicio !="" || isset($inicio[$inicio])){
           whereDate('created_at', '>=', $inicio);


        }


    }

        public function scopeNombreprov3($query, $nombre){
        
        if(trim($nombre)!=""){
            return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }
    
}
