<?php
namespace App\Clases;
class Persona{
    private $nombre;
    private $apellido;
    private $edad;
    private  $ID;
    private $rol=array();



    public function __construct($nombre,$apellido,$edad,$ID,$rol)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->edad=$edad;
        $this->ID=$ID;
        $this->rol=$rol;
    }

    public function verRoles(){
        return $this->rol;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getID(){
        return $this->ID;
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
        $string .= '<label>ID:</label>';
        $string .= '<input type="text" name="ID" value="'.$this->ID.'">';
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
