<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("Necesitas iniciar sesion");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu admin</title>

</head>
<body>
    <h1>Menu admin</h1>
        <a href="habitaciones/habitaciones.php">Ir a la tabla habitaciones</a><br>
        <a href="reservas/reservas.php">Ir a la tabla reservas</a><br>
        <a href="roles/rol.php">Ir a la tabla rol</a><br>
        <a href="tipos/tipos.php">Ir a la tabla tipos</a><br>
        <a href="usuarios/usuarios.php">Ir a la tabla usuarios</a><br>
        

        <br><br>

        <a href="logout.php">Cerrar sesion</a>
</body>
</html>