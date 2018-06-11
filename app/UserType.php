<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = "users_type";
    protected $fillable = ['type'];

        public function user(){
    	return $this->hasMany('App\User');
    }

}
