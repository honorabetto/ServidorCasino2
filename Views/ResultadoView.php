<?php
/************************************************************************************
 * Alumno: Alberto Honorato Mejia
 * Profesor: Octavio Aguirre Lozano 
 * Materia: Computación en el Servidor Web
 * Trabajo: Desarrollo web avanzado 
*************************************************************************************/
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Resultados</title>
    </head>
    <body>
        <div>
            <center><h1>El número ganador es......</h1></center> 
            <?php echo "<center><h2><b>$ganador</b></h2></center>";
            echo "<br><br>".$resultado;
            ?>
            <center><a href="../Controllers/HomeController.php">Seleccionar otro juego</a></center>
        </div>
    </body>
</html>