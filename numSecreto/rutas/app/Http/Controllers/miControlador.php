<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class miControlador extends Controller
{
    //

    public function irIndice()
    {
        return view('indice');
    }

    public function irOtra()
    {
        return view('otra');
    }

    public function calcularValor(Request $req)
    {
        $valor = $req->get('numero');
        for ($i = 0; $i <= 10; $i++) {
            $vec[] = $valor * $i;
        }

        $datos = [
            'numero' => $valor,
            'valores' => $vec
        ];

        return view('pintaTabla', $datos);
    }

    public function verAdivinar()
    {
        return view('adivina');
    }

    public function adivinarNumero(Request $val)
    {
        if(!session()->has('loquesea')) {
            $alea = rand(1, 100);
            $intentos=6;
            session()->put('loquesea', $alea);
            session()->put('intentos', $intentos);
        }else{
          $alea=session()->get('loquesea');
          $intentos=session()->get('intentos');
        }

        $mensaje = '';
        $numero = $val->get('numero');

        if($intentos>1){
        if ($numero == $alea) {
            $mensaje = 'Has ganado';
            session()->forget('loquesea');
            return view('ganada',['nSecreto'=>$alea]);
        } else {
            if ($numero > $alea) {
                $mensaje = 'El numero secreto es menor';
            } else {
                if ($numero < $alea) {
                    $mensaje = 'El numero secreto es mayor';

                }
            }
            $intentos--;
            session()->put('intentos', $intentos);
        }
    }else{
        $mensaje = 'Has perdido';
        session()->forget('loquesea');
        return view('perdida',['nSecreto'=>$alea]);
    }

        $datos = [
            'mensaje' => $mensaje,
            'intentos'=> $intentos
        ];

        return view('adivina', $datos);
    }
}
