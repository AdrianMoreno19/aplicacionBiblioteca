<?php
session_start();

if (!isset($_SESSION['inicioSesion'])) {
    require_once("../view/loginUsuario.php");
    exit();
}

require("../../controller/DocumentosController.php");

$documentos = new DocumentosController();
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Documentos Biblioteca</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>

<body>
    <div id='cabecera'>
        <h1>Documentos Biblioteca Scarlatti</h1>
        <br>
        <button><a href='../usuarios/usuarioLogueado.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <table>
            <?php
                $documentos->listar();
            ?>
        </table>
    </div>
</body>

</html>