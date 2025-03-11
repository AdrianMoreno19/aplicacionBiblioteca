<?php
session_start();

require("../../controller/PrestamosController.php");

$prestamos = new PrestamosController();

/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
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
        <?php
            $idDocumento = $_POST['idDocumento'];
            $usuario = $_SESSION['inicioSesion'];
            if (isset($_GET['recuentoMal']) && $_GET['recuentoMal'] == "recuentoMenor") {
                echo "<small style='color: red'>No puedes tener más de 6 préstamos.</small>";
                die();
            } elseif (isset($_GET['status'])) {
                if ($_GET['status'] == "success") {
                    echo "<small style='color: green'>El préstamo se ha realizado con éxito.</small>";
                    die();
                } elseif ($_GET['status'] == "error") {
                    echo "<small style='color: red'>Error al realizar el préstamo.</small>";
                    die();
                }
            }
            $prestamos->prestar($usuario, $idDocumento);
        ?>
    </div>
</body>

</html>