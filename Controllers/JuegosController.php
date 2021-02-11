<?php
require_once("../Models/Usuario.php");   //se hace el require primero porq si no manda error al no encontrar su definición
session_start();
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
if(!isset($_SESSION["Usuario"])){  //si no hay autenticacion se regresa a login
    header('Location: LoginView.php');
} 
const RULETA = 1;
const CASINO = 2;
const BLACKJACK = 3;
//función que nos devuelve un numero ganador dependiendo de un limite numerico que recibe como parámetro
function ObtieneGanador($limite)
{
    return rand(1,$limite); // se obtiene un número aleatorio
}
require_once("../Models/Juego.php");   
require_once("../Models/JuegosModel.php");
require_once("../Models/Saldo.php");   
require_once("../Models/SaldosModel.php");
$usr = $_SESSION["Usuario"];
    

//se verifica que se haya mandado la variable POST juego pero NO apuesta ni numero.
if(isset($_POST['juego']) and !isset($_POST['apuesta']) and !isset($_POST['numero'])){ 
    $juego = $_POST["juego"];
    $nombre = $usr->__GET("Nombre");
    $nombre = ltrim(rtrim(strtoupper($nombre)));
    echo <<<EOT1
        <center><h1>Bienvenido $nombre<h1></center><br><br>
    EOT1;

    switch($juego){
        case RULETA:
            //se muestra formulario para el juego de ruleta
            require_once("../Views/RuletaView.php");
            break;
        case BLACKJACK:
            //se muestra formulario para el juego de black jack
            require_once("../Views/BlackJackView.php");
            break;
        case CASINO:
            //se muestra formulario para el juego de sorteo
            require_once("../Views/SorteoView.php");
            break;
        default:
            echo "No seleccionaste juego";

    }
        
}elseif( isset($_POST['juego']) and isset($_POST['apuesta']) and isset($_POST['numero']) ){
    //Aqui va todo lo de los juegos
    //se obitienen los valores de la apuesta y su saldo actual
    $saldosModel = new SaldosModel();
    $saldo =  $saldosModel->GetSaldoByUser($usr->__GET("Id"));
    $apuesta = $_POST["apuesta"];
    //se verifica si le alcanza y si no se redirecciona a saldo insuficiente
    if($saldo< $apuesta){
        header('Location: ../Views/SaldoInsuficienteView.php');

    }


        $numero = $_POST["numero"];
        $juego = $_POST["juego"];
        switch($juego){
            case RULETA:                
                //Se selecciona un número al azar y se manda mensaje cúal fue.
                $ganador = ObtieneGanador(21);
                echo <<<EOT
                <center><h1>El número ganador es......</h1> 
                <h2><b>$ganador</b></h2>
                EOT;
                 
                if ($ganador == $numero){ //si el número de la apuesta fue igual que el ganador
                    echo <<<EOT
                    <center><h1>Felicidades!!! Ganaste $apuesta!!!</h1> 
                    <a href="HomeController.php">Seleccionar otro juego</a></center>
                    EOT;
                }else{ //si el número de la apuesta fue diferente que el ganador
                    echo <<<EOT
                        <center><h1>Lo siento mucho!!! Perdiste $apuesta!!!</h1> 
                        <h2>Toma chocolate, paga lo que debes!!</h2>
                        <a href="HomeController.php">Seleccionar otro juego</a></center>
                    EOT;
                }     
            break;
            case BLACKJACK:
                //se muestra formulario para el juego de ruleta

                //Aún no se implementa esta función puede ser para los siguientes temas

            break;
            case SORTEO:
                //Se selecciona un número al azar y se manda mensaje cúal fue.
                $ganador = ObtieneGanador(100);
                echo <<<EOT
                <center><h1>El número ganador del sorteo es......</h1> 
                <h2><b>$ganador</b></h2>
                EOT;
                 
                if ($ganador == $numero){ //si el número de la apuesta fue igual que el ganador
                    echo <<<EOT
                    <center><h1>Felicidades!!! Ganaste $apuesta!!!</h1> 
                    <a href="HomeController.php">Seleccionar otro juego</a></center>
                    EOT;
                }else{ //si el número de la apuesta fue diferente que el ganador
                    echo <<<EOT
                        <center><h1>Lo siento mucho!!! Perdiste $apuesta!!!</h1> 
                        <h2>Toma chocolate, paga lo que debes!!</h2>
                        <a href="HomeController.php">Seleccionar otro juego</a></center>
                    EOT;
                }     



            break;
            default:
                echo "No seleccionaste juego";

        }  
    }else
    { //cierre de if de si se enviaron POST
        echo <<<EOT
            <h1>No puedes jugar sin seleccionar opciones.</h1>
            <a href="inicio.php">Ir a seleccionar opciones</a>
        EOT;
   }
?>
</body>
</html>