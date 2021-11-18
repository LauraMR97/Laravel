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


        if ($val->get('aceptar')) {
            $c = $val->get('correo');
            $p = $val->get('password');

            $pers = Persona::where('correo', $c)->where('password', $p)->first();

            if($pers!=null){
                $rol = Conjunto::where('correo', $c)->first();
                if($rol->id_rol==1){
                    return view('admin');
                }else{
                    return view('temas');
                }
            }else{
                return view('indice');
            }
        }
    }

    public function generarPersonas(Request $val){
        $fak = \Faker\Factory::create('es_ES');

        $pe = new Persona;
        $pe->correo = $fak->email;
        $pe->nombre = $fak->name;
        $pe->edad = $fak->year;
        $pe->password =$fak->password;
        $mensaje = 'Inserción ok';

        try {
            $pe->save();
            $co = new Conjunto;
            $co->id_rol = 2;
            $co->correo = $fak->email;
            $co->save();
        } catch (\Exception $e) {
            $mensaje = $e->getMessage();
            dd($e);
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
            $e = intval($val->get('edad'));
            $p = $val->get('password');

            $pe = new Persona;
            $pe->correo = $c;
            $pe->nombre = $n;
            $pe->edad = $e;
            $pe->password = $p;
            $mensaje = 'Inserción ok';

            try {
                $pe->save();
                $co = new Conjunto;
                $co->id_rol = 2;
                $co->correo = $c;
                $co->save();
            } catch (\Exception $e) {
                $mensaje = $e->getMessage();
                dd($e);
            }

            return view('indice', ['mens' => $mensaje]);
        }
    }
}
