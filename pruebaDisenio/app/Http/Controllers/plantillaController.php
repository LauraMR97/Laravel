<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class plantillaController extends Controller
{
    public function index()
    {
        $contenidos = [
            [
                'titulo' => 'Un titulo interesante',
                'texto' =>       'A grandes rasgos, la única habilidad que los alquimistas de Ankh-Morpork habían descubierto hasta el momento era la capacidad de convertir oro en menos oro',
            ],
            [
                'titulo' => 'Un titulo aburrido',
                'texto' =>       'Cuando puedes aplastar ciudades enteras a voluntad, la tendencia a reflexionar en silencio y ver las cosas desde el punto de vista del otro, rara vez resulta necesaria',
            ],
            [
                'titulo' => 'Sin comentarios',
                'texto' =>          'Dicen que un poco de conocimiento es peligroso, pero no tanto como mucha ignorancia'
             ] ,
            [
                'titulo' => 'Sin comentarios',
                'texto' =>          'Dicen que un poco de conocimiento es peligroso, pero no tanto como mucha ignorancia'
            ]
        ];

        return view(
            'inicio',
            [
                'contenidos_desde_controlador' => $contenidos
            ]
        );
    }
}
