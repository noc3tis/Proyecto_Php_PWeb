<?php

    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");
    
    $idrol=$_POST["rol"];
    $nombre=$_POST["nombre"];
    
    if (($idrol!="")&&($nombre!="")){
        $sql = "UPDATE roles SET nombre_rol='$nombre' WHERE
        id_rol=$idrol";

        $ejecutar = mysqli_query($conexion, $sql);

        if($ejecutar===TRUE){
        echo '
            <script>
            alert("Registro modificad");
            window.location = "rol.php";
            </script>
        ';
        }else{
        echo '
            <script>
                alert("No se pudo modoficar el registro");
                window.location = "rol.php";
            </script>
            ';
        }

    }

    mysqli_close($conexion);

?>