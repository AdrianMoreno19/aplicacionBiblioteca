<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/UsuariosModel.php");
session_start();

class UsuariosController extends Controller {

    public $usuariosModel;

    public function __construct() {
        parent::__construct();
        $this->usuariosModel = new UsuariosModel();
    }

    public function iniciarSesion($emailParam, $passParam) {
        if ($this->usuariosModel->getUsuario($emailParam, $passParam) === true) {
            $_SESSION['inicioSesion'] = $emailParam;
            if ($this->usuariosModel->esAdmin($emailParam) === true) {
                $_SESSION['esAdmin'] = $emailParam;
            }
            require_once("usuarioLogueado.php");
            exit();
        } else {
            header("Location: loginUsuario.php?error=1");
            exit();
        }
    }

    public function index() {}
    public function listar() {}
    public function registrar() {}
    public function modificar($id) {}
    public function eliminar($id) {}
    public function cambiarClave() {}
    public function salir() {}
}