<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clases\Persona;
use App\Clases\Conexion;


class miControlador extends Controller
{
    public function irIndice()
    {
        return view('indice');
    }


    public function aniadirPersona(Request $val)
    {

        if ($val->get('GestionarPersonas')) {
            return view('crudPersonas');
        }

        if ($val->get('GestionarRoles')) {
            return view('crudRoles');
        }
    }

    public function ADD(Request $val)
    {
        if ($val->get('ADD')) {
            $nombre = $val->get('Nombre');
            $apellido = $val->get('Apellido');
            $edad = $val->get('Edad');
            $rol = $val->get('tipousur');
            $p = new Persona($nombre, $apellido, $edad, 1, $rol);
            Conexion::addPersona($p);
            $ID_Persona = Conexion::obtenerID($nombre, $apellido);
            $numeroRoles = count($rol);

            for ($i = 0; $i < $numeroRoles; $i++) {
                if ($rol[$i] == 'Profesor') {
                    Conexion::addRolPersona($ID_Persona, 1);
                } else if ($rol[$i] == 'Alumno') {
                    Conexion::addRolPersona($ID_Persona, 2);
                } else if ($rol[$i] == 'Conserje') {
                    Conexion::addRolPersona($ID_Persona, 3);
                }
            }

            return view('indice');
        }

        if ($val->get('Volver')) {
            return view('crudPersonas');
        }
    }

    public function Generando(Request $val)
    {
        if ($val->get('Cardinalidad')) {
            $numProfesores = Conexion::CuantosProfesores();
            $numAlumnos = Conexion::CuantosAlumnos();
            $numConserjes = Conexion::CuantosConserjes();
            $string = 'Hay: ' . $numProfesores . ' Profesores ,' . $numAlumnos . ' Alumnos y ' . $numConserjes . ' Conserjes';

            return view('indice', ['solucion' => $string]);
        }

        if ($val->get('Pertenece')) {
            $nombre = $val->get('Persona');
            $string = '';
            $persona = Conexion::buscarAlumnoPorNombre($nombre);
            if ($persona != null) {
                $string .= '[' . $nombre . ' Pertenece a Alumno]';
            }

            $persona = Conexion::buscarProfesorPorNombre($nombre);
            if ($persona != null) {
                $string .= '[' . $nombre . ' Pertenece a Profesor]';
            }

            $persona = Conexion::buscarConserjePorNombre($nombre);
            if ($persona != null) {
                $string .= '[' . $nombre . ' Pertenece a Conserje]';
            }

            return view('indice', ['solucion' => 'hola']);
        }

        if ($val->get('Union')) {

            return view('aniadir');
        }
    }

    public function Crear(Request $val){
        if ($val->get('addPersona')) {
            return view('aniadir');
        }
        if ($val->get('Volver')) {
            return view('indice');
        }
    }

}
