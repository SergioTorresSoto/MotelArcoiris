<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table ="detalle_compra";

    protected $fillable=['id_compra', 'marca', 'contenido','cantidad','precio_unitario','precio_total'];
}
