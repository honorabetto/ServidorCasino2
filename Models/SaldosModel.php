<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
require_once("../db/db.php");               //se agrega el archivo de conexión
class SaldosModel{
    private $db;
 
    public function __construct(){              
        $this->db=Conectar::conexion();         // se hace la conexión a la BD en el constructor de la clase        
    }

    ///Método que devuelve todos los juegos del sistema
    public function GetSaldoByUser($usuario){
        try
        {
            $saldo = 0;
            $stm = $this->db->prepare("select sum(Saldo) as Saldos from tSaldos where idusuario = ?"); //se prepara el query 
            $stm->bind_param("s", $user);    //se pasan los parametros así para evitar sql injection      
            $user = $usuario;
            $stm->execute();            //se ejecuta el query
            $data = $stm->get_result();         //se almacenan los registros 
            
                if(!$data){                     //si no hay resultados
                    echo 'no hay resultados';
                } else {    
                    while ($r = $data->fetch_assoc()) { //Por cada resultado se agrega un objeto de tipo Juego al array result
                       $saldo= $r["Saldos"];
                    }
                    if(is_null($saldo))
                        $saldo = 0;
                }

            return $saldo;             //se retorna saldo
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    ///Método que devuelve todos los juegos del sistema
    public function SetSaldoByUser($usuario, $saldo){
        try
        {   
            //se inserta el nuevo saldo
            $stm2 = $this->db->prepare("insert into tSaldos (idusuario, saldo, fecha) values (?, ?, NOW());"); 
            $stm2->bind_param("id", $user2,$saldito); 
            $user2 = $usuario;
            $saldito = $saldo;
            $status = $stm2->execute();            //se ejecuta el query 
            return $status;             //se retorna respuesta
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }
       
}
?>