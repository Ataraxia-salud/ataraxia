<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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
            font-family: 'Arial', sans-serif;
        }
        .container-formulario {
            width: 500px;
            background: #ffffff;
            padding: 40px;
            margin: auto;
            margin-top: 100px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            font-size: 30px;
            margin-bottom: 20px;
            color: #333;
        }
        .form-register label {
            font-size: 18px;
            margin-bottom: 8px;
            color: #555;
            display: block;
        }
        .form-register input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
            box-sizing: border-box;
        }
        .form-register input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-register input[type="submit"]:hover {
            background-color: #45a049;
        }
        .form-register .button-secondary {
            background-color: #3498db;
            margin-top: 10px;
        }
        .form-register .button-secondary:hover {
            background-color: #2980b9;
        }
        .form-register a {
            color: #3498db;
            font-size: 16px;
            text-decoration: none;
        }
        .form-register a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container-formulario">
        <h1>Iniciar Sesión</h1>
        <form action="proceso.php" method="POST" class="form-register">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required><br>
            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" required><br>
            <input type="submit" value="Iniciar Sesión">
            <input type="button" value="Registrarse" class="button-secondary" onclick="window.location.href='Ataraxia_Altas_2.php'">
        </form>
    </div>
</body>
</html>
