<?php
session_start();

if (!isset($_SESSION['inicioSesion'])) {
    require_once("../view/loginUsuario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Multimedia</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>
<body>
    <div id='cabecera'>
        <h1>Formulario Multimedia</h1>
        <br>
        <button><a href='../usuarios/usuarioLogueado.php'>Volver</a></button>
    </div>
    <div id='cuerpo'>
        <form action="./formularioMultimedia.php" method="post">
            Tipo Busqueda: <select name="tipoBusqueda">
                <option value="titulo">Titulo</option>
                <option value="autor">Autor</option>
                <option value="isbn">Soporte</option>
            </select>
            <br><br>
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