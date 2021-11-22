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
            session()->put('persona', $pers);

            if ($pers != null) {
                $rol = Conjunto::where('correo', $c)->first();
                if ($rol->id_rol == 1) {
                    return view('admin');
                } else {
                    $temas = Tema::all();
                    return view('temas', ['temas' => $temas]);
                }
            } else {
                return view('indice');
            }
        }
    }

    public function generarPersonas(Request $val)
    {
        if ($val->get('generar')) {
            for ($i = 0; $i < 10; $i++) {
                $fak = \Faker\Factory::create('es_ES');

                $edad = rand(0, 100);
                $pe = new Persona;
                $pe->correo = $fak->email;
                $pe->nombre = $fak->name;
                $pe->edad = $fak->year;
                $pe->password = $fak->password;
                $pe->edad = $edad;
                $mensaje = 'Inserción ok';


                try {
                    $pe->save();
                    $co = new Conjunto;
                    $co->id_rol = 2;
                    $co->correo = $pe->correo;
                    $co->save();
                } catch (\Exception $e) {
                    $mensaje = $e->getMessage();
                    dd($e);
                }
            }
            return view('admin');
        }

        if ($val->get('volver')) {
            return view('indice');
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

    public function gestionarTemas(Request $val)
    {
        if ($val->get('add')) {
            return view('addTema');
        }

        if ($val->get('volver')) {
            return view('indice');
        }
    }

    public function aniadirTemaNuevo(Request $val)
    {
        if ($val->get('add')) {
            $nombre = $val->get('nombre');
            $edad = $val->get('edad');
            $creador = session()->get('persona');
            $emailCreador = $creador->correo;

            $tema = new Tema();
            $tema->titulo = $nombre;
            $tema->correo = $emailCreador;
            $tema->edad_minima = $edad;

            try {
                $tema->save();
            } catch (\Exception $e) {
                $mensaje = $e->getMessage();
                dd($e);
            }

            $temas = Tema::all();
            return view('temas', ['temas' => $temas]);
        }

        if ($val->get('volver')) {
            $temas = Tema::all();
            return view('temas', ['temas' => $temas]);
        }
    }

    public function verYBorrarTemas(Request $val)
    {
        $titulo = $val->get('titulo');
        $edad = $val->get('edad_Minima');

        if ($val->get('ver')) {
            $tema = Tema::where('titulo', '=', $titulo)->first();
            $edadTema = $tema->edad_minima;
            $idTema = $tema->id;

            $persona = session()->get('persona');
            $edadPersona = $persona->edad;

            //Restriccion de edad para acceder a los temas
            if ($edadPersona < $edadTema) {
                $temas = Tema::all();
                return view('temas', ['temas' => $temas]);
            } else {
                session()->put('temaVisualizado', $tema);
                $comentarios = Comentario::where('id_tema', $idTema)->get();
                return view('temaAbierto', ['tema' => $tema, 'comentarios' => $comentarios]);
            }
        }

        if ($val->get('borrar')) {

            // Conseguimos el objeto
            $tema = Tema::where('titulo', '=', $titulo)->first();

            // Lo eliminamos de la base de datos
            $tema->delete();

            $temas = Tema::all();
            return view('temas', ['temas' => $temas]);
        }
    }


    public function volverDeTemaAbierto(Request $val)
    {
        if ($val->get('volver')) {
            $temas = Tema::all();
            return view('temas', ['temas' => $temas]);
        }

        if ($val->get('addComentario')) {
            $tema = session()->get('temaVisualizado');
            $persona = session()->get('persona');
            $emailPersona = $persona->correo;
            $comentario = $val->get('comentario');
            $idTema = $tema->id;


            //añadiendo nuevo comentario
            $nuevoComent = new Comentario;
            $nuevoComent->descripcion = $comentario;
            $nuevoComent->correo = $emailPersona;
            $nuevoComent->id_r = 0;
            $nuevoComent->id_tema = $idTema;

            try {
                $nuevoComent->save();
            } catch (\Exception $e) {
                $mensaje = $e->getMessage();
                dd($e);
            }

            $comentarios = Comentario::where('id_tema', $idTema)->get();
            return view('temaAbierto', ['tema' => $tema, 'comentarios' => $comentarios]);
        }
    }

    public function ventanaRespuesta(Request $val)
    {
        return view('crearRespuesta');
    }

    public function addRespuesta(Request $val)
    {
        if ($val->get('volver')) {
            $tema = session()->get('temaVisualizado');
            $idTema = $tema->id;

            $comentarios = Comentario::where('id_tema', $idTema)->get();
            return view('temaAbierto', ['tema' => $tema, 'comentarios' => $comentarios]);
        }

        if ($val->get('addRespuesta')) {
        }
    }
}
