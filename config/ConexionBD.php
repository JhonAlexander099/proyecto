<?php
namespace config;

class ConexionBD
{
    private $dsn = "mysql:host=localhost;dbname=proyecto";
    private $usuario = "root";
    private $clave = "";
    public $conexion;

    public function abrirConexion(){
        $this->conn = new \PDO($this->dsn, $this->usuario, $this->clave);
        return $this->conexion;
    }

    public function cerrarConexion(){
        $this->conn = null;
    }
}