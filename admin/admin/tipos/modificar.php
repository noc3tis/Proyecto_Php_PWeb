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

  $id=$_POST["idtipo"];

  if (($id!="")){

    $sql = "SELECT * FROM `tipos` WHERE id_tipo = $id";

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
            <a>Modificar tipo</a><br><br>

            <form id="form1" name="form1" method="post" action="guardar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Registrar tipo</a><br><br>

                        <input type="hidden" name="id" value="<?php echo $fila->id_tipo?>">
                        <input class="controls" type="text" name="nombre" id="nombre" placeholder="nombre tipo" value="<?php echo $fila->nombre_tipo?>">
                        <input class="controls" type="number" name="capacidad" id="capacidad" placeholder="capacidad maxima" value="<?php echo $fila->capacidad_maxima?>">

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
                window.location = "tipos.php";
            </script>
        ';exit;
        }}else{
        echo '
            <script>
                alert("verificar los datos");
                window.location = "tipos.php";
            </script>
        ';exit;
    }

    mysqli_close($conexion);
?>