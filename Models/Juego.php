<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
class Juego
{
    private $Id;
    private $Nombre;

    public function __GET($k){ return $this->$k; }            //función que recibe el atributo de la clase a obtener y lo retorna
    public function __SET($k, $v){ return $this->$k = $v; }   //funcion que hace set de un atributo recibio y su valor
}
?>