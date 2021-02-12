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
    header('Location: ../Views/LoginView.php');
}  
require_once("../Models/Juego.php");   
require_once("../Models/JuegosModel.php");
require_once("../Models/Saldo.php");   
require_once("../Models/SaldosModel.php");
$usr = $_SESSION["Usuario"];
if( isset($_POST['Saldo']) ){
    $saldoParam = $_POST['Saldo'];
    $saldosModel = new SaldosModel();   
    $saldo =  $saldosModel->SetSaldoByUser($usr->__GET("Id"), $saldoParam);
    header('Location: HomeController.php');
}
