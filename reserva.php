<?php
    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

  
  $tipo=$_POST["planes"];
  $cantidad_personas=$_POST["NumHuespedes"];
  $fecha_reserva=$_POST["Fecha1"];
  $fecha_salida=$_POST["Fecha2"];
  
  if (($tipo!="")&&($cantidad_personas!=""))
  {
    $sql = "INSERT INTO `habitaciones`
    (`id_usuarios`, `nombre`, `telefono`)
    VALUES('NULL', '$nombre', '$telefono');";

    $sql = "INSERT INTO `reservas` (`id_reservas`, `id_habitaciones`, `id_usuarios`, 
    `tipo`, `cantidad_personas`, `fecha_reserva`, `fecha_salida`) 
    VALUES (NULL, '2', '15' , '$tipo', '$cantidad_personas', '$fecha_reserva', '$fecha_salida');";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");
    mysqli_query($conexion, "SELECT * FROM reservas");
    mysqli_query($conexion,$sql);
    mysqli_close($conexion);  
  }

?>