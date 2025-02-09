<?php
session_start();

// Recuperar preguntas de la sesión
$preguntas = isset($_SESSION['preguntas']) ? $_SESSION['preguntas'] : [];
$aciertos = 0;

// Evaluar respuestas del usuario
foreach ($preguntas as $index => $pregunta) {
    $respuesta_correcta = $pregunta['respuesta_correcta'];
    $respuesta_usuario = isset($_POST["respuesta_$index"]) ? $_POST["respuesta_$index"] : '';

    if ($respuesta_usuario === $respuesta_correcta) {
        $aciertos++;
    }
}

// Limpiar preguntas de la sesión
unset($_SESSION['preguntas']);

// Conectar a la base de datos
require('Conexionproyecto.php');
$aciertos_int = $_POST['resultado1'];
$id = $_SESSION['usuario'];
$query = "update ataraxia SET `resultado1` = '$aciertos' WHERE usuario = '$usuario'";
 $resultado=$mysqli->query($query);	
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Trivia</title>
    <link rel="icon" href="logo.png" type="image/png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background: url('Imagenes/Logotext.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .resultado-container {
            background-color: rgba(255, 255, 255, 0.9);
            margin: auto;
            padding: 20px;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        .resultado {
            font-size: 2em;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2em;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="resultado-container">
        <h1>Resultado</h1>
        <p class="resultado">Gracias por responder</p>
        <a href="index.php">regresar</a>
    </div>
</body>
</html>
