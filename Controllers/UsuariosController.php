<?php
session_start();
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
require_once("../Models/Usuario.php");      
require_once("../Models/UsuariosModel.php");
$usr = new Usuario();                   //se instancia un usuario
$model = new UsuariosModel();           //se instancia un modelo de usuarios
if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'login':
            $usr->__SET('Usuario',              $_REQUEST['Usuario']);
            $usr->__SET('Password',          $_REQUEST['Password']);
            $usr = $model->GetUsuarioByUser($usr);
            if($usr->__GET("Nombre") != ""){
                $_SESSION["Usuario"] = $usr;
                header('Location: HomeController.php'); 
            }else{
                session_destroy();
                header('Location: ../Views/LoginView.php');                
            }           
            break;
        case 'registrar':
            if(isset($_POST['Nombre']) and isset($_POST['Usuario']) and isset($_POST['Edad']) and isset($_POST['Password'])){
                $edad = $_POST['Edad'];
                if($edad < 18){
                    $mensaje = "No tienes la edad suficiente para apostar!!";
                }else{

                $usr->__SET('Nombre',          $_POST['Nombre']);
                $usr->__SET('Edad',        $edad);
                $usr->__SET('Usuario',            $_POST['Usuario']);
                $usr->__SET('Password', $_POST['Password']);    
                $model->SetUser($usr);
                $mensaje = "Excelente!! ahora regresa al inicio de sesión.";
                }
            }
            require_once("../Views/RegistrarView.php");
            break;



        case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('Nombre',          $_REQUEST['Nombre']);
            $alm->__SET('Apellido',        $_REQUEST['Apellido']);
            $alm->__SET('Sexo',            $_REQUEST['Sexo']);
            $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

            $model->Actualizar($alm);
            header('Location: index.php');
            break;

        

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
            header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }


}


//$user=new UsuariosModel();
//$datos=$user->GetUsuarios();
 
//Llamada a la vista

?>