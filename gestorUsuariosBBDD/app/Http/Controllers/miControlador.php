<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clases\Persona;
use App\Clases\Conexion;


class miControlador extends Controller
{
        public function irIndice()
        {
            return view('indice');
        }


        public function aniadirPersona()
        {
            return view('aniadir');
        }

        public function ADD(Request $val)
        {

            if($val->get('Volver')){
                return view('indice');
            }

        }

}
