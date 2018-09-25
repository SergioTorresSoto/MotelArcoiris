<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabitacionInsumo extends Model
{
    protected $table ="habitaciones_insumos";

     protected $fillable=['id_insumo', 'id_habitacion', 'observacion','cantidad'];

           public function scopeNum2($query, $numero_habitacion){
        
        if(trim($numero_habitacion)!=""){
            return $query->where('numero_habitacion',"LIKE", "%$numero_habitacion%");
        }

    }
}
