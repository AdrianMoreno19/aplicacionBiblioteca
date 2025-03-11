<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/RevistasModel.php");

class RevistasController extends Controller {

    protected $revistasModel;

    public function __construct() {
        parent::__construct();
        $this->revistasModel = new RevistasModel();
    }

    /*public function listarRevistas() {
        $stmt = $this->revistasModel->getDocumentosGlobal($this->tipoBusqueda, $this->valor);
        $stmt -> execute();
        if ($this->tipoBusqueda == "titulo") {
            echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        } else if ($this->tipoBusqueda == "autor") {
            echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        } else {
            echo "<tr><th>IdDocumento</th><th>ISBN</th><th>Frecuencia</th></tr>";
        }
        while ($fila = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<tr>";
            foreach ($fila as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
    }*/
}