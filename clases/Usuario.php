<?php
namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";

class Usuario{
    private $id;
    private $nombre;
    private $correo;
    private $contraseña;
    private $tipo;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCorreo($correo)
    {
        return $this->correo = $correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
        return $this;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }


    public function setContraseña($contraseña)
    {
        $this->contraseña= $contraseña;
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

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /*public function mostrarPorCorreo(){
        return $this ->correo;
    }*/

    
public function actualizar(){
    try{
        $objConexion = new ConexionDB();
        $conexion = $objConexion->abrir();
        $query = "UPDATE usuario SET nombre='$this->nombre',correo='$this->correo',
        contraseña='$this->contraseña',tipo='$this->tipo'
        WHERE id=$this->id";
        $resultado = $conexion->exec($query);
        $objConexion->cerrar();
    }catch (\PDOException $e){
        echo "Error: ".$e->getMessage();
        exit();
    }
    return $resultado;
}

}
