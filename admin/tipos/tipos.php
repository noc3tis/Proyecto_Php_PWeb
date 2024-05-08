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
    <title>Tabla tipos</title>
</head>
<body>
    <h1>Tipos</h1>
    
    <center><table border="1">
        <tr>
            <td>id_tipo</td>
            <td>nombre_tipo</td>
            <td>capacidad_maxima</td>
        </tr>

        <?php
        $sql="SELECT * from tipos";
        $result=mysqli_query($conexion, $sql);

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
            <td><?php echo $mostrar['id_tipo']?></td>
            <td><?php echo $mostrar['nombre_tipo']?></td>
            <td><?php echo $mostrar['capacidad_maxima']?></td>
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
                        <a>Registrar tipo de habitacion</a><br><br>

                        <input class="controls" type="text" name="nombre" id="nombre" placeholder="nombre del tipo">
                        <input class="controls" min="1" type="number" name="capacidad" id="capacidad" placeholder="capacidad maxima">

                        <input type="submit" value="Agregar" name="insertar" /><br><br>
                    </section>
                </section>
            </form>   

            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Eliminar tipo</a><br><br>

                        <input class="controls" min="1" type="number" name="idtipo" id="idtipo" placeholder="id tipo">

                        <input type="submit" value="Eliminar" name="eliminar" /><br><br>
                    </section>
                </section>
            </form>   
            
            <form id="form1" name="form1" method="post" action="modificar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Modificar rol</a><br><br>

                        <input class="controls" min="1" type="number" name="idtipo" id="idtipo" placeholder="id tipo">

                        <input type="submit" value="Modificar" name="modificar" /><br><br><br>
                    </section>
                </section>
            </form>     
            
        </section>
</center>

</body>
</html>