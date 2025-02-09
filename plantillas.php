<?php
session_start();
include("Conexionproyecto.php");
$imagenPerfil = "Imagenes/Usuario.png"; 
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT foto_perfil FROM ataraxia WHERE usuario = '$usuario'";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (!empty($fila['foto_perfil'])) {
            $imagenPerfil = $fila['foto_perfil'];
        }
    }
}
?>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud Mental</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url(Imagenes/descarga.jfif);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background: rgb(252, 252, 252);
            box-shadow: 0 4px 25px -15px black;
            z-index: 2;
        }

        .container-header {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            width: 100%;
            position: relative;
        }

        .logo-pri {
            display: flex;
            align-items: center;
        }

        .menu nav ul {
            list-style: none;
            display: flex;
        }

        .menu nav ul li {
            margin: 0 20px;
        }

        .menu nav ul li a {
            text-decoration: none;
            color: rgb(68, 68, 68);
        }
        
        .carousel-download a:hover {
            background: #45a049;
        }
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: sans-serif;
}
body{
    background-image: url(Imagenes/descarga.jfif);
    background-position: center center;/*para colocar una imagen de fondo en el centro de la caja a la que está asociada*/
    background-repeat: no-repeat;/*no se repita la imagen*/
    background-size: cover;/*para que la imagen de fondo se ajuste a todo el área de posicionamiento de fondo, sin dejar ningún espacio vacío*/
    background-attachment: fixed;/*para fijar la posición de una imagen de fondo en la ventana gráfica, de modo que no se mueva cuando se desplace por la página*/
}

/*Barrita Introducturia*/
header{
    position: fixed;/*Por encima de todo*/
    top: 0;/*Se mantiene pegado hacia arriba*/
    left: 0;/*se mantiene pegado a la izquierda*/
    width: 100%;/*El 100% del ancho de la pantalla*/
    height: 80px;/*Altura*/
    background: rgb(252, 252, 252);/*Fijar un color*/
    box-shadow: 0 4px 25px 5px hsla(0, 0%, 0%, 0.5);/*Sombra de 0 de izquierda a derecha, sombra con movimiento hacia abajo de 4px, el desbanecimiento de la sombra sera de 25 px, tamaño  de la sombra -22px y se fija el color de la sombra*/
    z-index: 2;
}
.container-header{
    max-width: 1200px;/*Margen que sigue toda la pagina*//*mov*/
    margin: auto;/*Da funcionalidad a lo de arriba*/
    display: flex;/*Se pone a lado del otro*/
    justify-content: space-between;/*Lo manda al extremo*/
    width: 100%;
    position: relative;
}
/*LOGO*/
.logo-pri{
    height: 80px;
    display: flex;/*sin esto lo de abajo no funciona*/
    justify-content: center;/*para que el contenido se centre de manera horizontal*/
    align-items: center;/*para que el contendo se centre de manera vertical*/

}

/*MENU*/
.menu{
    height: 80px;/*La altura*/
}

.menu nav{
    height: 100%;/*el 100% de la altura*/
}
.menu nav ul{
    height: 100%;/*el 100% de la altura*/
    display: flex;/*se acomoodan uno al lado del otro*/
    list-style: none;/*elimina los puntos*/
}
.menu nav ul li{
    height: 100%;/*el 100% de la altura*/
    margin: 0px 20px;/*0px verticalmente, 20px horizontalmente*//*mov*/
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}
.menu nav ul li a{
    color: #747474;
    font-family: Georgia, 'Times New Roman', Times, serif;/**/
} 
/*Seleccionado segun la pagina*/
.menu-select:before {
    content: ''; /*contenido en blanco*/
    width: 100%;
    height: 4px;
    background: rgb(76, 174, 234);
    position: absolute;
    top: 0;
    left: 0;
}
.menu .text-menu-select {
    color:  rgb(76, 174, 234);
}
/*Espacio*/
.espacio {
    width: 120px;
}

/*Registro*/
.user-icon {
    position: relative;
    cursor: pointer;
    margin-left: 2cm;
    margin-top: 0.5cm;
}
.user-icon img {
    width: 65px;
    height: 40px;
    border-radius: 50%;
}
.dropdown-menu {
    position: absolute;
    top: 62px;
    right: 10px;
    width: 300px;
    background-color: rgb(192, 192, 192);
    color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: none;
    opacity: 0;
    transform: translateY(-10px);
    transition: opacity 0.3s ease, transform 0.3s ease;
    z-index: 1000;
}
.dropdown-menu.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}
.dropdown-menu a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    color: white;
    text-decoration: none;
    transition: background-color 0.3s;
}
.dropdown-menu a:hover {
    background-color: #bdbdbd;
}
.dropdown-menu hr {
    margin: 0;
    border: none;
    border-top: 1px solid #383838;
}
.dropdown-menu .icon {
    margin-right: 70px;
    font-size: 20px;
}
.dropdown-menu hr {
    border-top: 1px solid #383838;
}

