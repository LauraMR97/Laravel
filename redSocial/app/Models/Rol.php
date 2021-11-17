<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    public function conjunto(){
        return $this->belongsToMany('App\Models\Conjunto','id','id_rol');
    }
}
