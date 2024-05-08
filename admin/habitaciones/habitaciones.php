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
        <title>Tabla habitaciones</title>
    </head>
    <body>
        <h1>Habitaciones</h1>
        
        <center><table border="1">
                <tr>
                    <td>id_habitacion</td>
                    <td>id_tipo</td>
                </tr>

                <?php
                $sql="SELECT * FROM habitaciones";
                $result=mysqli_query($conexion, $sql);

                while($mostrar=mysqli_fetch_array($result)){
                ?>

                <tr>
                    <td><?php echo $mostrar['id_habitacion']?></td>
                    <td><?php echo $mostrar['id_tipo']?></td>
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
                        <a>Registrar habitacion</a><br><br>

                        <input class="controls" min="1" type="number" name="idtipo" id="idtipo" placeholder="id tipo">

                        <input type="submit" value="Agregar" name="insertar" /><br><br>
                    </section>
                </section>
            </form>   

            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Eliminar habitacion</a><br><br>

                        <input class="controls" min="1" type="number" name="idhabitacion" id="idhabitacion" placeholder="id habitacion">

                        <input type="submit" value="Eliminar" name="eliminar" /><br><br>
                    </section>
                </section>
            </form>   
            
            <form id="form1" name="form1" method="post" action="modificar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Modificar habitacion</a><br><br>

                        <input class="controls" min="1" type="number" name="idhabitacion" id="idhabitacion" placeholder="id habitacion">

                        <input type="submit" value="Modificar" name="modificar" /><br><br><br>
                    </section>
                </section>
            </form>     
            
        </section>
        </center>

       
    </body>
</html>