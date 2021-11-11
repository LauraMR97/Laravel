<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miControlador extends Controller
{
    public function irIndice()
    {
        return view('indice');
    }

    public function generarTabla(Request $val)
    {
        $intentos = 6;
        $numero = $val->get('numero');
        session()->put('numero', $numero);
        session()->put('intentos', $intentos);

        return view('tabla');
    }

    public function mostrarResultado(Request $val)
    {

        if($val->get('Aceptar')){
        $num = session()->get('numero');
        $intentos = session()->get('intentos');
        $multiplicacion = 0;
        $error = false;
        $colores = array();
        $solucion=array();
        $valores = $val->get('caja');

        if ($intentos > 1) {
            for ($i = 0; $i < 11; $i++) {
                $multiplicacion = $num * $i;

                if ($valores[$i] != $multiplicacion) {
                    $colores[] = 'style=background-color:red';
                    $error = true;
                }
                else{
                    $colores[] = 'style=background-color:greenyellow';
                }
                $solucion[]=$valores[$i];
            }

            if ($error == true) {
                $intentos--;
                session()->put('intentos', $intentos);
            } else {
                return view('ganar');
            }
        } else {
            return view('perder');
        }

        return view('tabla',['colores'=>$colores,'solucion'=>$solucion]);
    }

    if($val->get('Volver')){
        return view('indice');
    }

    if($val->get('MeRindo')){
        $num = session()->get('numero');
        $solucion = array();

        for ($i = 0; $i < 11; $i++) {
            $solucion[] = $num * $i;
        }

        return view('resuelto',['solucion'=>$solucion]);
    }
    }
}
