<?php
session_start();

require("../../controller/DocumentosController.php");

// Verificar si se envió el formulario
if (isset($_POST['boton'])) {
    $valor = $_POST['valor'];
    $tipoBusqueda = $_POST['tipoBusqueda'];

    if (empty($valor) || empty($tipoBusqueda)) {
        header("Location: formularioDocumentos.php?error=1");
        exit();
    }

    $documentos = new DocumentosController();
}
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
                $documentos->listar($tipoBusqueda, $valor);
            ?>
        </table>
    </div>
</body>

</html>