<?php

  $dbhost = "localhost"; 
  $dbname = "reservas";
  $dbuser = "root";
  $dbpass = "";

  $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");


  //altas y bajas habitaciones


  $idtipo=$_POST["idtipo"];

    
  if (($idtipo!="")){

    $query = "SELECT COUNT(*) AS count FROM tipos WHERE id_tipo = $idtipo";

    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
          $sql = "INSERT INTO `habitaciones` (`id_tipo`) VALUES
          ('$idtipo');";
      
          $ejecutar = mysqli_query($conexion, $sql);
      
          if($ejecutar){
            echo '
              <script>
                alert("Registro dado de alta");
                window.location = "habitaciones.php";
              </script>
            ';
          }else{
            echo '
                <script>
                  alert("No se pudo dar de alta el registro");
                  window.location = "habitaciones.php";
                </script>
              ';
          }
    } else {
      echo '
      <script>
        alert("El id de tipo no existe");
        window.location = "habitaciones.php";
      </script>
    ';
    }
  }


  $idhabitacion=$_POST["idhabitacion"];

  if (($idhabitacion!="")){


    $sql = "DELETE FROM `habitaciones` WHERE id_habitacion = $idhabitacion";

    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Registro eliminado");
          window.location = "habitaciones.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("No se pudo eliminar el registro");
            window.location = "habitaciones.php";
          </script>
        ';
    }

  }

  mysqli_close($conexion);

  include 'habitaciones.php';
  
?>
