<?php

    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

    $idreserva=$_POST["id_res"];
    $idhab=$_POST["id_hab"];
    $idus=$_POST["is_us"];
    $cantidad=$_POST["cantidad"];
    $llegada=$_POST["llegada"];
    $salida=$_POST["salida"];

    if (($llegada!="")&&($salida!="")){
      $query = "SELECT t.nombre_tipo 
      FROM habitaciones h 
      INNER JOIN tipos t ON h.id_tipo = t.id_tipo 
      WHERE h.id_habitacion = $idhab";

      $resultnombretipo= mysqli_query($conexion, $query);

      if ($resultnombretipo && mysqli_num_rows($resultnombretipo) > 0) {
      $row = mysqli_fetch_assoc($resultnombretipo);
      $tipo_de_habitacion = $row['nombre_tipo'];

      $query_tipo = "SELECT id_tipo FROM tipos WHERE nombre_tipo = '$tipo_de_habitacion'";
      $result_tipo = mysqli_query($conexion, $query_tipo);

      if ($result_tipo && mysqli_num_rows($result_tipo) > 0) {
      $row_tipo = mysqli_fetch_assoc($result_tipo);
      $id_tipo = $row_tipo['id_tipo'];

      $query = "SELECT COUNT(*) AS count FROM reservas r
          INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion
          WHERE (fecha_llegada < '$salida' AND fecha_salida > '$llegada')
          AND h.id_tipo = $id_tipo";

      $result = mysqli_query($conexion, $query);
      $row = mysqli_fetch_assoc($result);

      if ($row['count'] > 0) {
          echo '
            <script>
            alert("Habitaciones no disponibles para esa fecha");
            window.location = "reservas.php";
            </script>
          ';exit();
      } echo "Error en la consulta principal: " . mysqli_error($conexion);
      }else{
      echo '
        <script>
        alert("No se encontro el id tipo");
        window.location = "reservas.php";
        </script>
      ';exit();
      }
      } else {
      echo '
        <script>
        alert("No se encontro ningun id tipo asociado");
        window.location = "reservas.php";
        </script>
      ';exit();
      }


      $query = "SELECT COUNT(*) AS count FROM habitaciones WHERE id_habitacion = $idhab";
      $result = mysqli_query($conexion, $query);
      $row = mysqli_fetch_assoc($result);

      if ($row['count'] > 0) {
          $query = "SELECT COUNT(*) AS count FROM usarios WHERE id_usuario = $idus";
          $result = mysqli_query($conexion, $query);
          $row = mysqli_fetch_assoc($result);

          if ($row['count'] > 0) {
            
            $query_tipo = "SELECT id_tipo FROM habitaciones WHERE id_habitacion = $idhab";
            $result_tipo = mysqli_query($conexion, $query_tipo);
            
            if (mysqli_num_rows($result_tipo) == 1) {
                $row_tipo = mysqli_fetch_assoc($result_tipo);
                $id_tipo_habitacion = $row_tipo['id_tipo'];

                $query_capacidad = "SELECT capacidad_maxima FROM tipos WHERE id_tipo = $id_tipo_habitacion";
                $result_capacidad = mysqli_query($conexion, $query_capacidad);
            
                if (mysqli_num_rows($result_capacidad) == 1) {
                    $row_capacidad = mysqli_fetch_assoc($result_capacidad);
                    $capacidad_maxima = $row_capacidad['capacidad_maxima'];
            
                    if ($cantidad <= $capacidad_maxima) {

                          $sql = "UPDATE reservas SET id_habitaciones='$id_hab', id_usuario='$idus', cantidad de personas='$cantidad', fecha_llegada='$llegada', fecha_salida='$salida' WHERE
                          id_reserva=$idres";

                          $ejecutar = mysqli_query($conexion, $sql);

                          if($ejecutar===TRUE){
                          echo '
                              <script>
                              alert("Reserva modificada");
                              window.location = "reservas.php";
                              </script>
                          ';
                          }else{
                          echo '
                              <script>
                                  alert("No se pudo modoficar la reserva");
                                  window.location = "reservas.php";
                              </script>
                              ';
                          }

                    } else {
                        echo '
                          <script>
                            alert("La capacidad indicada excede la capacidad máxima permitida para este tipo de habitación");
                            window.location = "reservasn.php";
                          </script>
                        ';exit();
                    }
                } else {
                    echo '
                    <script>
                      alert("Error al obtener la capacidad máxima del tipo de habitación asociado a la habitación seleccionada");
                      window.location = "reservas.php";
                    </script>
                  ';exit();
                }
            } else {
                echo '
                <script>
                  alert("Error al obtener el tipo de habitación asociado a la habitación seleccionada");
                  window.location = "reservas.php";
                </script>
              ';exit();
            }
          } else {
            echo '
              <script>
                alert("La llave foránea no es válida");
                window.location = "reservas.php";
              </script>
            ';exit();
          }
      } else {
        echo '
          <script>
            alert("La llave foránea no es válida");
            window.location = "reservas.php";
          </script>
        ';exit();
      }




          if (($tipo!="")&&($nombre!="")){
              $sql = "UPDATE usuarios SET id_rol='$rol', nombre='$nombre', telefono='$telefono', correo='$correo', contraseña='$contraseña' WHERE
              id_usario=$id";

              $ejecutar = mysqli_query($conexion, $sql);

              if($ejecutar===TRUE){
              echo '
                  <script>
                  alert("Habitacion modificada");
                  window.location = "usuarios.php";
                  </script>
              ';
              }else{
              echo '
                  <script>
                      alert("No se pudo modoficar la habitacion");
                      window.location = "usuarios.php";
                  </script>
                  ';
              }

    }

    }

    mysqli_close($conexion);

?>