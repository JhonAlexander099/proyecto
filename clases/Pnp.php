<?php
namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";
class Pnp
{
    private $id;
    private $nombres;
    private $apellido;
    private $cip;
    private $correo;
    private $celular;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
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

    public function getCip()
    {
        return $this->cip;
    }

    public function setCip($cip)
    {
        $this->cip = $cip;
        return $this;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
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

    

public function guardar(){
    try{
        $objConexion = new ConexionDB();
        $conexion = $objConexion->abrir();
        $query = "INSERT INTO pnp(nombre,apellido,cip,correo,celular)
        VALUES ('$this->nombre','$this->apellido','$this->cip','$this->correo','$this->celular')";
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
        $query = "UPDATE pnp SET nombre='$this->nombre',apellido='$this->apellido',
        cip='$this->cip',correo='$this->correo',celular='$this->celular'
        WHERE id=$this->id";
        $resultado = $conexion->exec($query);
        $objConexion->cerrar();
    }catch (\PDOException $e){
        echo "Error: ".$e->getMessage();
        exit();
    }
    return $resultado;
}
public function eliminar(){
    try {
        $objConexion = new ConexionDB();
        $conexion = $objConexion->abrir();
        $query = "DELETE FROM pnp WHERE id =(int)$this->id";
        $resultado = $conexion->exec($query);
        $objConexion->cerrar();
    }catch (\PDOException $e){
        echo "Error: ".$e->getMessage();
        exit();
    }
    return $resultado;
}
}