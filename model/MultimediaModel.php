<?php
require_once(__DIR__ . "/DocumentosModel.php");

class MultimediaModel extends DocumentosModel {

    public function __construct() {
        parent::__construct();
    }

    // Sobrescribimos el método getDocumentos
    /*public function getDocumentosGlobal($tipoBusquedaParam, $valorParam) {
        if ($tipoBusquedaParam === "titulo") {
            $stmt = $this->con->prepare("SELECT * FROM Documento WHERE Titulo = ?");
            $stmt->bindParam(1, $valorParam, PDO::PARAM_STR);
        } elseif ($tipoBusquedaParam === "autor") {
            $stmt = $this->con->prepare("SELECT * FROM Documento WHERE ListaAutores = ?");
            $stmt->bindParam(1, $valorParam, PDO::PARAM_STR);
        } else {
            $stmt = $this->con->prepare("SELECT * FROM Multimedia WHERE Soporte = ?");
            $stmt->bindParam(1, $valorParam, PDO::PARAM_STR);
        }
        return $stmt;
    }*/
}