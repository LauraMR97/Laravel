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


    public function GestionarAlumnos(Request $val)
    {
        $nombre = $val->get('nombre');
        $apellido = $val->get('apellido');
        $edad = intval($val->get('edad'));

        if ($val->get('Eliminar')) {
            Conexion::EliminarAlumnos($nombre, $apellido);
            return view('crudPersonas');
        }
        if ($val->get('Editar')) {
            return view('editarPersonas', ['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad]);
        }
    }

    public function GestionarProfesores(Request $val)
    {
        $nombre = $val->get('nombre');
        $apellido = $val->get('apellido');
        $edad = intval($val->get('edad'));

        if ($val->get('Eliminar')) {
            Conexion::EliminarProfesores($nombre, $apellido);
            return view('crudPersonas');
        }
        if ($val->get('Editar')) {
            return view('editarPersonas', ['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad]);
        }
    }

    public function GestionarConserjes(Request $val)
    {
        $nombre = $val->get('nombre');
        $apellido = $val->get('apellido');
        $edad = intval($val->get('edad'));

        if ($val->get('Eliminar')) {
            Conexion::EliminarConserjes($nombre, $apellido);
            return view('crudPersonas');
        }
        if ($val->get('Editar')) {

            return view('editarPersonas', ['nombre' => $nombre, 'apellido' => $apellido, 'edad' => $edad]);
        }
    }

    public function EditarUsuarios(Request $val)
    {

        if ($val->get('Volver')) {
            return view('crudPersonas');
        }

        if ($val->get('editar')) {
            $nuevoNombre = $val->get('nombre');
            $nuevoApellido = $val->get('apellido');
            $nuevaEdad = intval($val->get('edad'));
            $roles = $val->get('tipousur');
            $perAnt = session()->get('perAnt');

             $ID_Persona = Conexion::obtenerIDConcreto($perAnt[0]->nombre, $perAnt[0]->apellido);
             $numeroRoles = count($roles);

            Conexion::BorrarTodosLosRoles($ID_Persona);

             for ($i = 0; $i < $numeroRoles; $i++) {
                if ($roles[$i] == 'Profesor') {
                    Conexion::addRolPersona($ID_Persona[0]->ID, 1);
                } else if ($roles[$i] == 'Alumno') {
                    Conexion::addRolPersona($ID_Persona[0]->ID, 2);
                } else if ($roles[$i] == 'Conserje') {
                    Conexion::addRolPersona($ID_Persona[0]->ID, 3);
                }
            }

            Conexion::EditarPersona($nuevoNombre, $nuevoApellido, $nuevaEdad, $perAnt);

            return view('crudPersonas');
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
            $ID_Persona = Conexion::obtenerID();
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

            if (!$persona->isEmpty()) {
                $string .= '[' . $nombre . ' Pertenece a Alumno]' . PHP_EOL;
            }

            $persona = Conexion::buscarProfesorPorNombre($nombre);
            if (!$persona->isEmpty()) {
                $string .= '[' . $nombre . ' Pertenece a Profesor]' . PHP_EOL;
            }

            $persona = Conexion::buscarConserjePorNombre($nombre);
            if (!$persona->isEmpty()) {
                $string .= '[' . $nombre . ' Pertenece a Conserje]' . PHP_EOL;
            }

            return view('indice', ['solucion' => $string]);
        }

        if ($val->get('Union')) {
            $personas = Conexion::Union();

            return view('indice', ['solucion' => $personas]);
        }

        if ($val->get('Intersect')) {
            $personas = Conexion::Intersect();
            $solucion = '';

            foreach ($personas as $p) {
                $solucion .= '[' . $p . ']' . PHP_EOL;
            }


            return view('indice', ['solucion' => $solucion]);
        }
    }


    public function Crear(Request $val)
    {
        if ($val->get('addPersona')) {
            return view('aniadir');
        }
        if ($val->get('Volver')) {
            return view('indice');
        }
    }
}
