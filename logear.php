<?php   
     if (isset($_SESSION['usuario'])){
        if(isset($_GET['tipo']) && $_GET['tipo'] == 'formulario_sencilla'){
            header('Location: formulario_sencilla.php');
            exit();
        }   elseif (isset($_GET['tipo']) && $_GET['tipo']== 'reserva_doble'){
                header('Location: reserva_doble.php');
                exit();
        } else{
            header('Location: index.htm');
            exit();
        }
     }  else{
        header('Location: sesion.php');
        exit();
     }
 ?>