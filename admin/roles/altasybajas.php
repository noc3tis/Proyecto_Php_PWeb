<?php

  $dbhost = "localhost"; 
  $dbname = "reservas";
  $dbuser = "root";
  $dbpass = "";

  $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

//altas y bajas roles

$nombre=$_POST["nombrerol"];
  
  if (($nombre!="")){
    $sql = "INSERT INTO `roles` (`nombre_rol`) VALUES
    ('$nombre');";

    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Registro dado de alta");
          window.location = "rol.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("No se pudo dar de alta el registro");
            window.location = "rol.php";
          </script>
        ';
    }

  }

  $idrol=$_POST["idrol"];

  if (($idrol!="")){
    $sql = "DELETE FROM `roles` WHERE id_rol = $idrol";

    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Registro eliminado");
          window.location = "rol.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("No se pudo eliminar el registro");
            window.location = "rol.php";
          </script>
        ';
    }

  }

  mysqli_close($conexion);

  include 'rol.php';
  
?>