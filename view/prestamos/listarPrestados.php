<?php
session_start();

require("../../controller/PrestamosController.php");

$prestamos = new PrestamosController();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Listar prestados</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>

<body>
    <div id='cabecera'>
        <h1>Listar prestados Scarlatti</h1>
        <br>
        <button><a href='../usuarios/usuarioLogueado.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <table>
            <?php
                $usuario = $_SESSION['inicioSesion'];
                $prestamos->listar($usuario);
            ?>
        </table>
    </div>
</body>

</html>