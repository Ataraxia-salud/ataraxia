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
// Definir las preguntas y respuestas en un array
$preguntas = [
    [
        'pregunta' => '¿Dificultad para relajarse?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿estar inquieta que es dificil permanecer sentada tranquilamente?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿molestarse o ponerse irritable facilmente?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿sentir miedo como si algo terrible fuera a pasar?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿poco interes o placer para hacer cosas?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿sentirse decaido, deprimido o devastado?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿dificultad de sueño controlado?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿sentirse cansado o cansada siempre?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿poco gusto del apetito?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ],
    [
        'pregunta' => '¿sentirse como un fracasado con la familia, amigos o conocidos?',
        'respuesta_correcta' => 'nunca', 'varios dias', 'mas de la mitad de tiempo'
        'respuestas' => ['nunca', 'varios dias', 'mas de la mitad de tiempo']
    ]
];

$_SESSION['preguntas'] = $preguntas;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia de Ciencia</title>
    <link rel="icon" href="logo.png" type="image/png">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    text-align: center;
    background-color: green;
    background-size: cover;
    height: 100vh;
}

.container {
    max-width: 800px;
    margin: auto;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin-top: 20px;
}

h1 {
    color: #007BFF;
    margin-bottom: 20px;
}

.pregunta {
    margin: 20px 0;
    padding: 15px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: left;
    perspective: 1000px;
    transition: transform 0.6s;
}

.pregunta.volteada {
    transform: rotateY(180deg);
}

.pregunta .contenido {
    backface-visibility: hidden;
}

label {
    display: block;
    margin-bottom: 5px;
    font-size: 1rem;
}

button {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.cronometro {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: red;
}
</style>
</head>
<body>
    <div class="container">
        <h1>encuesta 1</h1>
        <div class="cronometro">Encuesta numero 1 </div>
        <form action="Datos_encuesta1.php" method="POST">
            <?php foreach ($preguntas as $index => $pregunta): ?>
                <div class="pregunta" id="pregunta_<?= $index ?>">
                    <div class="contenido">
                        <p><strong><?= ($index + 1) . ". " . $pregunta['pregunta']; ?></strong></p>
                        <?php foreach ($pregunta['respuestas'] as $respuesta): ?>
                            <label>
                                <input 
                                    type="radio" 
                                    name="respuesta_<?= $index; ?>" 
                                    value="<?= $respuesta; ?>" 
                                    required 
                                    onchange="voltearPregunta(<?= $index ?>)">
                                <?= $respuesta; ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit">Enviar respuestas</button>
        </form>
    </div>
    <script>
        function voltearPregunta(index) {
            const pregunta = document.getElementById('pregunta_' + index);
            if (!pregunta.classList.contains('volteada')) {
                pregunta.classList.add('volteada');
            }
        }
    </script>
</body>
</html>