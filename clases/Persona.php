<?php

namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";
class Persona
{   
    private $id;
    private $nombre;
    private $apellido;

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
    public function guardar()
    {
      try{
              $conexion = new ConexionDB();
              $cnx = $conexion->getConexion();
              $sql = "INSERT INTO persona(tipoDoc,documento,nombres,apellidos)
                      VALUES('$this->tipoDoc','$this->documento','$this->nombres','$this->apellidos')";
  
              $resultado = $cnx->exec($sql);
              $conexion->cerrar();
             return $resultado;
          }catch(\PDOException $e){
              echo $e->getMessage();
          }
    }
  /*
    public function personaID()
      {
          try{
              $conexionDB = new Conexion();
              $conn = $conexionDB->abrirConexion();
              $sql = "SELECT id from persona where documento=:dni ";
              
              $parameter = array(
                      ':dni'=>$this->dni
                  );
              $stmt = $conn->prepare($sql);
              $stmt->execute($parameter);
             // $mostrar = $stmt->fecthAll();
        
              $conexionDB->cerrarConexion();
            
            return $stmt;      
              
          }catch(PDOException $e){
              return $e->getMessage();
          }
      }
   public function buscar()
   {
      try{
              $conexionDB = new Conexion();
              $conn = $conexionDB->abrirConexion();
              $sql = "SELECT *from persona where documento=:dni ";
              
              $parameter = array(
                      ':dni'=>$this->dni
                  );
              $stmt = $conn->prepare($sql);
              $stmt->execute($parameter);
              $ok = $stmt->rowCount();
        
              $conexionDB->cerrarConexion();
              if ($ok!=0) {
                  return true;
              } else {
                  return false;
              }
            
              
          }catch(PDOException $e){
              return $e->getMessage();
          }
   }
  */
}

