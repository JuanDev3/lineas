<?php
require_once 'config/db.php';
class Gasificado{
    //private $idIngresoSalidaGasificado;
    private $idCamara;
    private $itemDetalle;
    private $fecha;
    private $tipoRegistro;
    private $estado;
    private $tipo;
   
    private $db;	
    public function __construct(){
        $this -> camgasA = array();        
        $this ->db = Database::StartUp();       
    }

    function getIdCamara(){
        return $this -> idCamara;
    }  
    function getItemDetalle(){
        return $this -> itemDetalle;
    }
    function getFecha(){
        return $this -> fecha;
    }
    function getTipoRegistro(){
        return $this -> tipoRegistro;
    }
    function getEstado(){
        return $this -> estado;
    }
    function getTipo(){
        return $this -> tipo;
    }
    function setIdCamara($idCamara){
        $this -> idCamara= $idCamara;
    }
    function setItemDetalle($itemDetalle){
        $this -> itemDetalle=$itemDetalle;
    }
    function setFecha($fecha){
        $this -> fecha=$fecha;
    }
    function setTipoRegistro($tipoRegistro){
        $this -> tipoRegistro=$tipoRegistro;
    }
    function setEstado($estado){
        $this -> estado=$estado;
    }
    function setTipo($tipo){
        $this -> tipo=$tipo;
    }
    public function getRegistrosGasificado(){
        $registro = $this->db->query("SELECT idIngresoSalidaGasificado,idCamara,itemDetalle,fecha,tipoRegistro,estado,tipo FROM IngresoSalidaGasificado WHERE fecha LIKE '%2022%' ORDER BY idIngresoSalidaGasificado DESC;");
		return $registro;
    }
 
}