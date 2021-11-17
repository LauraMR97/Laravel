<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    public function comentarios(){
        return $this->belongsToMany('App\Models\Comentario','id','id_tema');
    }
}

