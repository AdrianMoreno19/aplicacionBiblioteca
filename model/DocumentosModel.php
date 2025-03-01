<?php
require_once(__DIR__ . "/Query.php");

class DocumentosModel extends Query {

    public function __construct() {
        parent::__construct();
    }

    public function getDocumentos() {
        $stmt = $this->con -> prepare("select * from Documento");
        return $stmt;
    }

    public function getDocumentosGlobal($tipoBusquedaParam, $valorParam) {}
    public function insertaDocumentos($tituloParam, $autoresParam, $editorialParam, $materiaParam) {}
    public function actualizaEstado($idParam, $nuevoEstadoParam) {}
    public function buscarLibro($valorParam) {}
}
?>