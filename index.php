<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: hotel.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="preload" href="css/Normalize.css" as="style">
        <link rel="stylesheet" href="css/Normalize.css">
        <link rel="preload" href="css/styles1.css" as="style">
        <link href="css/styles1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swao"
        rel="stylesheet">
    </head>
    <body>
    <section class="login">
        <form id="form1" name="form1" method="post" action="login.php">
            <h1>Iniciar sesion</h1>
            <form action="formulario">
                <section class="formulario">
                    <a>Inicio de sesion</a><br><br>

                    <input class="controls" type="text" name="Correo" id="Correo" placeholder="Correo electronico">
                    <input class="controls" type="password" name="Contraseña" id="Contraseña" placeholder="Contraseña">

                    <input class="botons" type="submit" value="Ingresar" name="ingresar"/>

                    <a>No tienes cuenta?</a>
                    <a href="registro.php" > Registrarse</a>
                </section>
            </section>
        </form>    
    </section>

    

    </body>
</html>