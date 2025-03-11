<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/MultimediaModel.php");

class MultimediaController extends Controller {

    protected $multimediaModel;

    public function __construct() {
        parent::__construct();
        $this->multimediaModel = new MultimediaModel();
    }

    /*public function listarMultimedia() {
        $stmt = $this->multimediaModel->getDocumentosGlobal($this->tipoBusqueda, $this->valor);
        $stmt -> execute();
        if ($this->tipoBusqueda == "titulo") {
            echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        } else if ($this->tipoBusqueda == "autor") {
            echo "<tr><th>IdDocumento</th><th>Titulo</th><th>Autor</th><th>FechaPublicacion</th><th>Editorial</th><th>NumEjemplares</th><th>Descripcion</th><th>Materia</th></tr>";
        } else {
            echo "<tr><th>IdDocumento</th><th>Soporte</th></tr>";
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