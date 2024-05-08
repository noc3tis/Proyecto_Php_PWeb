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

  $id=$_POST["id"];

  if (($id!="")){

    $sql = "SELECT * FROM `usuarios` WHERE id_usuario = $id";

    $ejecutar = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($ejecutar)> 0){
        $fila= mysqli_fetch_object($ejecutar);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registro a modificar</title>
            <a>Modificar usuario</a><br><br>

            <form id="form1" name="form1" method="post" action="guardar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Registrar usuario</a><br><br>

                        <input type="hidden" name="id" value="<?php echo $fila->id_usuario?>">
                        <input class="controls" type="text" name="rol" id="rol" placeholder="id rol" value="<?php echo $fila->id_rol?>">
                        <input class="controls" type="text" name="nombre" id="nombre" placeholder="nombre tipo" value="<?php echo $fila->nombre?>">
                        <input class="controls" type="text" name="telefono" id="telefono" placeholder="telefono" value="<?php echo $fila->telefono?>">
                        <input class="controls" type="text" name="correo" id="correo" placeholder="correo" value="<?php echo $fila->correo?>">
                        <input class="controls" type="text" name="contraseña" id="contraseña" placeholder="contraseña" value="<?php echo $fila->contraseña?>">

                        <input type="submit" value="Modificar" name="guardar" /><br><br>
                    </section>
                </section>
            </form>   

        </head>
        <body>

        </body>
        </html>
        <?php }
        else{
            echo '
            <script>
                alert("El registro no existe");
                window.location = "usuarios.php";
            </script>
        ';exit;
        }}else{
        echo '
            <script>
                alert("verificar los datos");
                window.location = "usuarios.php";
            </script>
        ';exit;
    }

    mysqli_close($conexion);
?>