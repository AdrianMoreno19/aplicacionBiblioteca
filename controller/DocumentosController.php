<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/DocumentosModel.php");

class DocumentosController extends Controller {

    protected $documentosModel;

    public function __construct() {
        parent::__construct();
        $this->documentosModel = new DocumentosModel();
    }

    public function index() {}
    public function listar() {
        $stmt = $this->documentosModel->getDocumentos();
        $stmt -> execute();
        echo "<tr><th>idDocumento</th><th>Titulo</th><th>ListaAutores</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            foreach ($fila as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }
    public function registrar() {}
    public function modificar($id) {}
    public function eliminar($id) {}
}