<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitacionInsumo extends Model
{
    protected $table ="habitaciones_insumos";

     protected $fillable=['id_insumo', 'id_habitacion', 'observacion','cantidad'];
}
