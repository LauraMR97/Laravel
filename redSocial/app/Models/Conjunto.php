<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conjunto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rol,correo';  //Por defecto el campo clave es 'id', entero y autonumérico.
    public $incrementing = false; //Para indicarle que la clave no es autoincremental.
    protected $keyType = 'int,string';   //Indicamos que la clave no es entera.
    public $timestamps = false;   //Con esto Eloquent no maneja automáticamente created_at ni updated_at.


    public function usuarios(){
        return $this->belongsToMany('App\Models\Persona','correo','correo');
    }

    public function rol(){
        return $this->belongsToMany('App\Models\Rol','id_rol','id');
    }

}
