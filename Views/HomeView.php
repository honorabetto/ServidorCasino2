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
        <div style="text-align:center;">
            <?php            
                    echo "<h1>Bienvenid@ ".$nombreUsuario."</h1>";   
                    echo "<br/>";    
                    echo "<h2>Tu saldo actual es de ".$saldo." pesos</h2>";             
            ?>
            <form method="POST" action="HomeController.php">
                <input type="hidden" name="CerrarSesion" value="1" />
                <input type="submit" value="Cerrar Sesión"/>            
            </form>

            <h3>¿Quieres incrementar tu saldo?</h3>
            <form method="POST" action="SaldosController.php">
                <div class="center">            
                    <div class="form-element">
                        <label>Ingresa Saldo</label>
                        <input type="text" name="Saldo" pattern="[0-9]+" required />
                    </div>
                    <br/><br/>
                    <input type="submit" value="Agregar"/>
                </div>
            </form><br/><br/>
            <form method="POST" action="JuegosController.php">
                <div class="center">            
                    Selecciona el juego:
                    <br/><br/>
                    <select name="juego">
                        <?php
                            //se ocupa en foreach para recorrer el arreglo y llenar el select con los juegos que se agregaron en el controlador
                            foreach($juegos as $juego){
                                print "<option value=\"".$juego->__GET("Id")."\">".$juego->__GET("Nombre")."</option>";
                            }
                        ?>
                    </select>
                    <br/><br/>
                    <input type="submit" value="Jugar"/>
                </div>
            </form>
        </div>
    </body>
</html>