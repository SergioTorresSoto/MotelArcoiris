<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table ="detalle_compra";

    protected $fillable=['tipo_comprobante','total'];
}
