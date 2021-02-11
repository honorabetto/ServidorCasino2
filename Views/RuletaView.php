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
        <title>Ruleta</title>
    </head>
    <body>
        <h3>Vamos a jugar Ruleta!!</h3>
        <form method="POST" action="JuegosController.php"><br/><br/>
        <?php echo "<input type=\"hidden\" name=\"juego\"  value=\"".$juego."\"/>";?>
            Escribe tu apuesta: <input type="text" name="apuesta"/><br/><br/>
            Selecciona un número para apostar:    
            <select name="numero">
            <?php
            $numerosRuleta = 1;
            do{
                print "<option value=\"".$numerosRuleta."\">".$numerosRuleta."</option>";
                $numerosRuleta++;                        
            }while($numerosRuleta<=21);

            ?>
            </select>                       
            <br/><br/>
            <input type="submit" value="Apostar"/>
            </form>
    </body>
</html>