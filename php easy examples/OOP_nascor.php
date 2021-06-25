<?php

// class Persona
// {
//     function __construct()
//     {
//         echo "Objeto persona creado<br/>";
//     }
// }
// class Funcionario extends Persona
// {
//     function __construct()
//     {
//         echo "Objeto funcionario creado<br/>";
//     }
// }
// $funcionario = new Funcionario();
// echo $funcionario;



class Alumno{
    private $nombre;
    private $dni;
    private $direccion;
    private $fechaNacimiento;
    private $curso;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
}


$alumno = new Alumno();
$alumno->setNombre("Otari");

echo $alumno->getNombre();








?>