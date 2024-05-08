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

  $idrol=$_POST["idrol"];

  if (($idrol!="")){

    $sql = "SELECT * FROM `roles` WHERE id_rol = $idrol";

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
            <a>Modificar rol</a><br><br>

            <form id="form1" name="form1" method="post" action="guardar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Registrar rol</a><br><br>

                        <input type="hidden" name="rol" value="<?php echo $fila->id_rol?>">
                        <input class="controls" type="text" name="nombre" id="nombre" placeholder="nombre rol" value="<?php echo $fila->nombre_rol?>">

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
                window.location = "rol.php";
            </script>
        ';exit;
        }}else{
        echo '
            <script>
                alert("verificar los datos");
                window.location = "rol.php";
            </script>
        ';exit;
    }

    mysqli_close($conexion);
?>