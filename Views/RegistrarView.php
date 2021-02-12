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
        <title>Bienvenido</title>
    </head>
    <body>
        <div style="text-align:center;">
            <h1>Bienvenid@ al casino de Botornillo</h1>
            <br>
            <h3>Registrate para iniciar a apostar!!</h3>
            <br><br>
        </div>
        <?php
            if( isset($mensaje) ){
                echo "<center><h1>".$mensaje."</h1></center>";
            }


        ?>
        <div style="text-align:center;">
        <form method="post" action="../Controllers/UsuariosController.php?action=registrar" name="signin-form">
            
                <label>Nombre</label>
                <input type="text" name="Nombre"  required />
            
            <br><br>
            <div style="text-align:center;">
                <label>Edad</label>
                <select name="Edad">
                <?php
                        //se ocupa en for para agregar edades del 10 al 100, no es lo óptimo pero sirve para la tarea XD
                        for($edad=10; $edad <=100; $edad++){
                            print "<option value=\"".$edad."\">".$edad."</option>";
                        }
                    ?>
                </select>
            </div>
            <br>
            <div style="text-align:center;">
                <label>Usuario</label>
                <input type="text" name="Usuario" pattern="[a-zA-Z0-9]+" required />
            </div>
            <br>
            <div  style="text-align:center;">
                <label>Contraseña</label>
                <input type="password" name="Password" required />
            </div><br><br>
            <div  style="text-align:center;">
                <button type="submit" name="login" value="Registrarme">Registrarme</button>
            </div>            
        </form>
        <br><br>
        <a href="../Controllers/HomeController.php">Inciar sesión</a>
        </div>
    </body>
</html>