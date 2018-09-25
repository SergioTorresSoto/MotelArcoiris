<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    protected $table ="habitaciones";

    protected $fillable=['id_tipo_habitacion','id_estado_habitacion','numero_habitacion', 'descripcion','observacion', 'imagen'];
    
       public function tipoproductos(){
       return $this->belongsTo('App\TipoHabitacion');

	}

	   public function estadohabitacion(){
       return $this->belongsTo('App\EstadoHabitacion');

	}


     public function scopeTipohab($query, $type){
        
        if($type !="" || isset($type[$type])){
            return $query->where('id_tipo_habitacion', $type);
        }

    }
    public function scopeNum($query, $numero_habitacion){
        
        if(trim($numero_habitacion)!=""){
            return $query->where('numero_habitacion',"LIKE", "%$numero_habitacion%");
        }

    }


	public function scopeEstado($query, $estado){
        
        if($estado !="" || isset($estado[$estado])){
            return $query->where('id_estado_habitacion', $estado);
        }

    }

    public function scopeActiva($query, $activa){
        
        if($activa !="" || isset($activa[$activa])){
            return $query->where('usuarios_habitaciones.activa', $activa);
        }

    }

    public function scopeInicio($query, $inicio){
        
        if($inicio !="" || isset($inicio[$inicio])){
            return $query->whereDate('tiempo_inicio','>=', $inicio);
        }

    }

    public function scopeFin($query, $fin){
        
        if($fin !="" || isset($fin[$fin])){
            return $query->whereDate('tiempo_fin','<=', $fin);
        }

    }

    public function scopeOrdenar($query, $ordenar){
        
        if($ordenar !="" || isset($ordenar[$ordenar])){
          $split = explode(',', $ordenar, 2);
          
            return $query->orderBy($split[0],$split[1]);
        }

    }
}
