<?php
require_once(__DIR__ . "/Query.php");

class PrestamosModel extends Query {

    public function __construct() {
        parent::__construct();
    }

    public function insertaPrestamos($usuarioParam, $docParam) {
        // Recogemos el id del ejemplar
        $ejemplarID = $this->con->prepare("SELECT IdEjemplar FROM Ejemplar WHERE idDocumento = ? and Prestado != 1");
        $ejemplarID->bindParam(1, $docParam, PDO::PARAM_INT);
        $ejemplarID->execute();
        // EL ID RECOGIDO ES EL SIGUIENTE
        $idEjemplar = $ejemplarID->fetchColumn();
        if (!$idEjemplar) {
            die("Error: No se encontró un ejemplar disponible para el documento.");
        }
        //Recogemos el id del usuario
        $usuarioID = $this->con -> prepare("select idUsuario from Usuarios where Email = ?");
        $usuarioID->bindParam(1, $usuarioParam, PDO::PARAM_STR);
        $usuarioID->execute();
        //EL ID DEL USUARIO ES EL SIGUIENTE
        $idUsuario = $usuarioID->fetchColumn();
        //Recoger el recuento de prestamos asociados al id del usuario en concreto
        $recuentoUsu = $this->con -> prepare("select count(idUsuario) from Prestar where idUsuario = ?");
        $recuentoUsu->bindParam(1, $idUsuario, PDO::PARAM_INT);
        $recuentoUsu->execute();
        //AQUI TENEMOS EL RECUENTO DE PRESTAMOS DEL USUARIO
        $numeroRecuento = $recuentoUsu->fetchColumn();
        //Insertamos en la tabla prestamos
        if ($numeroRecuento < 6) {
            //Comprobar que el ejemplar no esta prestado
            $ejemplarDisponible = $this->con->prepare("SELECT COUNT(*)
            FROM Prestar
            INNER JOIN Usuarios ON Usuarios.idUsuario = Prestar.idUsuario
            INNER JOIN Ejemplar ON Ejemplar.IdEjemplar = Prestar.IdEjemplar
            WHERE Ejemplar.idDocumento = (SELECT idDocumento FROM Ejemplar WHERE IdEjemplar = ?)
            AND Usuarios.idUsuario = ?
            AND (Prestar.FechaD >= CURDATE() OR Prestar.FechaD IS NULL)");
            $ejemplarDisponible->bindParam(1, $idEjemplar, PDO::PARAM_INT);
            $ejemplarDisponible->bindParam(2, $idUsuario, PDO::PARAM_INT);
            $ejemplarDisponible->execute();
            $prestado = $ejemplarDisponible->fetchColumn();
            if ($prestado > 0) {
                die("Error: El ejemplar ya está prestado.");
            }
            //Insertar en prestar
            $smt = $this->con->prepare("INSERT INTO Prestar (idUsuario, IdEjemplar, FechaP, FechaD, Observacion)
                        VALUES (?, ?, CURDATE(), DATE_ADD(CURDATE(), INTERVAL 3 WEEK), 'Préstamo entregado')");
            $smt->bindParam(1, $idUsuario, PDO::PARAM_INT);
            $smt->bindParam(2, $idEjemplar, PDO::PARAM_INT);
            if ($smt->execute()) {
                //Actualizar prestado de ejemplar
                $prestadoOn = $this->con->prepare("UPDATE Ejemplar SET Prestado = 1 WHERE IdEjemplar = ?");
                $prestadoOn->bindParam(1, $idEjemplar, PDO::PARAM_INT);
                $prestadoOn->execute();
                //Eliminar un ejemplar
                $eliminarEjemplar = $this->con->prepare("UPDATE Documento SET NumEjemplares = NumEjemplares - 1 WHERE idDocumento = ?");
                $eliminarEjemplar->bindParam(1, $docParam, PDO::PARAM_INT);
                $eliminarEjemplar->execute();
                header("Location: crearPrestamo.php?status=success");
                exit();
            } else {
                header("Location: crearPrestamo.php?status=error");
                exit();
            }
        } else {
            header("Location: crearPrestamo.php?recuentoMal=recuentoMenor");
            exit();
        }
    }

    public function listar($usuarioParam) {
        //Recogemos el id del usuario
        $usuarioID = $this->con -> prepare("select idUsuario from Usuarios where Email = ?");
        $usuarioID->bindParam(1, $usuarioParam, PDO::PARAM_STR);
        $usuarioID->execute();
        //EL ID DEL USUARIO ES EL SIGUIENTE
        $idUsuario = $usuarioID->fetchColumn();
        $stmt = $this->con->prepare("SELECT * FROM Prestar WHERE idUsuario = ?");
        $stmt->bindParam(1, $idUsuario, PDO::PARAM_STR);
        return $stmt;
    }

    public function listarNoFecha($usuarioParam) {
        //Recogemos el id del usuario
        $usuarioID = $this->con -> prepare("select idUsuario from Usuarios where Email = ?");
        $usuarioID->bindParam(1, $usuarioParam, PDO::PARAM_STR);
        $usuarioID->execute();
        //EL ID DEL USUARIO ES EL SIGUIENTE
        $idUsuario = $usuarioID->fetchColumn();
        $stmt = $this->con->prepare("SELECT * FROM Prestar WHERE idUsuario = ? and Current_Date > FechaD");
        $stmt->bindParam(1, $idUsuario, PDO::PARAM_STR);
        return $stmt;
    }
}
?>