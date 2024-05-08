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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de ventas en linea</title>
    <link rel="preload" href="css/Normalize.css" as="style">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="preload" href="css/styles1.css" as="style">
    <link href="css/styles1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swao"
    rel="stylesheet">
</head>
<body>   

    <section class="nav-bg"> 
        <header>
            <nav class="navegacion-principal contenedor">
                <a href="#">Inicio</a>
                <a href="#">Sobre nostros</a>
                <a href="#">Contacto</a>
            </nav>
        </header> 
    </section>   
        
    <section class="hero">
        <div class="contenido-hero">
            <a href="#" class="logo">
                <img src="img/D.png" alt="logo de la compañia">
            </a>
        </div> 
    </section>

    <main class="contenedor sombra">

        <section class="servirle">
            <h3>
                SERVIRTE ES UN PLACER PARA NOSOTROS
            </h3>
        </section>

            <div class="wrapper">
                <div class="wrap">
                    <img class="imagen" src="img/Q.jpg">
                        
                        <section class="texto">
                            <h2>Nuestro menu</h2>
                            <p>
                                Nuestro menú te ofrece ricos y diversos platillos como hechos en casa. Una minuciosa selección de carnes y mariscos frescos nos han colocado como una de las mejores cocinas del puerto.
                            </p>
                        
                            <br>
                        
                            <p>
                                Y que decir de nuestro bar, una extensa variedad de bebidas nacionales e internacionales con los que acompañaras de nuestros deliciosos snacks, jugando en una de nuestras mesas de pool, póker o bien refrescate con un chapuzón en nuestra revitalizante alberca, un entretenimiento que solo encontraras en FUTURY.
                            </p>
                        </section>  
                </div>
                    
                <div class="wrap">
                    <img class="imagen" src="img/Z2.jpg">
                    <section class="texto">
                        <h2>La Choza</h2>
                        <p>
                            El hotel cuenta con todos los servicios complementarios que le permitirán disfrutar de su estancia maximizando su tiempo y minimizando su esfuerzo desde que Ud. ingrese a nuestras instalaciones. Desde pedir un taxi hasta sugerirle un itinerario para su visita.
                        </p>
                        <br>
                        <p>
                            También, conoce y disfruta nuestro restaurante FUTURY, el cual ofrece un concepto innovador que mezcla la ya famosa cocina de mar y tierra, implementando nuestras riquísimas recetas regionales con un toque que solo lo encontraras con nosotros.
                        </p>
                    </section>
                </div>
            </div>
        <br><br>    
        <h4>Contamos con:</h4>

        <div class="servicios">
            <section class="servicio">
                <h5>Servicio 24/7</h5>
                <div class="iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-24-hours" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#871B1F" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 13c.325 2.532 1.881 4.781 4 6" />
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2" />
                        <path d="M4 5v4h4" />
                        <path d="M12 15h2a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-1a1 1 0 0 0 -1 1v1a1 1 0 0 0 1 1h2" />
                        <path d="M18 15v2a1 1 0 0 0 1 1h1" />
                        <path d="M21 15v6" />
                    </svg>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, tenetur, exercitationem impedit repellat inventore nesciunt dignissimos minus autem eos eius iusto odio corporis nam quos ipsam facere sapiente quidem repellendus recusandae cumque ullam non vero eveniet? Beatae commodi labore saepe!</p>
            </section>

            <section class="servicio">
                <h5>Wi-Fi</h5>
                <div class="iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-access-point" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#871B1F" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 12l0 .01" />
                        <path d="M14.828 9.172a4 4 0 0 1 0 5.656" />
                        <path d="M17.657 6.343a8 8 0 0 1 0 11.314" />
                        <path d="M9.168 14.828a4 4 0 0 1 0 -5.656" />
                        <path d="M6.337 17.657a8 8 0 0 1 0 -11.314" />
                    </svg>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic soluta, dolorum rerum amet eveniet reiciendis culpa molestiae natus eaque asperiores similique itaque quidem quibusdam dolor necessitatibus? Alias aliquam reprehenderit facere et, iure, consequatur eligendi dolores impedit soluta, quos eveniet? Exercitationem.</p>
            </section>

            <section class="servicio">
                <h5>Taxis</h5>
                <div class="iconos">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-car" width="60" height="60" viewBox="0 0 24 24" stroke-width="2" stroke="#871B1F" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                    </svg>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet expedita accusantium consequuntur recusandae quisquam? Quidem dolorum enim, inventore amet reprehenderit alias fugiat repudiandae sunt ipsa iusto sed natus ipsam nostrum eos voluptatem modi, et doloribus cupiditate, quisquam voluptates optio nisi!</p>
            </section>
        </div>

        <h4>Reserva</h4><br>

        <div class="wrapper">
            <div class="wrap">
                <img class="imagen" src="img/Z6.jpg"><!-- Aqui pones el enlace de una de las fotos -->
                    
                    <section class="texto">
                        <h2>Habitación Sencilla</h2>
                        <p>
                            Camas: 1 cama, clasificacion: estándar.
                        </p>
                    
                        <br>
                    
                        <p>
                            Precio: $1,690 MXN por noche, no incluye impuestos ni cargos
                        </p>
                        <br>
                        <br>
                        <center><a href="formulario_sencilla.php">Reservar</a></center><!-- Aqui pones el enlace a la pagina de habitacion sencilla -->
                    </section>  
            </div>
                
            <div class="wrap">
                <img class="imagen" src="img/Z5.jpg"><!-- Aqui pones el enlace de una de las fotos -->
                <section class="texto">
                    <h2>Habitación doble</h2>
                    <p>
                        Camas: 2 camas dobles, clasificacion: estándar.

                    </p>
                    <br>

                    <p>
                        Precio: $2,123 MXN por noche, no incluye impuestos ni cargos
                    </p>
                    <br>
                    <br>
                    <center><a href="formulario_doble.php">Reservar</a></center> <!-- Aqui pones el enlace a la pagina de habitacion doble -->
                </section>
            </div>
        </div>

        <div class="mapa">
            <h6 class="maps">Nos encontramos en:</h6>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14697.719930213438!2d-109.94500928712567!3d22.934386429352823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86af4a1b8077297f%3A0x60d6ce0449c3422f!2sMesa%20Colorada%2C%20Col%20del%20Sol%2C%20B.C.S.!5e0!3m2!1ses!2smx!4v1710998913672!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><br>

        <br>
        <br>

        <center><a href="logout.php" class=>CERRAR SESION</a></center>

    </main>
</body>
</html>