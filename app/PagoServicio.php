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

}
