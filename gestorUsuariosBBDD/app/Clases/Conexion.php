<?php

namespace App\Clases;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Conexion
{

    public static function addPersona($p)
    {
        //un ejemplo de Insert sin Query Builder
        DB::insert('insert into personas(nombre,apellido,edad) values (?, ?, ?)', [$p->getNombre(), $p->getApellido(), $p->getEdad()]);
    }


    public static function addRolPersona($ID_persona, $ID_rol)
    {
        //un ejemplo de Insert con Query Builder
        DB::table('conjunto')->insert([
            'id_persona' => $ID_persona,
            'id_rol' => $ID_rol
        ]);
    }

    public static function obtenerID()
    {
        $ID = DB::table('personas')
            ->select('ID')
            ->max('ID');

        return $ID;
    }

    public static function verAlumnos()
    {

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Alumno')
            ->get();

        return $personas;
    }

    public static function verProfesores()
    {

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Profesor')
            ->get();

        return $personas;
    }

    public static function verConserjes()
    {

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Conserje')
            ->get();

        return $personas;
    }

    public static function cuantosAlumnos()
    {
        $numAlumnos = DB::table('conjunto')
            ->where('id_rol', 2)
            ->count();

        return $numAlumnos;
    }
    public static function cuantosProfesores()
    {
        $numProfesores = DB::table('conjunto')
            ->where('id_rol', 1)
            ->count();

        return $numProfesores;
    }

    public static function cuantosConserjes()
    {
        $numConserjes = DB::table('conjunto')
            ->where('id_rol', 3)
            ->count();

        return $numConserjes;
    }


    public static function buscarAlumnoPorNombre($nombre)
    {

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre')
            ->where('rol', 'Alumno')
            ->where('personas.nombre', $nombre)
            ->get();

        return $personas;
    }

    public static function buscarProfesorPorNombre($nombre)
    {

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre')
            ->where('rol', 'Profesor')
            ->where('personas.nombre', $nombre)
            ->get();

        return $personas;
    }

    public static function buscarConserjePorNombre($nombre)
    {
        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre')
            ->where('rol', 'Conserje')
            ->where('personas.nombre', $nombre)
            ->get();

        return $personas;
    }

    public static function Union()
    {

        $profesores = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Profesor');

        $alumnos = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Alumno');


        $conserjes = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Conserje')
            ->union($profesores)
            ->union($alumnos)
            ->get();

        return $conserjes;
    }


    public static function Intersect()
    {

        $profesores = Conexion::verProfesores()->toArray();
        $alumnos = Conexion::verAlumnos()->toArray();
        $conserjes = Conexion::verConserjes()->toArray();

        foreach ($profesores as $p) {
            $auxProfesores[] = $p->nombre;
        }

        foreach ($alumnos as $a) {
            $auxAlumnos[] = $a->nombre;
        }

        foreach ($conserjes as $c) {
            $auxConserjes[] = $c->nombre;
        }


        $resultado = array_intersect($auxProfesores, $auxAlumnos, $auxConserjes);

        return $resultado;
    }


    public static function EliminarAlumnos($nombre, $apellido)
    {
        DB::table('conjunto')
            ->join('personas', 'personas.ID', '=', 'conjunto.id_persona')
            ->where('id_rol', 2)
            ->where('personas.nombre', $nombre)
            ->where('personas.apellido', $apellido)
            ->delete();
    }

    public static function EliminarProfesores($nombre, $apellido)
    {
        DB::table('conjunto')
            ->join('personas', 'personas.ID', '=', 'conjunto.id_persona')
            ->where('id_rol', 1)
            ->where('personas.nombre', $nombre)
            ->where('personas.apellido', $apellido)
            ->delete();
    }

    public static function EliminarConserjes($nombre, $apellido)
    {
        DB::table('conjunto')
            ->join('personas', 'personas.ID', '=', 'conjunto.id_persona')
            ->where('id_rol', 3)
            ->where('personas.nombre', $nombre)
            ->where('personas.apellido', $apellido)
            ->delete();
    }


    public static function buscarPersonaCompletaPorNombre($nombre, $apellido)
    {

        $persona = DB::table('personas')
            ->select('nombre', 'apellido', 'edad')
            ->where('nombre', '=', $nombre)
            ->where('nombre', $nombre)
            ->where('apellido', $apellido)
            ->get();

        return $persona;
    }

    public static function editarPersona($nuevoNombre, $nuevoApellido, $nuevaEdad, $perAnt)
    {
        DB::table('personas')
            ->where('nombre', $perAnt[0]->nombre)
            ->where('apellido', $perAnt[0]->apellido)
            ->where('edad', $perAnt[0]->edad)
            ->update(['nombre' => $nuevoNombre, 'apellido' => $nuevoApellido, 'edad' => $nuevaEdad]);
    }

    /*public static function editRolPersona($ID_persona, $ID_rol)
    {

        DB::table('conjunto')
        ->where('nombre', $perAnt[0]->nombre)
        ->where('apellido', $perAnt[0]->apellido)
        ->where('edad', $perAnt[0]->edad)
        ->update(['nombre' => $nuevoNombre, 'apellido' => $nuevoApellido, 'edad' => $nuevaEdad]);
    }*/

    public static function verRolPersona($ID_Persona)
    {

        $roles = DB::table('conjunto')
            ->select('id_rol')
            ->where('id_persona', '=', $ID_Persona[0]->ID)
            ->get();

        return $roles;
    }

    public static function obtenerIDConcreto($nombre, $apellido)
    {
        $ID = DB::table('personas')
            ->select('ID')
            ->where('nombre', '=', $nombre)
            ->where('apellido', '=', $apellido)
            ->get();

        return $ID;
    }

    public static function borrarTodosLosRoles($ID_Persona)
    {
        DB::table('conjunto')
            ->where('id_persona', $ID_Persona[0]->ID)
            ->delete();
    }
}
