<?php

namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";
class Registro
{
    private $id;
    private $codigo;
    private $numDocPrueba;
    private $tipoPrueba;
    private $medioTransporte;
    private $resultado;
    private $estadia;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }
    public function getNumDocPrueba()
    {
        return $this->codigo;
    }

    public function setNumDocPrueba($numDocPrueba)
    {
        $this->numDocPrueba = $numDocPrueba;
        return $this;
    }
    public function getTipoPrueba()
    {
        return $this->tipoPrueba;
    }

    public function setTipoPrueba($tipoPrueba)
    {
        $this->tipoPrueba = $tipoPrueba;
        return $this;
    }
    public function getMedioTransporte()
    {
        return $this->medioTransporte;
    }

    public function setMedioTransporte($medioTransporte)
    {
        $this->medioTransporte = $medioTransporte;
        return $this;
    }
    public function getResultado()
    {
        return $this->Resultado;
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
        return $this;
    }
    public function getEstadia()
    {
        return $this->estadia;
    }

    public function setEstadia($estadia)
    {
        $this->estadia = $estadia;
        return $this;
    }

    public function guardar(){
        try{
            $conexion = new ConexionDB();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO control(codigo,numDocPrueba,tipoPrueba,tipoPrueba,
            medioTransporte,resultado,estadia)
            VALUES ('$this->codigo','$this->numDocPrueba','$this->tipoPrueba',
            '$this->medioTransporte','$this->resultado','$this->estadia')";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        }catch (\PDOException $e){
            echo $e->getMessage();
    }
   
    }/*
    public function actualizar(){
        try{
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "UPDATE control SET codigo='$this->codigo',numDocPrueba='$this->numDocPrueba',
            tipoPrueba='$this->tipoPrueba',tipoPrueba='$this->tipoPrueba',medioTransporte='$this->medioTransporte',
            resultado='$this->resultado',estadia='$this->estadia'
            WHERE id=$this->id";
            $resultado = $conexion->exec($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
        }
        return $resultado;
    }*/
}






