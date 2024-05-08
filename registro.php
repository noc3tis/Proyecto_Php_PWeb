
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="preload" href="css/Normalize.css" as="style">
        <link rel="stylesheet" href="css/Normalize.css">
        <link rel="preload" href="css/styles1.css" as="style">
        <link href="css/styles1.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swao"
        rel="stylesheet">
    </head>
    <body>
    <section class="singup">
        <form id="form1" name="form1" method="post" action="checkin.php">
            <h1>Registrarse</h1>
                <form action="formulario">
                    <section class="formulario">
                        <a>Datos personales</a><br><br>
                        <input class="controls" type="text" name="NombreHuesped" id="NombreHuesped" placeholder="Nombre completo">
                        <input class="controls" type="text" name="Telefono" id="Telefono" placeholder="Teléfono">
                        <input class="controls" type="text" name="Correo" id="Correo" placeholder="Correo electronico">
                        <input class="controls" type="password" name="Contraseña" id="Contraseña" placeholder="Contraseña">

                        <input class="botons" type="submit" value="Registrarse" name="insertar" /><br><br>
                    </section>
                </form>
            </section>
        </form>    
    </section>

    </body>
</html>