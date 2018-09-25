<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table ="proveedores";

    protected $fillable=['nombre', 'direccion', 'telefono', 'descripcion'];


       public function scopeNombreprov($query, $nombre){
        
        if(trim($nombre)!=""){
            return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }
}
