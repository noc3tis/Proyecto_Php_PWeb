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
    
    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    
    <center><table border="1">
        <tr>
            <td>id_usuarios</td>
            <td>id_rol</td>
            <td>nombre</td>
            <td>telefono</td>
            <td>correo</td>
            <td>contraseña</td>
        </tr>

        <?php
        $sql="SELECT * from usuarios";
        $result=mysqli_query($conexion, $sql);

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
            <td><?php echo $mostrar['id_usuario']?></td>
            <td><?php echo $mostrar['id_rol']?></td>
            <td><?php echo $mostrar['nombre']?></td>
            <td><?php echo $mostrar['telefono']?></td>
            <td><?php echo $mostrar['correo']?></td>
            <td><?php echo $mostrar['contraseña']?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</center>
<br><br><br><br>

<center>
        <section class="altas">
            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Registrar usuarios</a><br><br>

                        <input class="controls" min="1" type="number" name="rol" id="rol" placeholder="id rol">
                        <input class="controls" type="text" name="nombre" id="nombre" placeholder="nombre">
                        <input class="controls" type="text" name="telefono" id="telefono" placeholder="telefono">
                        <input class="controls" type="text" name="correo" id="correo" placeholder="correo">
                        <input class="controls" type="password" name="contraseña" id="contraseña" placeholder="contraseña">

                        <input type="submit" value="Agregar" name="insertar" /><br><br>
                    </section>
                </section>
            </form>   

            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Eliminar usuario</a><br><br>

                        <input class="controls" min="1" type="number" name="id" id="id" placeholder="id tipo">

                        <input type="submit" value="Eliminar" name="eliminar"/><br><br>
                    </section>
                </section>
            </form>   
            
            <form id="form1" name="form1" method="post" action="modificar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Modificar usuario</a><br><br>

                        <input class="controls" min="1" type="number" name="id" id="id" placeholder="id tipo">

                        <input type="submit" value="Modificar" name="modificar" /><br><br><br>
                    </section>
                </section>
            </form>     
            
        </section>
</center>

</body>
</html>