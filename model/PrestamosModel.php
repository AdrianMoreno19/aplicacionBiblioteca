<?php
class PrestamosModel {
    public function __construct() {
    }

    public function insertaPrestamos($usuarioParam, $docParam, $fechaPParam, $fechaDParam) {}
    public function actualizaEstado($idParam, $estadoParam) {}
    public function listaPrestamosSinDevolver($usuarioClave) {}
    public function getPrestamoDocumento($idPrestamoParam) {}
}
?>