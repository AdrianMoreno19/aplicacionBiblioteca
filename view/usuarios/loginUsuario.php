<?php
session_start();
require("../../controller/UsuariosController.php");

// Verificar si se envió el formulario
if (isset($_POST['boton'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $usuario = new UsuariosController();
    $usuario->iniciarSesion($email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login usuario</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>
<body>
    <div id='cabecera'>
        <h1>Login</h1>
        <button><a href='../index.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <form action="?" method="post">
            Email:<input type="email" name="email">
            <br>
            Password:<input type="password" name="pass">
            <br>
            <input type="submit" name="boton" value="Iniciar sesion">
        </form>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == '1') {
            echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
        }
        ?>
    </div>
</body>
</html>