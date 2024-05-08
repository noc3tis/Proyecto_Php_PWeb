<?php

  $dbhost = "localhost"; 
  $dbname = "reservas";
  $dbuser = "root";
  $dbpass = "";

  $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

  $nombre=$_POST["NombreHuesped"];
  $telefono=$_POST["Telefono"];
  $correo=$_POST["Correo"];
  $contraseña=$_POST["Contraseña"];
  $contraseñae=hash('sha512', $contraseña);
  
  if (($nombre!="")&&($telefono!="")){

    //verifica correo y telefono en la base de datos
    $sqlverc = "SELECT * FROM usuarios WHERE correo = 'correo'";
    $verificar_correo = mysqli_query($conexion, $sqlverc);

    if(mysqli_num_rows($verificar_correo)> 0){
      echo '
          <script>
            alert("Correo en uso, intenta con uno distinto");
          </script>
        ';
        exit();
      }

    $sqlvert = "SELECT * FROM usuarios WHERE telefono = 'telefono'";
    $verificar_telefono = mysqli_query($conexion, $sqlvert);
  
    if(mysqli_num_rows($verificar_telefono)> 0){
      echo '
          <script>
            alert("Telefono en uso, intenta con uno distinto");
          </script>
        ';
        exit();
      }

    $sql = "INSERT INTO `usuarios` (`id_rol`, `nombre`, `telefono`, `correo`, `contraseña`) VALUES
                                    ('2', '$nombre', '$telefono', '$correo', '$contraseñae');";
      
    $ejecutar = mysqli_query($conexion, $sql);

    if($ejecutar){
      echo '
        <script>
          alert("Usuario registrado con exito");
          window.location = "index.php";
        </script>
      ';
    }else{
      echo '
          <script>
            alert("Usuario no registrado");
            window.location = "registro.php";
          </script>
        ';
    }

  }

  mysqli_close($conexion);

  include 'registro.php';
  
?>
