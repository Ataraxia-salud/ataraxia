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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ataraxia</title>
    <script src="Index.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/es.js"></script>
    <style>
       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: sans-serif;
        }

     
        body {
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
            box-shadow: 0 4px 25px 5px hsla(0, 0%, 0%, 0.5);
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
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu {
            height: 80px;
        }

        .menu nav {
            height: 100%;
        }

        .menu nav ul {
            height: 100%;
            display: flex;
            list-style: none;
        }

        .menu nav ul li {
            height: 100%;
            margin: 0 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .menu nav ul li a {
            color: #747474;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .menu-select:before {
            content: '';
            width: 100%;
            height: 4px;
            background: rgb(76, 174, 234);
            position: absolute;
            top: 0;
            left: 0;
        }

        .menu .text-menu-select {
            color: rgb(76, 174, 234);
        }

        .espacio {
            width: 120px;
        }

        /* User Icon */
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

        .container-all {
            position: relative;
            margin-top: 80px;
            height: 800px;
        }

        .container-all::before {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .container-portada {
            position: relative;
            z-index: 1;
        }

        .container-eslogan {
            max-width: 800px;
            height: 300px;
            margin: auto;
            text-align: left;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container-eslogan h2 {
            font-size: 35px;
            font-weight: 900;
            font-family: 'Courier New', Courier, monospace;
            color: #6CA2AA;
            margin-bottom: 20px;
        }

        .container-all .container-intro .parrafo-uno {
            font-family: 'Courier New', Courier, monospace;
            color: #000000;
            font-size: 20px;
            font-weight: 900;
            padding: 0px 500px 50px 50px;
        }

        .container-all .container-intro .parrafo-dos {
            font-family: 'Courier New', Courier, monospace;
            color: #000000;
            font-size: 20px;
            font-weight: 900;
            padding: 0px 50px 50px 500px;
        }

        /* Footer */
        .container-ft footer {
            width: 100%;
            padding: 20px 100px;
            background: #f7f7f7;
            margin-top: 2px;
            line-height: 1.5;
        }
        /*aqui estan los dos cuadros de los parrafos :b*/
        .container-all .container-intro .parrafo-uno {
    font-family: 'Courier New', Courier, monospace;
    color: #000000;
    font-size: 20px;
    font-weight: 900;
    padding: 20px;
    background-color: rgba(144, 238, 144, 0.3);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    position: relative;
    top: -50px;
    z-index: 1;
    margin-bottom: 20px;
    width: 45%;
    float: left;
    margin-top: 0;
}
.container-intro .btn-encuesta {
    display: block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4caf50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease;
}

.container-intro .btn-encuesta:hover {
    background-color: #45a049;
}
<style>
        .container-calendario {
            display: flex;
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
        }
        .titulo-calendario {
            text-align: center;
            font-size: 24px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        #calendar {
            max-width: 60%;
        }
        .eventos-lista {
            width: 40%;
            padding-left: 20px;
            border-left: 2px solid #ddd;
        }
        .eventos-lista h3 {
            color: #4CAF50;
        }
        .evento-item {
            background: #f7f7f7;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }
.container-all .container-intro .parrafo-dos {
    font-family: 'Courier New', Courier, monospace;
    color: #000000;
    font-size: 20px;
    font-weight: 900;
    padding: 20px;
    background-color: rgba(144, 238, 144, 0.3);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    position: relative;
    top: 50px;
    z-index: 1;
    margin-top: 40px;
    width: 45%;
    float: right;
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
        .container-calendario {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    margin-top: 100px;
}

.titulo-calendario {
    text-align: center;
    font-size: 24px;
    color: #4CAF50;
    margin-bottom: 20px;
}

#calendar {
    max-width: 100%;
}
    </style>
</head>
<body>
    <header>
        <div class="container-header">
            <div class="logo-pri">
                <img id="logo" src="Imagenes/Logo.png" alt="Logo" width="45px" height="45px">
                <img id="logotext" src="Imagenes/Logotext.png" alt="Logotext" width="170px" height="25px">
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li class="menu-select"><a href="" class="text-menu-select">Inicio</a></li>
                        <li><a href="SaludMental.php">Salud Mental </a></li>
                        <li><a href="agenda.php">Agenda</a></li>
                        <li><a href="pendientes.php">Pendientes</a></li>
                        <li><a href="plantillas.php">Plantillas</a></li>
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
            </div>
        </div>    
    </header>
    <body>
    <div class="container-calendario">
    <div>
        <h2 class="titulo-calendario">Mi Agenda</h2>
        <div id="calendar"></div>
    </div>
    <div class="eventos-lista" id="eventosLista">
        <h3>Eventos Agregados</h3>
        <div id="listaEventos"></div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');
    let eventosLista = document.getElementById('listaEventos');
    let calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es', 
        selectable: true,
        editable: true,
        eventClick: function(info) {
            alert("Evento: " + info.event.title + "\nFecha: " + info.event.start.toLocaleString());
        },
        select: function(info) {
            let titulo = prompt("Ingrese el nombre del evento:");
            if (titulo) {
                fetch("eventos.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: `titulo=${titulo}&fecha=${info.startStr}`
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    agregarEventoLista(titulo, info.startStr);
                    calendar.refetchEvents();
                });
            }
        },
        events: "eventos.php"
    });
    calendar.render();

    function agregarEventoLista(titulo, fecha) {
        let eventoItem = document.createElement("div");
        eventoItem.classList.add("evento-item");
        eventoItem.innerHTML = `<strong>${titulo}</strong><br>${fecha}`;
        eventosLista.appendChild(eventoItem);
    }

    fetch("eventos.php")
        .then(response => response.json())
        .then(eventos => {
            eventos.forEach(evento => {
                agregarEventoLista(evento.title, evento.start);
            });
        });
});
</script>
</body>
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

</body>
</html>