<?php

  $dbhost = "localhost"; 
  $dbname = "reservas";
  $dbuser = "root";
  $dbpass = "";

  $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

//altas y bajas tipos

$nombre=$_POST["nombre"];
$capacidad=$_POST["capacidad"];
  
  if (($nombre!="")){
    $sql = "INSERT INTO `tipos` (`nombre_tipo`, `capacidad_maxima` ) VALUES
    ('$nombre', '$capacidad');";

    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Registro dado de alta");
          window.location = "tipos.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("No se pudo dar de alta el registro");
            window.location = "tipos.php";
          </script>
        ';
    }

  }

  $idtipo=$_POST["idtipo"];

  if (($idtipo!="")){
    $sql = "DELETE FROM `tipos` WHERE id_tipo = $idtipo";

    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Registro eliminado");
          window.location = "tipos.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("No se pudo eliminar el registro");
            window.location = "tipos.php";
          </script>
        ';
    }
  }

  mysqli_close($conexion);

  include 'tipos.php';
  
?>