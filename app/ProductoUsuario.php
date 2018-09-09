<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoUsuario extends Model
{
    	protected $table ="productos_usuarios";

    protected $fillable=['id_usuario', 'id_producto','id_detalle_venta', 'cantidad','precio_unitario','marca_producto','precio_total'];
    
}
