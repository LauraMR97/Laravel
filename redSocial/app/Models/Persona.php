<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'correo';  //Por defecto el campo clave es 'id', entero y autonumérico.
    public $incrementing = false; //Para indicarle que la clave no es autoincremental.
    protected $keyType = 'string';   //Indicamos que la clave no es entera.
    public $timestamps = false;   //Con esto Eloquent no maneja automáticamente created_at ni updated_at.

    public function comentarios(){
        return $this->hasMany('App\Models\Comentario','correo','correo');
    }
    public function conjunto(){
        return $this->hasMany('App\Models\Conjunto','correo','correo');
    }

    public function tema(){
        return $this->hasMany('App\Models\Tema','correo','correo');
    }
}
