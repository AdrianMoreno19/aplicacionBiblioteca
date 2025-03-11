<?php
session_start();

if (!isset($_SESSION['inicioSesion'])) {
    require_once("../view/loginUsuario.php");
    exit();
}

$tipoBusqueda = $_POST['tipoBusqueda'];

if (empty($tipoBusqueda)) {
    header("Location: elegirTipo.php?error=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Documentos</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>
<body>
    <div id='cabecera'>
        <h1>Formulario Documentos</h1>
        <br>
        <button><a href='./elegirTipo.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <form action="./mostrarDocumentos.php" method="post">
            <?php
            if ($tipoBusqueda == "titulo") {
                echo "Titulo:<input type='text' name='valor'>";
                echo "<input type='hidden' name='tipoBusqueda' value='$tipoBusqueda'>";
            } elseif ($tipoBusqueda == "autor") {
                echo "Autor:<input type='text' name='valor'>";
                echo "<input type='hidden' name='tipoBusqueda' value='$tipoBusqueda'>";
            } else {
                echo "ISBN:<input type='number' name='valor'>";
                echo "<input type='hidden' name='tipoBusqueda' value='$tipoBusqueda'>";
            }
            ?>
            <br>
            <input type="submit" name="boton" value="Mostrar">
            <br>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == '1') {
                echo "<p style='color:red;'>Campos Vacios.</p>";
            }
            ?>
        </form>
    </div>
</body>
</html>