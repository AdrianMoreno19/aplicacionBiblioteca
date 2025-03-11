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

    public function listar($tipoBusquedaParam, $valorParam) {
        $stmt = $this->documentosModel->getDocumentos($tipoBusquedaParam, $valorParam);
        $stmt -> execute();
        if ($tipoBusquedaParam == "titulo") {
            echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        } else if ($tipoBusquedaParam == "autor") {
            echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        } else {
            echo "<tr><th>IdDocumento</th><th>ISBN</th><th>NumPaginas</th></tr>";
        }
        while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            foreach ($fila as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }

    public function listarDocumentos(){
        $stmt = $this->documentosModel->getDocumentosGlobal();
        $stmt -> execute();
        echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th><th>Radio</th></tr>";
        while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            foreach ($fila as $value) {
                echo "<td>$value</td>";
            }
            echo "<td><input type='radio' name='idDocumento' value='{$fila[0]}' required></td>";
            echo "</tr>";
        }
    }
}