<?php
    class Query {

        protected $con;

        public function __construct() {
            try {
                $conexion = new PDO ('mysql:host=127.0.0.1; dbname=Biblioteca', "root", "root");
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->con = $conexion;

                if (mysqli_connect_error()) {
                    echo "No se ha podido conectar a la base de datos";
                    die();
                }
            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
            }
        }
    }
?>