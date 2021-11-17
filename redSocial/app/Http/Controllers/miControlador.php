<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;
use App\Models\Rol;
use App\Models\Conjunto;
use App\Models\Comentario;
use App\Models\Tema;

class miControlador extends Controller
{
    public function irIndice()
    {
        return view('indice');
    }

    public function login(Request $val)
    {

        if ($val->get('registro')) {
            return view('registro');
        }
    }

    public function Registro(Request $val)
    {

        if ($val->get('volver')) {
            return view('indice');
        }

        if ($val->get('registrar')) {
            $n = $val->get('nombre');
            $c = $val->get('correo');
            $e = $val->get('edad');
            $p = $val->get('password');

            $pe = new Persona;
            $pe->correo = $c;
            $pe->nombre = $n;
            $pe->edad = $e;
            $pe->passowrd = $p;
            $mensaje = 'Inserción ok';

            $co = new Conjunto;
            $co->id_rol = 2;
            $co->correo = $c;
            $co->save();

            try {
                $pe->save();
            } catch (\Exception $e) {
                $mensaje = 'Clave duplicada';
            }



            return view('indice', ['mens' => $mensaje]);
        }
    }
}
