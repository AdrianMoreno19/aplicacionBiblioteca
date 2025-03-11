<?php
session_start();

if (!isset($_SESSION['inicioSesion'])) {
    require_once("../view/loginUsuario.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Biblioteca Scarlatti</title>
    <link rel='stylesheet' href='../../css/estilo.css'>
</head>

<body>
    <div id='cabecera'>
        <h1>Biblioteca Scarlatti</h1>
        <br>
        <button><a href='../index.php?cerrar_sesion=1'>Cerrar sesion</a></button>
    </div>
    <div id='cuerpo'>
        <?php
            /*if (isset($_SESSION['esAdmin'])) {
                echo $_SESSION['esAdmin'];
            }*/
        ?>
        <button><a href="../documentos/elegirTipo.php">Mostrar Documentos</a></button>
        <br>
        <button><a href="../prestamos/prestar.php">Prestar ejemplar</a></button>
        <br>
        <button><a href="../prestamos/listarPrestados.php">Listar Prestados</a></button>
        <br>
        <button><a href="../prestamos/listarNoFecha.php">Listar Prestados no fecha</a></button>
    </div>
</body>

</html>