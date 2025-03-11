<?php
require_once(__DIR__ . "/DocumentosModel.php");

class LibrosModel extends DocumentosModel {

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
            $stmt = $this->con->prepare("SELECT * FROM Libro WHERE ISBN = ?");
            $stmt->bindParam(1, $valorParam, PDO::PARAM_INT);
        }
        return $stmt;
    }*/
}