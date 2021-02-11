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
        <title>Bienvenida</title>
    </head>
    <body>
        <?php            
                echo "<h1>Bienvenid@ ".$nombreUsuario."<h1/>";   
                echo "<br/><br/><br/>";    
                echo "<h3>Tu saldo actual es de ".$saldo." pesos<h3/>";             
        ?>
        ¿Quieres incrementar tu saldo?
        <form method="POST" action="SaldosController.php"><br/><br/>
            <div class="center">            
                <div class="form-element">
                    <label>Usuario</label>
                    <input type="text" name="Usuario" pattern="[a-zA-Z0-9]+" required />
                </div>
                <div class="form-element">
                    <label>Contraseña</label>
                    <input type="password" name="Password" required />
                </div>
                <br/><br/>
                <input type="submit" value="Jugar"/>
            </div>
        </form>
        <form method="POST" action="casino.php"><br/><br/>
            <div class="center">            
                Selecciona el juego:
                <br/><br/>
                <select name="juego">
                    <?php
                        //se ocupa en foreach para recorrer el arreglo y llenar el select con los juegos que se agregaron arriba
                        foreach($juegos as $juego){
                            print "<option value=\"".$juego->__GET("Id")."\">".$juego->__GET("Nombre")."</option>";
                        }
                    ?>
                </select>
                <br/><br/>
                <input type="submit" value="Jugar"/>
            </div>
        </form>
    </body>
</html>