<?php

namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";
class Individuo
{   
    private $id;
    private $nombre;
    private $apellido;
    private $direccion;
    private $celular;
    private $ocupacion;
    private $nacimiento;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;
        return $this;
    }

    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;
        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        return $this;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function mostrar(int $id=0){
        try {
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            if($id==0){
                $query = "SELECT * FROM individuos";
            }else{
                $query = "SELECT * FROM individuos WHERE id=$id";
        }

        $resultado = $conexion->query($query);
            $objConexion->cerrar();
        }catch (\PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
    }
    return $resultado;
}

    public function guardar(){
        try{
            $objConexion = new ConexionDB();
            $conexion = $objConexion->abrir();
            $query = "INSERT INTO individuos(nombre,apellido,direccion,celular,ocupacion,nacimiento) 
            VALUES ('$this->nombre','$this->apellido','$this->direccion','$this->celular','$this->ocupacion','$this->nacimiento')";
            $resultado = $conexion->exec($query);
            $objConexion->cerrar();
        }catch (PDOException $e){
            echo "Error: ".$e->getMessage();
            exit();
    }
    return $resultado;
}

public function actualizar(){
    try{
        $objConexion = new ConexionDB();
        $conexion = $objConexion->abrir();
        $query = "UPDATE indiviuos SET nombre='$this->nombre',apellido='$this->apellido',
        direccion='$this->direccion',celular='$this->celular',ocupacion='$this->ocupacion',
        nacimiento='$this->nacimiento'
        WHERE id=$this->id";
        $resultado = $conexion->exec($query);
        $objConexion->cerrar();
    }catch (\PDOException $e){
        echo "Error: ".$e->getMessage();
        exit();
    }
    return $resultado;
}
/*
public function eliminar(){
    try {
        $objConexion = new ConexionDB();
        $conexion = $objConexion->abrir();
        $query = "DELETE FROM individuos WHERE id =(int)$this->id";
        $resultado = $conexion->exec($query);
        $objConexion->cerrar();
    }catch (\PDOException $e){
        echo "Error: ".$e->getMessage();
        exit();
    }
    return $resultado;
}
*/
}

