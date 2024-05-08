<?php

  $dbhost = "localhost"; 
  $dbname = "reservas";
  $dbuser = "root";
  $dbpass = "";

  $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

  //altas y bajas usuarios

  $rol=$_POST["rol"];
  $nombre=$_POST["nombre"];
  $telefono=$_POST["telefono"];
  $correo=$_POST["correo"];
  $contraseña=$_POST["contraseña"];

  
  if (($contraseña!="")&&($correo!="")){

    $query = "SELECT COUNT(*) AS count FROM roles WHERE id_rol = $rol";
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['count'] > 0) {
        $sql = "INSERT INTO `usuarios` (`id_rol`, `nombre`, `telefono`, `correo`, `contraseña`) VALUES
        ('$rol', '$nombre','$telefono','$correo','$contraseña');";
    
        $ejecutar = mysqli_query($conexion, $sql);
    
        if($ejecutar){
          echo '
            <script>
              alert("Registro dado de alta");
              window.location = "usuarios.php";
            </script>
          ';
        }else{
          echo '
              <script>
                alert("No se pudo dar de alta el registro");
                window.location = "usuarios.php";
              </script>
            ';
        }
    } else {
      echo '
      <script>
        alert("El id de rol no existe");
        window.location = "usuarios.php";
      </script>
    ';
    }


  }

  $id=$_POST["id"];

  if (($id!="")){
    $sql = "DELETE FROM `usuarios` WHERE id_usuario = $id";

    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Registro eliminado");
          window.location = "usuarios.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("No se pudo eliminar el registro");
            window.location = "usuarios.php";
          </script>
        ';
    }

  }

  mysqli_close($conexion);

  include 'usuarios.php';
  
?>