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

    
    $query = "SELECT DISTINCT h.id_habitacion, t.nombre_tipo, r.fecha_llegada, r.fecha_salida 
    FROM reservas r
    INNER JOIN habitaciones h ON r.id_habitacion = h.id_habitacion
    INNER JOIN tipos t ON h.id_tipo = t.id_tipo
    WHERE r.fecha_llegada >= CURRENT_DATE()";

    $result = mysqli_query($conexion, $query);

    $fechas_ocupadas_por_habitacion = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $id_habitacion = $row['id_habitacion'];
        $tipo_habitacion = $row['nombre_tipo'];
        $fecha_llegada = strtotime($row['fecha_llegada']);
        $fecha_salida = strtotime($row['fecha_salida']);

        if (!isset($fechas_ocupadas_por_habitacion[$id_habitacion])) {
            $fechas_ocupadas_por_habitacion[$id_habitacion] = [];
        }

        while ($fecha_llegada < $fecha_salida) {
            $fechas_ocupadas_por_habitacion[$id_habitacion][] = date('Y-m-d', $fecha_llegada);
            $fecha_llegada = strtotime('+1 day', $fecha_llegada);
        }
    }

    // Convertir el array a formato JSON
    $fechas_ocupadas_json = json_encode($fechas_ocupadas_por_habitacion);


    $id=$_POST["id"];

    if (($id!="")){

    $sql = "SELECT * FROM `reservas` WHERE id_reserva = $id";

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
            
            <script>
                function disableDates() {
                    var idHabitacion = parseInt(document.getElementById("id_habitacion").value);
                    var fechasOcupadasPorHabitacion = <?php echo $fechas_ocupadas_json; ?>;
                    var fechaLlegada = new Date(document.getElementById("fecha_llegada").value);
                    var fechaSalida = new Date(document.getElementById("fecha_salida").value);
                    var fechaActual = new Date();
                    fechaActual.setHours(0,0,0,0);

                    var inputsFecha = document.getElementsByTagName('input');
                    for (var i = 0; i < inputsFecha.length; i++) {
                        if (inputsFecha[i].type == 'date') {
                            var fecha = new Date(inputsFecha[i].value);
                            fecha.setHours(0,0,0,0);
                            if (fecha < fechaActual || fecha >= fechaSalida || fecha > fechaSalida) {
                                inputsFecha[i].disabled = true;
                            } else {
                                var tipoHabitacion = fechasOcupadasPorHabitacion[idHabitacion];
                                if (tipoHabitacion && tipoHabitacion.includes(inputsFecha[i].value)) {
                                    inputsFecha[i].disabled = true;
                                } else {
                                    inputsFecha[i].disabled = false;
                                }
                            }
                        }
                    }
                }
            </script>
        </head>
        <body>

            <a>Modificar reserva</a><br><br>

            <form id="form1" name="form1" method="post" action="guardar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Registrar reserva</a><br><br>

                        <input type="hidden" name="id_res" value="<?php echo $fila->id_reserva?>">
                        <input class="controls" min="1" type="number" name="id_hab" id="id_hab" placeholder="id habitacion" value="<?php echo $fila->id_habitacion?>">
                        <input class="controls" min="1" type="number" name="id_us" id="id_us" placeholder="id usuario" value="<?php echo $fila->id_usuario?>">
                        <input class="controls" min="1" type="number" name="cantidad" id="cantidad" placeholder="cantidad de personas" value="<?php echo $fila->cantidad_personas?>">
                        <input type="date" id="fecha_llegada" name="llegada" min="<?= date('Y-m-d') ?>" <?php echo !empty($fechas_ocupadas_por_habitacion) ? 'oninput="disableDates()"' : '' ?> placeholder="Fecha de llegada" data-tipo-habitacion="<?php echo $tipo_habitacion; ?>">
                        <input type="date" id="fecha_salida" name="salida" min="<?= date('Y-m-d') ?>" <?php echo !empty($fechas_ocupadas_por_habitacion) ? 'oninput="disableDates()"' : '' ?> placeholder="Fecha de salida" data-tipo-habitacion="<?php echo $tipo_habitacion; ?>">

                        <input type="submit" value="Modificar" name="guardar" /><br><br>
                    </section>
                </section>
            </form>

        </body>
        </html>
        <?php }
        else{
            echo '
            <script>
                alert("El registro no existe");
                window.location = "reservas.php";
            </script>
        ';exit;
        }}else{
        echo '
            <script>
                alert("verificar los datos");
                window.location = "reservas.php";
            </script>
        ';exit;
    }

    mysqli_close($conexion);
?>