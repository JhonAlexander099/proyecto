<?php
namespace clases;

use config\ConexionBD;

require_once "config/autoload.php";

class DetalleCuarentena
{
    private $idControl;
    private $idFecha;
    private $dias;

    public function __construct($idControl, $idFecha, $dias)
    {
        $this->idControl = $idControl;
        $this->idFecha = $idFecha;
        $this->dias = $dias;
    }

    public function guardar(){
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO detallecontrol(idcontrol, dias, idVenta) VALUES($this->idControl, $this->dias, $this->idFecha)";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function mostrar($idFecha){
        {
            try {
                $conexion = new ConexionBD();
                $cnx = $conexion->getConexion();
                $sql = "SELECT p.fechainicio, p.fechafinal, dv.descripcion 
                        FROM cuarentena as dv
                        JOIN control as p
                        ON dv.id = p.id
                        WHERE dv.id = $id";
                $resultado = $cnx->query($sql);
                $conexion->cerrar();
                return $resultado;
            }catch (\PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}