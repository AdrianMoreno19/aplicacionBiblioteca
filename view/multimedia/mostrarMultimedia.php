<?php
session_start();

require("../../controller/MultimediaController.php");

// Verificar si se envió el formulario
if (isset($_POST['boton'])) {
    $valor = $_POST['valor'];
    $tipoBusqueda = $_POST['tipoBusqueda'];

    if (empty($valor) || empty($tipoBusqueda)) {
        header("Location: formularioMultimedia.php?error=1");
        exit();
    }

    $multimedia = new MultimediaController($tipoBusqueda, $valor);
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Multimedia Biblioteca</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>

<body>
    <div id='cabecera'>
        <h1>Multimedia Biblioteca Scarlatti</h1>
        <br>
        <button><a href='../multimedia/elegirTipo.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <table>
            <?php
                $multimedia->listarMultimedia();
            ?>
        </table>
    </div>
</body>

</html>