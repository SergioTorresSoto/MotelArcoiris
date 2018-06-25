<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedorInsumo extends Model
{
     protected $table ="proveedores_insumos";

    protected $fillable=['id_proveedor', 'id_insumo', 'id_detalle_compra','marca', 'contenido','cantidad','precio_unitario','precio_total'];
    
       public function insumo(){
       		return $this->belongsTo('App\Insumo');
		}

}
