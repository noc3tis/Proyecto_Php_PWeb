<?php

    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");
    
    $idhabitacion=$_POST["idhabitacion"];
    $idtipo=$_POST["idtipo"];
    
    if (($idtipo!="")&&($idhabitacion!="")){

        $query = "SELECT COUNT(*) AS count FROM tipos WHERE id_tipo = $idtipo";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['count'] > 0) {
            $sql = "UPDATE habitaciones SET id_tipo='$idtipo' WHERE
            id_habitacion=$idhabitacion";

            $ejecutar = mysqli_query($conexion, $sql);

            if($ejecutar===TRUE){
            echo '
                <script>
                alert("Registro modificado");
                window.location = "habitaciones.php";
                </script>
            ';
            }else{
            echo '
                <script>
                    alert("No se pudo modoficar el registro");
                    window.location = "habitaciones.php";
                </script>
                ';
            }
        } else {
            echo '
            <script>
                alert("el tipo de habitacion no existe");
                window.location = "habitaciones.php";
            </script>
            ';
        }
        

    }

    mysqli_close($conexion);

?>