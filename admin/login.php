<?php
     
    session_start();

    $dbhost = "localhost"; 
    $dbname = "reservas";
    $dbuser = "root";
    $dbpass = "";

    $conexion=mysqli_connect
    ($dbhost,$dbuser,$dbpass,$dbname, "3306") or 
    die ("Problemas con la conexion");

    $correo = $_POST['Correo'];
    $contraseña = $_POST['Contraseña'];

    $validar_login= mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$correo'
    AND contraseña ='$contraseña'");

    if(mysqli_num_rows($validar_login)> 0){
        $fila= mysqli_fetch_object($validar_login);
        $idrol = $fila->id_rol;
        if($idrol == 1){
            $_SESSION['usuario'] = $correo;
            header("location:menu.php");
            exit;
        }else{
            echo '
            <script>
                alert("Tu usuario no tiene acceso");
                window.location = "index.php";
            </script>
        ';exit;
        }
    }else{
        echo '
            <script>
                alert("verificar los datos");
                window.location = "index.php";
            </script>
        ';exit;
    }
    mysqli_close($conexion);

?>

