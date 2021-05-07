<?php
namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";

class Usuario{
    private $id;
    private $nombres;
    private $correo;
    private $password;
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

    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password= $password;
        return $this;
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

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function mostrarPorCorreo(){
        return $this ->correo;
    }
}
