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
    <title>Tabla Roles</title>
</head>
<body>
    <h1>Roles</h1>
    
    <center><table border="1">
            <tr>
                <td>id_rol</td>
                <td>nombre_rol</td>
            </tr>

            <?php
            $sql="SELECT * from roles";
            $result=mysqli_query($conexion, $sql);

            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
                <td><?php echo $mostrar['id_rol']?></td>
                <td><?php echo $mostrar['nombre_rol']?></td>
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
                        <a>Registrar rol</a><br><br>

                        <input class="controls" type="text" name="nombrerol" id="nombrerol" placeholder="nombre del rol">

                        <input type="submit" value="Agregar" name="insertar" /><br><br>
                    </section>
                </section>
            </form>   

            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Eliminar rol</a><br><br>

                        <input class="controls" min="1" type="number" name="idrol" id="idrol" placeholder="id rol">

                        <input type="submit" value="Eliminar" name="eliminar" /><br><br>
                    </section>
                </section>
            </form>   
            
            <form id="form1" name="form1" method="post" action="modificar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Modificar rol</a><br><br>

                        <input class="controls" min="1" type="number" name="idrol" id="idrol" placeholder="id rol">

                        <input type="submit" value="Modificar" name="modificar" /><br><br><br>
                    </section>
                </section>
            </form>     
            
        </section>
        </center>



</body>
</html>