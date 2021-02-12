<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
require_once("../db/db.php");               //se agrega el archivo de conexión
class UsuariosModel{
    private $db;
 
    public function __construct(){              
        $this->db=Conectar::conexion();         // se hace la conexión a la BD en el constructor de la clase        
    }

    ///Método que devuelve todos los usuarios del sistema
    public function GetUsuarios(){
        try
        {
            $result = array();
            $stm = $this->db->prepare("select Id, Nombre, Edad, Usuario from tUsuarios;"); //se prepara el query
            $stm->execute();                //se ejecuta el query
            $data = $stm->get_result();         //se almacenan los registros 

                if(!$data){                    //si no hay resultados
                    echo 'no hay resultados';
                } else {    
                    while ($r = $data->fetch_assoc()) {//Por cada resultado se agrega un objeto de tipo Juego al array result
                        $usr = new Usuario();

                        $usr->__SET('Id', $r["Id"]);
                        $usr->__SET('Nombre', $r["Nombre"]);
                        $usr->__SET('Edad', $r["Edad"]);
                        $usr->__SET('Usuario', $r["Usuario"]);
                        $usr->__SET('Password', "****");

                        $result[] = $usr;
                    }
                }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    ///Método que se usa para autenticar al usuario segun su usuario y password
    public function GetUsuarioByUser($usuario){
        try
        {
            $usr = new Usuario();
            //se prepara el query
            $stmt = $this->db->prepare("select Id, Nombre, Edad, Usuario  from tUsuarios where usuario = ? and password = MD5(?)");
            
            $stmt->bind_param("ss", $user, $pass);    //se pasan los parametros así para evitar sql injection      
            $user = $usuario->__GET("Usuario");
            $pass = $usuario->__GET("Password");
            $stmt->execute();                       //se ejecuta el query
            $data = $stmt->get_result();        //se almacenan los registros 
            if(!$data){ 
                echo 'no hay resultados';
            } else {    
                while ($r = $data->fetch_assoc()) {   //Se guarda el usuario en el objeto que se retorna                 
                    $usr->__SET('Id', $r["Id"]);
                    $usr->__SET('Nombre', $r["Nombre"]);
                    $usr->__SET('Edad', $r["Edad"]);
                    $usr->__SET('Usuario', $r["Usuario"]);   
                    $usr->__SET('Password', "****");                 
                }
            }
            return $usr;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    ///Método que devuelve todos los juegos del sistema
    public function SetUser($usuario){
        try
        {   
            //se inserta el nuevo saldo
            $stm2 = $this->db->prepare("insert into tusuarios (nombre, edad, usuario, password) values (?, ?, ?, MD5(?));"); 
            $stm2->bind_param("siss", $nombre, $edad, $user, $pass); 
            $nombre = $usuario->__GET("Nombre");
            $edad = $usuario->__GET("Edad");
            $user = $usuario->__GET("Usuario");
            $pass = $usuario->__GET("Password");
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