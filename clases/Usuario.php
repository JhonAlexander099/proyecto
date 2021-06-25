<?php
namespace clases;
use config\ConexionBD;
include_once "config/autoload.php";

class Usuario{
    private $id;
    private $nombre;
    private $correo;
    private $clave;
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

    public function getClave()
    {
        return $this->clave;
    }


    public function setClave($clave)
    {
        $this->clave= $clave;
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

    
    public function crear() {
        try{
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO usuario(nombres, correo, clave, tipo)
                    VALUES('$this->nombres','$this->correo','$this->clave','$this->tipo')";

            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function mostrarPorUsuario()
    {
        try {
            $conexionDB = new Conexion();
            $conn = $conexionDB->abrirConexion();
            $sql = "SELECT * FROM usuario WHERE user=? ";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $this->user, \PDO::PARAM_STR);

            $stmt->execute();

            $conexionDB->cerrarConexion();
            
            return $stmt;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
