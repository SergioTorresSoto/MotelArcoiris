<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table ="detalles_ventas";

    protected $fillable=['tipo_comprobante','activa','total'];
}
