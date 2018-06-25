<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proveedorInsumo extends Model
{
     protected $table ="proveedores_insumos";

    protected $fillable=['id_proveedor', 'id_insumo', 'marca','cantidad', 'precio_unitario','tipo_comprobante','precio_total', 'fecha_compra'];
    
       public function insumo(){
       		return $this->belongsTo('App\Insumo');
		}

}
