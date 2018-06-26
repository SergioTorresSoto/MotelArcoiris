<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table ="detalles_compras";

    protected $fillable=['tipo_comprobante','total'];
}
