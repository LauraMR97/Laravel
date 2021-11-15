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


    public static function addRolPersona($ID_persona,$ID_rol){
         //un ejemplo de Insert con Query Builder
        DB::table('conjunto')->insert([
            'id_persona' => $ID_persona,
            'id_rol' => $ID_rol
        ]);
    }

    public static function obtenerID($nombre, $apellido)
    {
        $ID = DB::table('personas')
            ->select('ID')
            ->max('ID');

        return $ID;
    }

    public static function verAlumnos()
    {
        $personas = DB::table('personas')->get();
        //$personas = DB::select('select * from personas');

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
        $personas = DB::table('personas')->get();
        //$personas = DB::select('select * from personas');

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
        $personas = DB::table('personas')->get();
        //$personas = DB::select('select * from personas');

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre', 'apellido', 'edad')
            ->where('rol', 'Conserje')
            ->get();

        return $personas;
    }

    public static function cuantosAlumnos(){
        $numAlumnos=DB::table('conjunto')
        ->select('count(id_persona)')
        ->where('id_rol',2)
        ->get();

        return $numAlumnos;
    }
    public static function cuantosProfesores(){
        $numProfesores=DB::table('conjunto')
        ->select('count(id_persona)')
        ->where('id_rol',1)
        ->get();

        return $numProfesores;
    }

    public static function cuantosConserjes(){
        $numConserjes=DB::table('conjunto')
        ->select('count(id_persona)')
        ->where('id_rol',3)
        ->get();

        return $numConserjes;
    }


    public static function buscarAlumnoPorNombre($nombre){
        $personas = DB::table('personas')->get();
        //$personas = DB::select('select * from personas');

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre')
            ->where('rol', 'Alumno')
            ->where('nombre', "'".$nombre."'")
            ->get();

        return $personas;
    }

    public static function buscarProfesorPorNombre($nombre){
        $personas = DB::table('personas')->get();
        //$personas = DB::select('select * from personas');

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre')
            ->where('rol', 'Profesor')
            ->where('nombre', "'".$nombre."'")
            ->get();

        return $personas;
    }

    public static function buscarConserjePorNombre($nombre){
        $personas = DB::table('personas')->get();
        //$personas = DB::select('select * from personas');

        $personas = DB::table('personas')
            ->join('conjunto', 'conjunto.id_persona', '=', 'personas.ID')
            ->join('rol', 'rol.id_rol', '=', 'conjunto.id_rol')
            ->select('personas.nombre')
            ->where('rol', 'Conserje')
            ->where('nombre', "'".$nombre."'")
            ->get();

        return $personas;
    }
}
