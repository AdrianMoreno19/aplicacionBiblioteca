<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/PrestamosModel.php");
session_start();

class PrestamosController extends Controller {

    protected $prestamosModel;

    public function __construct() {
        parent::__construct();
        $this->prestamosModel = new PrestamosModel();
    }

    public function prestar($usuarioParam, $docParam) {
        $this->prestamosModel->insertaPrestamos($usuarioParam, $docParam);
    }

    public function listar($usuarioParam) {
        $stmt = $this->prestamosModel->listar($usuarioParam);
        $stmt -> execute();
        echo "<tr><th>idUsuario</th><th>idEjemplar</th><th>FechaP</th><th>FechaD</th><th>Observacion</th></tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            foreach ($fila as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }

    public function listarNoFecha($usuarioParam) {
        $stmt = $this->prestamosModel->listarNoFecha($usuarioParam);
        $stmt -> execute();
        echo "<tr><th>idUsuario</th><th>idEjemplar</th><th>FechaP</th><th>FechaD</th><th>Observacion</th></tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            foreach ($fila as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }
}