.container-all{
    position: relative;
    margin-top: 80px;
    height: 800px;
}

.container-all::before{
    content: '';
    width: 100%;
    height: 100%;
    /*background-color: rgba(127, 255, 212, 0.3);*/
    position: absolute;
    top: 0;
    left: 0;
}
.container-all .container-portada{
    position: relative;
    z-index: 1;
}
.container-eslogan{
    max-width: 800px;
    height: 300px;
    margin: auto;
    text-align: left;
    display: flex;
    justify-content: center;
    align-items: center;
}
.container-eslogan h2{
    font-size: 35px;
    font-weight: 900;
    font-family: 'Courier New', Courier, monospace;
    color: #6CA2AA;
    margin-bottom: 20px;
}
.container-all .container-intro .parrafo-uno{
    font-family: 'Courier New', Courier, monospace;
    color: #000000;
    font-size: 20px;
    font-weight: 900;
    padding: 0px 500px 50px 50px;
}
.container-all .container-intro .parrafo-dos{
    font-family: 'Courier New', Courier, monospace;
    color: #000000;
    font-size: 20px;
    font-weight: 900;
    padding: 0px 50px 50px 500px;
}
.container-ft footer ul {
            list-style: none;
        }

        .container-ft footer a {
            color: #272727;
        }

        .pie-title {
            color: #272727;
            font-family: 'Merriweather';
            text-align: center;
            font-size: 1.375rem;
            padding-bottom: 0.625rem;
        }

        .pie-text {
            text-align: center;
        }

        .pie-principal {
            padding: 1.25rem 9rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pie-principal-item {
            padding: 1.25rem;
            min-width: 20rem;
        }

        .container-ft footer img {
            width: 30px;
            height: 30px;
        }

        .pie-social {
            padding: 0 1.875rem 1.25rem;
        }

        .pie-social-list {
            display: flex;
            justify-content: center;
            border-top: 1px #777 solid;
            padding-top: 1.25rem;
        }

        .pie-social-list li {
            margin: 0.5rem;
            font-size: 1.25rem;
        }

        .container-ft .copyright {
            color: #272727;
            text-align: center;
            padding-top: 24px;
            opacity: 0.3;
            font-size: 13px;
            margin-bottom: 0;
        }
        .container-ft footer {
            width: 100%;
            padding: 20px 100px;
            background: #f7f7f7;
            margin-top: 2px;
            line-height: 1.5;
        }
        .contenedor-principal {
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url('fondo.png'); 
    background-size: cover;
    background-position: center;
}

.enlace-posicion {
    position: absolute;
    width: 150px; 
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.enlace-posicion a {
    text-decoration: none;
    color: #333;
}

.enlace-imagen {
    width: 100%;
    border-radius: 8px;
}


.izquierda-arriba {
    top: 10%; 
    left: 5%;
}

.derecha-arriba {
    top: 10%;
    right: 5%;
}

.izquierda-abajo {
    bottom: 10%;
    left: 5%;
}

.derecha-abajo {
    bottom: 10%;
    right: 5%;
}
.centro-arriba {
    top: 20%; 
    left: 50%;
    transform: translate(-50%, -50%);
}

.centro {
    top: 50%; 
    left: 50%;
    transform: translate(-50%, -50%);
}

.centro-abajo {
    bottom: 20%; 
    left: 50%;
    transform: translate(-50%, 50%);
}
.posicion1 {
    top: 30%;
    left: 20%;
    transform: translate(-50%, -50%);
}

.posicion2 {
    top: 30%;
    left: 80%;
    transform: translate(-50%, -50%);
}

.posicion3 {
    top: 70%;
    left: 20%;
    transform: translate(-50%, -50%);
}

.posicion4 {
    top: 70%;
    left: 80%;
    transform: translate(-50%, -50%);
}
    </style>
</head>
<header>
    <div class="container-header">
        <div class="logo-pri">
            <img id="logo" src="Imagenes/Logo.png" alt="Logo" width="45px" height="45px">
            <img id="logotext" src="Imagenes/Logotext.png" alt="Logotext" width="170px" height="25px">
        </div>
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="SaludMental.php">Salud Mental </a></li>
                    <li><a href="">Agenda</a></li>
                    <li><a href="#">Pendientes</a></li>
                    <li><a href="plantillas.html">Plantillas</a></li>
                    <li><a href="#">Acerca de...</a></li>
                </ul>
            </nav>
        </div>
        <div class="espacio"></div>
        <div class="user-icon" id="userMenu">
                <img src="<?php echo $imagenPerfil; ?>" alt="Usuario" id="userImage">
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="#">Mi perfil</a>
                    <a href="login.php">Iniciar sesión</a>
                    <a href="Ataraxia_Altas_2.php">Registrarse</a>
                    <hr>
                    <a href="logout.php">Cerrar sesión</a>
            </div>
        </div>
    </div>    
</header>
<div class="contenedor-principal">
    <div class="enlace-posicion izquierda-arriba">
        <a href="https://citamedicadigital.imss.gob.mx/CMW/cmw;jsessionid=IQKqvWGsfTOPagXAQYTMoOp17JJV7Fa2_atoV8VyEnDdgSOTttVb!8265093!779103906?v=login" class="enlace-item">
            <img src="imagenes/imss.png" alt="Imagen 1" class="enlace-imagen">
            <p>IMSS</p>
        </a>
    </div>

  
    <div class="enlace-posicion derecha-arriba">
        <a class="enlace-item">
            <img src="imagenes/imagen2.png" alt="Imagen 2" class="enlace-imagen">
    
        </a>
    </div>

 
    <div class="enlace-posicion izquierda-abajo">
        <a class="enlace-item">
            <img src="imagenes/imagen3.png" alt="Imagen 3" class="enlace-imagen">

        </a>
    </div>


    <div class="enlace-posicion derecha-abajo">
        <a class="enlace-item">
            <img src="imagenes/imagen4.png" alt="Imagen 4" class="enlace-imagen">
      
        </a>
    </div>
    <div class="enlace-posicion centro-arriba">
        <a class="enlace-item">
            <img src="imagenes/imagen5.png" alt="Imagen 5" class="enlace-imagen">
       
        </a>
    </div>

    <div class="enlace-posicion centro">
        <a class="enlace-item">
            <img src="imagenes/imagen6.png" alt="Imagen 6" class="enlace-imagen">
   
        </a>
    </div>

    <div class="enlace-posicion centro-abajo">
        <a href="" class="enlace-item">
            <img src="imagenes/imagen6.jpg" alt="Imagen 7" class="enlace-imagen">
    
        </a>
    </div>
    <div class="enlace-posicion posicion1">
        <a href="https://ejemplo8.com" class="enlace-item">
            <img src="imagenes/imagen8.jpg" alt="Imagen 8" class="enlace-imagen">
            <p>MedicaSur </p>
        </a>
    </div>
    
    <div class="enlace-posicion posicion2">
        <a class="enlace-item">
            <img src="imagenes/imagen9.jpg" alt="Imagen 9" class="enlace-imagen">
       
        </a>
    </div>
    
    <div class="enlace-posicion posicion3">
        <a class="enlace-item">
            <img src="imagenes/imagen10.jpg" alt="Imagen 10" class="enlace-imagen">
    
        </a>
    </div>
    
    <div class="enlace-posicion posicion4">
        <a class="enlace-item">
            <img src="imagenes/imagen11.png" alt="Imagen 11" class="enlace-imagen">
    
        </a>
    </div>
</div>
</div>
    <div class="container-ft">
        <footer>
            <section class="pie-principal">
                <div class="pie-principal-item">
                    <h2 class="pie-title">Acerca de</h2>
                    <ul class="pie-text">
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Términos y Condiciones</a></li>
                        <li><a href="#">Developers</a></li>
                    </ul>
                </div>
                <div class="pie-principal-item">
                    <h2 class="pie-title">Recursos</h2>
                    <ul class="pie-text">
                        <li><a href="#">Imágenes</a></li>
                        <li><a href="#">Diseñadores</a></li>
                        <li><a href="#">Recursos extras</a></li>
                    </ul>
                </div>
                <div class="pie-principal-item">
                    <h2 class="pie-title">Contacto</h2>
                    <ul class="pie-text">
                        <li><a href="#">Ayuda</a></li>
                        <li><a href="#">Avances</a></li>
                        <li><a href="#">Advertencia</a></li>
                    </ul>
                </div>
            </section>
            <section class="pie-social">
                <ul class="pie-social-list">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=61568923633401&mibextid=ZbWKwL" class="facebook">
                            <img src="Imagenes/facebook.png" alt="facebook">
                        </a>
                    </li>
                    <li>
                        <a href="https://x.com/ataraxia_salud?t=_Dx1BywAKVWPdUOJqhJSqQ&s=09" class="twitter">
                            <img src="Imagenes/x.png" alt="twitter">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ataraxia_salud/profilecard/?igsh=MW9idHpyNW9qcDk2OQ==" class="instagram">
                            <img src="Imagenes/instagram.png" alt="instagram">
                        </a>
                    </li>
                </ul>
                <p class="copyright">Ataraxia @ 2024</p>
            </section>
        </footer>
    </div>

    <script>

const userMenu = document.getElementById('userMenu');
const dropdownMenu = document.getElementById('dropdownMenu');


userMenu.addEventListener('click', (e) => {
    dropdownMenu.classList.toggle('active');
    e.stopPropagation(); 
});


window.addEventListener('click', () => {
    dropdownMenu.classList.remove('active');
});

dropdownMenu.addEventListener('click', (e) => {
    e.stopPropagation();
});
    </script>
</body>
</html>
