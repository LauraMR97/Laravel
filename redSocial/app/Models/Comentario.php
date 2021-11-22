<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;


    protected $table = 'comentarios';
    public $timestamps = false;

    public function usuarios(){
        return $this->belongsTo('App\Models\Persona','correo','correo');
    }

    public function tema(){
        return $this->belongsTo('App\Models\Tema','id_tema','id');
    }
}
