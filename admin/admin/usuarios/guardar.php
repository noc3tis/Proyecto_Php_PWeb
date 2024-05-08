<?php

    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");


    $id=$_POST["id"];
    $rol=$_POST["rol"];
    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $contraseña=$_POST["contraseña"];
    
    if (($telefono!="")&&($correo!="")){

        $query = "SELECT COUNT(*) AS count FROM usuarios WHERE id_rol = '$rol'";
        $result = mysqli_query($conexion, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['count'] > 0) {
            $sql = "UPDATE usuarios SET id_rol='$rol', nombre='$nombre', telefono='$telefono', correo='$correo', contraseña='$contraseña' WHERE
            id_usuario=$id";
    
            $ejecutar = mysqli_query($conexion, $sql);
    
            if($ejecutar===TRUE){
            echo '
                <script>
                alert("Registro modificado");
                window.location = "usuarios.php";
                </script>
            ';
            }else{
                echo '
                    <script>
                        alert("No se pudo modoficar el registro");
                        window.location = "usuarios.php";
                    </script>
                    ';
            }
        } else {
            echo '
                <script>
                    alert(ID Rol ingresado no existe");
                    window.location = "usuarios.php";
                </script>
                ';
        }
        

    }

    mysqli_close($conexion);

?>