<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Usuarios</title>
    </head>
    <body>
        <?php
            foreach ($datos as $dato) {
                echo $dato->__GET("Nombre")."<br/>";
            }
        ?>
    </body>
</html>