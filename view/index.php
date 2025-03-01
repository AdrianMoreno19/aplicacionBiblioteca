<?php
session_start();

if (isset($_GET['cerrar_sesion']) && $_GET['cerrar_sesion'] == 1) {
    $_SESSION = array();
    session_unset();
    session_destroy();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 3600, '/');
    }
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Biblioteca Scarlatti</title>
    <link rel='stylesheet' href='../css/estilo.css'>
</head>

<body>
    <div id='cabecera'>
        <h1>Biblioteca Scarlatti</h1>
        <button><a href='./usuarios/loginUsuario.php'>Iniciar Sesion</a></button>
    </div>
    <div id='cuerpo'>

    </div>
</body>

</html>