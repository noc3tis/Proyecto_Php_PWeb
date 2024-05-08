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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Tabla Reservas</title>
</head>
<body>
    <h1>Reservas</h1>
    
    <center><table border="1">
        <tr>
            <td>id_reserva</td>
            <td>id_habitacion</td>
            <td>id_usuario</td>
            <td>cantidad_personas</td>
            <td>fecha_llegada</td>
            <td>fecha_salida</td>
        </tr>

        <?php
        $sql="SELECT * from reservas";
        $result=mysqli_query($conexion, $sql);

        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
            <td><?php echo $mostrar['id_reserva']?></td>
            <td><?php echo $mostrar['id_habitacion']?></td>
            <td><?php echo $mostrar['id_usuario']?></td>
            <td><?php echo $mostrar['cantidad_personas']?></td>
            <td><?php echo $mostrar['fecha_llegada']?></td>
            <td><?php echo $mostrar['fecha_salida']?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</center>
<br><br><br><br>

<center>
        <section class="altas">
            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Registrar reserva</a><br><br>

                        <input type="number" id="id_hab" name="id_hab" min="1" placeholder="id habitación" oninput="disableDates()">
                        <input class="controls" min="1" type="number" name="id_us" id="id_us" placeholder="id usuario">
                        <input class="controls" min="1" type="number" name="cantidad" id="cantidad" placeholder="cantidad de personas">
                        <input type="date" id="fecha_llegada" name="llegada" min="<?= date('Y-m-d') ?>" <?php echo !empty($fechas_ocupadas_por_habitacion) ? 'oninput="disableDates()"' : '' ?> placeholder="Fecha de llegada" data-tipo-habitacion="<?php echo $tipo_habitacion; ?>">
                        <input type="date" id="fecha_salida" name="salida" min="<?= date('Y-m-d') ?>" <?php echo !empty($fechas_ocupadas_por_habitacion) ? 'oninput="disableDates()"' : '' ?> placeholder="Fecha de salida" data-tipo-habitacion="<?php echo $tipo_habitacion; ?>">


                        <input type="submit" value="Agregar" name="insertar" /><br><br>

                    </section>
                </section>
            </form>   

            <form id="form1" name="form1" method="post" action="altasybajas.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Eliminar reserva</a><br><br>

                        <input class="controls" min="1" type="number" name="id" id="id" placeholder="id reserva">

                        <input type="submit" value="Eliminar" name="eliminar"/><br><br>
                    </section>
                </section>
            </form>   
            
            <form id="form1" name="form1" method="post" action="modificar.php">
                <form action="formulario">
                    <section class="formulario">
                        <a>Modificar reserva</a><br><br>

                        <input class="controls" min="1" type="number" name="id" id="id" placeholder="id reserva">

                        <input type="submit" value="Modificar" name="modificar" /><br><br><br>
                    </section>
                </section>
            </form>     
            
        </section>
</center>

</body>
</html>