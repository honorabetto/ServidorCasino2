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
            <h3>Inicia sesión para empezar</h3>
            <br><br>
        </div>
        <form method="post" action="../Controllers/UsuariosController.php?action=login" name="signin-form">
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
                <button type="submit" name="login" value="Ingresar">Ingresar</button>
            </div>            
        </form>
        <br><br>
        
            <div  style="text-align:center;">
            <h3>No tengo cuenta pero quiero ganar dinero!!</h3>
                <form method="post" action="../Controllers/UsuariosController.php?action=registrar" name="registrar">
                    <button type="submit" name="login" value="Registrarme">Registrarme</button>
                </form>
            </div> 
    </body>
</html>