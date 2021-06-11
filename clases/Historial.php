<?php


namespace App\Clases;
use config\ConexionBD;
include_once "config/autoload.php";

class Historial
{
    private $control_id;
    private $persona_id;
    private $numHistorial;
    private $dni_paciente;



    public function getcontrol_id()
    {
        return $this->control_id;
    }

    public function setcontrol_id($control_id)
    {
       return $this->control_id = $control_id;
        
    }
    public function getpersona_id()
    {
        return $this->persona_id;
    }

    public function setpersona_id($persona_id)
    {
       return $this->persona_id = $persona_id;
        
    }

    public function getNumHistorial()
    {
        return $this->numHistorial;
    }


    public function setNumHistorial($numHistorial)
    {
        $this->numHistorial = $numHistorial;
        return $this;
    }

    public function getDniPaciente(){
        return $this->dni_paciente;
    }

    public function setDniPaciente(string $dni_paciente){
        $this->dni_paciente = $dni_paciente;
    }

    public function crear() {
        try{
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO historial(control_id,persona_id)
                    VALUES('$this->control_id','$this->persona_id')";

            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }

}