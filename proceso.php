<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("conexionproyecto.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario']; 
    $clave = md5($_POST['clave']); 

    $sql = "SELECT nombre, usuario, sexo, email, edad, foto_perfil FROM ataraxia WHERE usuario = ? AND clave = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("ss", $usuario, $clave); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['sexo'] = $usuario['sexo'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['edad'] = $usuario['edad'];
        $_SESSION['foto_perfil'] = $usuario['foto_perfil'];

    
        header("Location: index.php");
        exit();
    } else {

        echo "Usuario o contraseña incorrectos";
    }

    $stmt->close();
    $conn->close();
}
?>