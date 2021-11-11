<?php

namespace App\Clases;

class Conjunto
{
    private $nombre;
    private $personas = array();

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->personas = array();
    }


    public function addPersona($persona)
    {
        $this->personas[$persona->getID()] = $persona;
    }

    public function cuantasPersonas()
    {
        return count($this->personas);
    }

    public function getPersonas()
    {
        return $this->personas;
    }

    /********************************UNION */
    public function union($c2)
    {
        $aux = new Conjunto('Aux');

        foreach ($this->personas as $persona) {
            $aux->addPersona($persona);
        }

        foreach ($c2->getPersonas() as $persona) {
            if (!$aux->existe($persona)) {
                $aux->addPersona($persona);
            }
        }

        return $aux;
    }
    /********************************INTERSECT */
    public function intersect($c2)
    {
        $aux = new Conjunto('Aux');

        foreach ($this->personas as $persona) {
            if ($c2->existe($persona)) {
                $aux->addPersona($persona);
            }
        }
        return $aux;
    }

    public function existe($persona)
    {
        $existe = false;

        foreach ($this->personas as $p) {
            if ($p->getID() == $persona->getID()) {
                $existe = true;
            }
        }
        return $existe;
    }

    public function buscarPorNombre($persona)
    {
        $existe = false;

        foreach ($this->personas as $p) {
            if ($p->getNombre() == $persona) {
                $existe = true;
            }
        }
        return $existe;
    }

    public function delPersonaPos($i)
    {
        unset($this->personas[$i]);
    }

    public function delPersonaPorID($ID)
    {
        unset($this->personas[$ID]);
    }

    public function __toString()
    {
        $string = '';

        foreach ($this->personas as $persona) {
            $string .= '[ID: ' . $persona->getID() . ', ';
            $string .= 'Nombre: ' . $persona->getNombre() . ', ';
            $string .= 'Apellido: ' . $persona->getApellido() . ', ';
            $string .= 'Edad: ' . $persona->getEdad() . ']' . PHP_EOL;
        }
        return $string;
    }
}
