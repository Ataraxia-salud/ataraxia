<?php

session_start();
include("Conexionproyecto.php");
if (isset($_POST['titulo']) && isset($_POST['fecha'])) {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $usuario = $_SESSION['usuario']; 

    $sql = "INSERT INTO eventos (usuario, titulo, fecha) VALUES ('$usuario', '$titulo', '$fecha')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Evento agregado correctamente";
    } else {
        echo "Error al agregar el evento: " . $conn->error;
    }
}
?>