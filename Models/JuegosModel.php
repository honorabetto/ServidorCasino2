<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
require_once("../db/db.php");               //se agrega el archivo de conexión
class JuegosModel{
    private $db;
 
    public function __construct(){              
        $this->db=Conectar::conexion();         // se hace la conexión a la BD en el constructor de la clase        
    }

    ///Método que devuelve todos los juegos del sistema
    public function GetJuegos(){
        try
        {
            $result = array();
            $stm = $this->db->prepare("select Id, Nombre from tJuegos;"); //se prepara el query 
            $stm->execute();            //se ejecuta el query
            $data = $stm->get_result();         //se almacenan los registros 

                if(!$data){                     //si no hay resultados
                    echo 'no hay resultados';
                } else {    
                    while ($r = $data->fetch_assoc()) { //Por cada resultado se agrega un objeto de tipo Juego al array result
                        $jueg = new Juego();

                        $jueg->__SET('Id', $r["Id"]);
                        $jueg->__SET('Nombre', $r["Nombre"]);
                        $result[] = $jueg;
                    }
                }

            return $result;             //se retorna result
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    
}
?>