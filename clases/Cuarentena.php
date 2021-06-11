<?php

namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";
class Cuarentena
{
    private $fecha_inicio;
    private $fecha_final;
    private $descripcion;
    private $control_id;


    public function getFecha_inicio()
    {
        return $this->fecha_inicio;
    }

    public function setFecha_inicio($fecha_inicio)
    {
        return $this->fecha_inicio = $fecha_inicio;
        
    }

    public function getFecha_final()
    {
        return $this->fecha_final;
    }

    public function setFecha_final($fecha_Final)
    {
        return $this->fecha_final = $fecha_Final;
        
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        return $this->descripcion = $descripcion;
    }

    public function getControl_id()
    {
        return $this->control_id;
    }

    public function setControl_id($control_id)
    {
        return $this->control_id = $control_id;
    }

    public function crear()
    {
        try{
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "INSERT INTO cuarentena(fecha_inicio,fecha_final,descripcion,control_id)
                    VALUES('$this->fecha_inicio','$this->fecha_final','$this->descripcion','$this->control_id')";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
            }catch(\PDOException $e){
            echo $e->getMessage();
            }
    }

}