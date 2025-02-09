<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("Conexionproyecto.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $sexo = $_POST["sexo"];
    $email = $_POST["email"];
    $edad = $_POST["edad"];
    $clave = md5($_POST["clave"]);


    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        $directorio_destino = 'uploads/';
        $archivo = $_FILES['foto_perfil'];
        $nombre_archivo = basename($archivo['name']);
        $ruta_destino = $directorio_destino . $nombre_archivo;

   
        $info_imagen = getimagesize($archivo['tmp_name']);
        if ($info_imagen !== false) {
            $tipo_imagen = $info_imagen[2];
            if (in_array($tipo_imagen, [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF])) {
                if (move_uploaded_file($archivo['tmp_name'], $ruta_destino)) {
                    $sql = "INSERT INTO ataraxia (nombre, usuario, sexo, email, clave, edad, foto_perfil)
                            VALUES ('$nombre', '$usuario', '$sexo', '$email', '$clave', '$edad', '$ruta_destino')";
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION['usuario'] = $usuario;
                        header("Location: index.php");
                        exit();
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error al subir la foto de perfil.";
                }
            } else {
                echo 'Por favor, sube una imagen válida (JPG, PNG o GIF).';
            }
        } else {
            echo 'No se pudo obtener información de la imagen.';
        }
    } else {
        echo 'No se ha seleccionado ninguna imagen o ha ocurrido un error.';
    }
    
}
?>