<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'rut', 'telefono', 'email', 'password', 'username','id_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userType(){
        return $this->belongsTo('App\userType');
    }

    public function controlHorario(){
        return $this->hasMany('App\controlHorario');
    }

    public function jornada(){
        return $this->belongsToMany('App\Jornada','users_jornadas','id_user','id_jornada')
            ->withPivot('fecha_entrada','fecha_salida');
    }

    public function scopeType($query, $type){
        
        if($type !="" || isset($type[$type])){
            return $query->where('id_type', $type);
        }

    }
    public function scopeNombre($query, $nombre){
        
        if(trim($nombre)!=""){
            return $query->where('nombre',"LIKE", "%$nombre%");
        }

    }

    public function scopeNumero($query, $numero){
        
        if(trim($numero)!=""){
            return $query->where('email',$numero);
        }

    }

    public function tipo1()
    {

        return $this->id_type === 1;
    }


      public function tipo2()
    {

        return $this->id_type === 2;
    }

    public function tipo3()
    {

        return $this->id_type === 3;
    }
}
