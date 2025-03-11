<?php
session_start();

require("../../controller/DocumentosController.php");

$documentos = new DocumentosController();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Prestar Biblioteca</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>

<body>
    <div id='cabecera'>
        <h1>Prestamos biblioteca Scarlatti</h1>
        <br>
        <button><a href='../usuarios/usuarioLogueado.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <form action="./crearPrestamo.php" method="post">
            <table>
                <?php
                    $documentos->listarDocumentos();
                ?>
            </table>
            <br><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
    </div>
</body>

</html>