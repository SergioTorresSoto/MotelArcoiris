<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
     protected $table ="tarifas";

     protected $fillable=['id_tipo', 'horas', 'precio'];

           public function scopetipohab2($query, $type){
        
        if($type !="" || isset($type[$type])){
            return $query->where('id_tipo', $type);
        }

    }
}
