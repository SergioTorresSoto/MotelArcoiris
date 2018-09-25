<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedorInsumo extends Model
{
     protected $table ="proveedores_insumos";

    protected $fillable=['id_proveedor', 'id_insumo', 'id_detalle_compra','marca', 'cantidad','precio_unitario','precio_total'];
    protected $hidden=['created_at','updated_at'];
    
       public function insumo(){
       		return $this->belongsTo('App\Insumo');
		}


		public function scopeInicio3($query, $inicio){
        
        if($inicio !="" || isset($inicio[$inicio])){
           whereDate('created_at', '>=', $inicio);


        }


    }

        public function scopeNombreprov2($query, $nombre){
        
        if(trim($nombre)!=""){
            return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }
}
