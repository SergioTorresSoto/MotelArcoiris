<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioHabitacion extends Model
{
    protected $table ="usuarios_habitaciones";

    protected $fillable=['id_usuario', 'id_habitacion', 'tiempo_reserva','tiempo_inicio', 'tiempo_fin','tiempo_fin_real','tarifa','observacion','tarifa_horas_extras','es_online','activa','patente','tipo_pago'];
    
    
       
}
