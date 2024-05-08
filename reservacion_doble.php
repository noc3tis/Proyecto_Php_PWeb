<?php

  session_start();

  $dbhost = "localhost"; 
  $dbname = "reservas";
  $dbuser = "root";
  $dbpass = "";

  $conexion=mysqli_connect
  ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
  die ("Problemas con la conexion");

  $id_usuario = obtenerIdUsuario($_SESSION['usuario']);

  if ($id_usuario) {
      // Otros datos del formulario
      $cantidad_personas = $_POST["NumHuespedes"];
      $llegada = $_POST["llegada"];
      $salida = $_POST["salida"];

      if (!empty($llegada) && !empty($salida)) {
          // Consulta SQL para insertar la reserva
          $sql = "INSERT INTO reservas (id_habitacion, id_usuario, cantidad_personas, fecha_llegada, fecha_salida)
                  SELECT h.id_habitacion, ?, ?, ?, ?
                  FROM habitaciones h
                  JOIN tipos t ON h.id_tipo = t.id_tipo
                  WHERE t.nombre_tipo = 'Doble'
                  AND NOT EXISTS (
                      SELECT 1
                      FROM reservas r
                      WHERE r.id_habitacion = h.id_habitacion
                      AND (? BETWEEN r.fecha_llegada AND r.fecha_salida OR ? BETWEEN r.fecha_llegada AND r.fecha_salida)
                  )";

          $stmt = mysqli_prepare($conexion, $sql);
          mysqli_stmt_bind_param($stmt, "iissss", $id_usuario, $cantidad_personas, $llegada, $salida, $llegada, $salida);
          $ejecutar = mysqli_stmt_execute($stmt);

          if ($ejecutar && mysqli_affected_rows($conexion) > 0) {
              echo '
                <script>
                    alert("Reservación exitosa");
                    window.location = "INVOICE-main/invoiced.php";
                </script>
              ';
              exit;
          } else {
              echo '
                <script>
                    alert("Fechas no disponibles o error en la inserción");
                    window.location = "formulario_doble.php";
                </script>
              ';
              exit;
          }
      } else {
          echo '
            <script>
                alert("Ingresar fechas de llegada y salida");
                window.location = "formulario_doble.php";
            </script>
          ';
          exit;
      }
  } else {
      echo '
        <script>
            alert("No se pudo obtener el usuario");
            window.location = "index.php";
        </script>
      ';
      exit;
  }

  function obtenerIdUsuario($correo) {
      global $conexion;
      $query = "SELECT id_usuario FROM usuarios WHERE correo = ?";
      $stmt = mysqli_prepare($conexion, $query);
      mysqli_stmt_bind_param($stmt, "s", $correo);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($result && mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          return $row['id_usuario'];
      } else {
          return false;
      }
  }
  
  mysqli_close($conexion);
  include "formulario_doble.php";
   

?>