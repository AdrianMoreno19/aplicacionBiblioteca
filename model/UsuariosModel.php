<?php
require_once(__DIR__ . "/Query.php");

class UsuariosModel extends Query{

    public function __construct() {
        parent::__construct();
    }

    public function getUsuario($emailParam, $passParam) {
        $stmt = $this->con -> prepare("select * from Usuarios where email = ?");
        $stmt -> bindParam(1, $emailParam, PDO::PARAM_STR);
        $stmt -> execute();
        $valores = $stmt -> fetch(PDO::FETCH_NUM);
        if ($valores[5] === $emailParam && $valores[6] === $passParam) {
            return true;
        } else {
            return false;
        }
    }

    public function esAdmin($emailParam) {
        $esAdmin = $this->con -> prepare("select * from Administradores where email = ?");
        $esAdmin -> bindParam(1, $emailParam, PDO::PARAM_STR);
        $esAdmin -> execute();
        $valores = $esAdmin -> fetch(PDO::FETCH_NUM);
        if ($valores[1] === $emailParam) {
            return true;
        } else {
            return false;
        }
    }
}
?>