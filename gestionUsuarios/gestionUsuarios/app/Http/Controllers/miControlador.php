<?php

namespace App\Http\Controllers;

use App\Clases\Persona;
use App\Clases\Conjunto;
use Illuminate\Http\Request;

class miControlador extends Controller
{
    public function irIndice()
    {
        return view('indice');
    }


    public function aniadirPersona(Request $val)
    {
        if ($val->get('Persona')) {
            return view('aniadir');
        }
        if ($val->get('Borrar')) {
            session()->forget('profesores');
            session()->forget('alumnos');
            session()->forget('ID');
            return view('indice');
        }
    }

    public function Gestion(Request $val)
    {

        if ($val->get('Cardinalidad')) {
            $aux = '';
            $profesores = session()->get('profesores');
            $alumnos = session()->get('alumnos');

            $aux .= 'Hay ';
            $aux .= strval($profesores->cuantasPersonas());
            $aux .= ' Profesores y ';
            $aux .= strval($alumnos->cuantasPersonas());
            $aux .= ' Alumnos';

            return view('indice', ['solucion' => $aux]);
        }

        if ($val->get('Union')) {
            $profesores = session()->get('profesores');
            $alumnos = session()->get('alumnos');
            $aux = $profesores->union($alumnos);

            return view('indice', ['solucion' => $aux]);
        }

        if ($val->get('Intersect')) {
            $profesores = session()->get('profesores');
            $alumnos = session()->get('alumnos');

            $aux = $profesores->intersect($alumnos);

            return view('indice', ['solucion' => $aux]);
        }

        if ($val->get('Pertenece')) {
            $profesores = session()->get('profesores');
            $alumnos = session()->get('alumnos');
            $personaBuscada = $val->get('Persona');
            $aux = '';

            if ($profesores->buscarPorNombre($personaBuscada)) {
                $aux .= '[' . $personaBuscada . ' Existe en Profesores]' . PHP_EOL;
            }
            if ($alumnos->buscarPorNombre($personaBuscada)) {
                $aux .= '[' . $personaBuscada . ' Existe en Alumnos]' . PHP_EOL;
            }

            return view('indice', ['solucion' => $aux]);
        }
    }


    public function ADD(Request $val)
    {
        if ($val->get('ADD')) {
            $profesores = session()->get('profesores');
            $alumnos = session()->get('alumnos');
            $nombre = $val->get('Nombre');
            $apellido = $val->get('Apellido');
            $edad = $val->get('Edad');
            $rol = $val->get('rol');

            if (!session()->has('ID')) {
                $ID = 0;
                session()->put('ID', $ID);
            } else {
                $ID = session()->get('ID');
                $ID++;
                session()->put('ID', $ID);
            }

            if ($rol == 'Profesor') {
                $profesor = new Persona($nombre, $apellido, $edad, $ID);
                $profesores->addPersona($profesor);
                session()->put('profesores', $profesores);
            } else {
                if ($rol == 'Alumno') {
                    $alumno = new Persona($nombre, $apellido, $edad, $ID);
                    $alumnos->addPersona($alumno);
                    session()->put('alumnos', $alumnos);
                } else {
                    $profesor = new Persona($nombre, $apellido, $edad, $ID);
                    $profesores->addPersona($profesor);
                    session()->put('profesores', $profesores);
                    $alumno = new Persona($nombre, $apellido, $edad, $ID);
                    $alumnos->addPersona($alumno);
                    session()->put('alumnos', $alumnos);
                }
            }
            return view('indice');
        }
        if ($val->get('Volver')) {
            return view('indice');
        }
    }

    public function EliminarAlumno(Request $val)
    {
        $ID = $val->get('ID');
        $alumnos = session()->get('alumnos');
        $alumnos->delPersonaPorID($ID);
         session()->put('alumnos',$alumnos);

        return view('indice');
    }

    public function EliminarProfesor(Request $val)
    {
        $ID = $val->get('ID');
        $profesores = session()->get('profesores');
        $profesores->delPersonaPorID($ID);
        session()->put('profesores',$profesores);

        return view('indice');
    }
}
