<?php
namespace App\Clases;
class Persona{
    private $nombre;
    private $apellido;
    private $edad;
    private $rol=array();



    public function __construct($nombre,$apellido,$edad,$rol)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->edad=$edad;
        $this->rol=$rol;
    }

    public function verRoles(){
        return $this->rol;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function __toString()
    {
        $string = '';
        $string .= '<label>Nombre:</label>';
        $string .= '<input type="text" name="Nombre" value="'.$this->nombre.'">';
        $string .= '<label>Apellido:</label>';
        $string .= '<input type="text" name="Apellido" value="'.$this->apellido.'">';
        $string .= '<label>Edad:</label>';
        $string .= '<input type="text" name="Edad" value="'.$this->edad.'">';
        $string.=' <input type="submit" name="Eliminar" value="Eliminar">';
        return $string;
    }
}



?>
