<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoServicio extends Model
{
    protected $table ="pago_servicios";

    protected $fillable=['id_tipo_servicio', 'fecha', 'valor_servicio', 'cantidad'];
    
       public function tipoproductos(){
       return $this->belongsTo('App\TipoServicio');
}


	 public function scopeTiposer($query, $type){
        
        if($type !="" || isset($type[$type])){
            return $query->where('id_tipo_servicio', $type);
        }
    }

      public function scopeInicio2($query, $inicio){
        
        if($inicio !="" || isset($inicio[$inicio])){
            return $query->where('fecha','>=', $inicio);
        }

    }

    }

