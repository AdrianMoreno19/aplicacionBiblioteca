<?php
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../model/MultimediaModel.php");

class MultimediaController extends Controller {

    protected $multimediaModel;
    protected $tipoBusqueda;
    protected $valor;

    public function __construct($tipoBusquedaParam, $valorParam) {
        parent::__construct();
        $this->multimediaModel = new MultimediaModel();
        $this->tipoBusqueda = $tipoBusquedaParam;
        $this->valor = $valorParam;
    }

    public function listarMultimedia() {
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
    }
}