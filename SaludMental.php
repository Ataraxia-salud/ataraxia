<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php"); // Redirige al login si no hay sesión
    exit();
}
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
<html>
    <head>
        <title>Ataraxia: Salud Mental</title>
        <link rel="stylesheet" type="text/css" href="SaludMental.css">
        <link rel="stylesheet" type="text/css" href="Ft-Pagina.css">
        <script src="Index.js" defer></script>
        <script src="Buscador.js" defer></script>
    </head>
    <body>
      
        <header>
            <div class="container-header">
                <div class="logo-pri">
                    <img id="logo" src="Imagenes/Logo.png" alt="Logo"  width="45px"  height="45px" >
                    <img id="logotext"src="Imagenes/Logotext.png" alt="Logotext" width="170px"  height="25px" >
                </div>
                <div class="menu">
                    <nav>
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li class="menu-select"><a href="#" class="text-menu-select">Salud Mental</a></li>
                            <li><a href="#">Agenda</a></li>
                            <li><a href="#">Pendientes</a></li>
                            <li><a href="#">Plantillas</a></li>
                            <li><a href="#">Acerca de...</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="group">
                    <svg class="icon" aria-hidden="true" viewBox="0 0 24 24">
                        <g>
                            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z">
                            </path>
                        </g>
                    </svg>
                        <input placeholder="Buscar" type="search" class="input" id="search-input">
                </div>
                <div class="user-icon" id="userMenu">
                <img src="<?php echo $imagenPerfil; ?>" alt="Usuario" id="userImage">
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="#">Mi perfil</a>
                    <a href="login.php">Iniciar sesión</a>
                    <a href="Ataraxia_Altas_2.php">Registrarse</a>
                    <hr>
                    <a href="logout.php">Cerrar sesión</a>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="container-all">
            <div class="Encabezado">
                <h1>Salud mental</h1>
            </div>
            <div class="cuerpo">
                <input type="radio" id="TODO" name="categorias" value="TODO">
                <input type="radio" id="INFORMACION" name="categorias" value="INFORMACION">
                <input type="radio" id="DATOS" name="categorias" value="DATOS">
                <input type="radio" id="TIPS" name="categorias" value="TIPS">
                <input type="radio" id="CONSEJOS" name="categorias" value="CONSEJOS">
                <input type="radio" id="FRASES" name="categorias" value="FRASES">
                <div class="submenu">
                    <div class="container-category">
                        <ul>
                            <li><label for="TODO">Todo</label></li>
                            <li><label for="INFORMACION">Informacion</label></li>
                            <li><label for="DATOS">Datos</label></li>
                            <li><label for="TIPS">Tips</label></li>
                            <li><label for="CONSEJOS">Consejos</label></li>
                            <li><label for="FRASES">Frases</label></li>
                        </ul>
                    </div>
                </div>
                <div class="container-post">
                    <div class="posts" >
                        <div class="post" data-category="CONSEJOS">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/No-Te.jpg" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>No Te Olvides De Ti Mismo || Tratate Bonito</h2>
                                <span>Edici&oacute;n: 02 Octubre 2024 - 5:35 p.m.</span>
                                <ul class="ctn-tag">     
                                    <li>CONSEJOS</li>
                                </ul>
                                <a href="Articulos/NoTeOlvidesdTi.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post"  data-category="INFORMACION">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Ansiedad.jfif" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Ansiedad || Causas y Transtornos</h2>
                                <span>Edici&oacute;n: 13 Septiembre 2024 - 5:45 p.m.</span>
                                <ul class="ctn-tag">
                                    <li>INFORMACION</li>
                                </ul>
                                <a href="Articulos/Ansiedad.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post" data-category="TIPS">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Habitos.jfif" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Habitos || Mejora Como persona</h2>
                                <span>Edici&oacute;n: 7 Septiembre 2024 - 9:36 p.m.</span>
                                <ul class="ctn-tag">
                          
                                    <li>TIPS</li>
                                </ul>
                                <a href="Articulos/Habitos.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post" data-category="DATOS">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Transtornos.jpeg" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>3 Transtornos Mentales Mas Comunes</h2>
                                <span>Edici&oacute;n: 27 Noviembre 2024 - 7:25 p.m.</span>
                                <ul class="ctn-tag">
                                    <li>DATOS</li>
                                </ul>
                                <a href="Articulos/TranstornosMentales.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post"  data-category="INFORMACION">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Autoestima.jfif" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Autoestima || Componentes y Carcteristicas</h2>
                                <span>Edici&oacute;n: 17 Septiembre 2024 - 9:00 a.m.</span>
                                <ul class="ctn-tag">
                
                                    <li>INFORMACION</li>
                                </ul>
                                <a href="Articulos/Autoestima.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post" data-category="INFORMACION">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Amor.jpg" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Amor Propio || Supera Tus Miedos</h2>
                                <span>Edici&oacute;n: 11 Octubre 2024 - 7:15 a.m.</span>
                                <ul class="ctn-tag">
                                    <li>INFORMACION</li>
                                </ul>
                                <a href="Articulos/AmorPropio.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post" data-category="TIPS">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/No-Compararse.jfif" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>No Compararse Con Los Demas</h2>
                                <span>Edici&oacute;n: 22 Septiembre 2024 - 6:26 a.m.</span>
                                <ul class="ctn-tag">

                                    <li>TIPS</li>
                                </ul>
                                <a href="#"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post" data-category="CONSEJOS">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Limites.jpg" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Limites || Cuida tu estabilidad emocional.</h2>
                                <span>Edici&oacute;n: 21 Octubre 2024 - 2:23 p.m.</span>
                                <ul class="ctn-tag">
                                
                                <li>CONSEJOS</li>
                                </ul>
                                <a href="Articulos/Limites.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post"  data-category="INFORMACION">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Toxicidad.jpg" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Toxicidad || Como identificar la toxicidad </h2>
                                <span>Edici&oacute;n: 30 Septiembre 2024 - 6:05 p.m.</span>
                                <ul class="ctn-tag">

                                    <li>INFORMACION</li>
                                </ul>
                                <a href="Articulos/Toxicidad.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                        <div class="post" data-ciategory="FRASES">
                            <div class="ctn-img">
                                <img src="Imagenes/Portadas/Rafael.jpg" alt="Portada">
                            </div>
                            <div class="contexto">
                                <h2>Fortaleza || Rafael Santandreu</h2>
                                <span>Edici&oacute;n: 15 Noviembre 2024 - 9:06 p.m. </span>
                                <ul class="ctn-tag">

                                    <li>FRASES</li>
                                </ul>
                                <a href="Articulos/Fortaleza.php"><button>Leer mas...</button></a>
                            </div>
                        </div>
                    </div>
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
                            <li><a href="#">Terminos y Condiciones</a></li>
                            <li><a href="#">Developers</a></li>
                        </ul>
                    </div>
                    <div class="pie-principal-item">
                        <h2 class="pie-title">Recursos</h2>
                        <ul class="pie-text">
                            <li><a href="#">Imagenes</a></li>
                            <li><a href="#">Dise&ntilde;adores</a></li>
                            <li><a href="#">Recursos extras</a></li>
                        </ul>
                    </div>
                    <div class="pie-principal-item">
                        <h2 class="pie-title">Contacto</h2>
                        <ul class="pie-text">
                            <li><a href="#">Ayuda</a></li>
                            <li><a href="#">Avances</a></li>
                            <li><a href="#">Alvertencia</a></li>
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
        <?php
		?>
    </body>
</html>