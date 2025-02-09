<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Registro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(to top right, #e0b0ff, #a9def9, #f8b1d1);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        .container-formulario {
            width: 500px;
            background: #ffffff;
            padding: 30px;
            margin: auto;
            margin-top: 100px;
            border-radius: 20px;
            font-family: 'calibri';
            color: black;
            box-shadow: 10px 50px -20px #000;
        }
        h1 {
            text-align: center;
            font-size: 35px;
            margin-bottom: 20px;
        }
        .controls {
            width: 100%;
            border: none;
            background: #e8e8e8;
            padding: 10px;
        }
        .buttons {
            width: 50%;
            background: #bdc3c7;
            border: none;
            padding: 12px;
            color: #FFFFFF;
            margin: 16px 0;
            font-size: 16px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container-formulario">
<form name="formularioDatos" method="post" action="implementardatos.php" enctype="multipart/form-data">
        <label for="nombre">INGRESE SU NOMBRE:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="usuario">NOMBRE DE USUARIO:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label>Sexo:</label><br>
        <label><input type="radio" name="sexo" value="Mujer" required> MUJER</label><br>
        <label><input type="radio" name="sexo" value="Hombre" required> HOMBRE</label><br>
        <label><input type="radio" name="sexo" value="Prefiero no decirlo" required> PREFIERO NO DECIRLO</label><br><br>

        <label for="email">CORREO ELECTRONICO:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="edad">EDAD:</label>
        <input type="number" id="edad" name="edad" required><br><br>

        <label for="clave">CONTRASEÑA:</label>
        <input type="password" name="clave" required><br><br>

        <label for="foto_perfil">Selecciona una foto de perfil:</label>
        <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*" required><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <h2><a href="index.php">REGRESAR AL MENU</a></h2>

</body>
</html>