<?php
require_once 'config/db.php';
class Abastecimiento{    
    private $itemDDetalle;
    private $itemDetalle;
    private $fechaRegistro;
    private $cantidad;
    private $hora;
    private $idMovil;
    private $idLinea;
   
    private $db;	
    public function __construct(){
        $this -> listaLineasA = array();    
        $this -> registroA = array();      
        $this ->db = Database::StartUp();       
    }

    function getItemDetalle(){
        return $this -> itemDetalle;
    }
    function getFechaRegistro(){
        return $this -> fechaRegistro;
    }
    function getCantidad(){
        return $this -> cantidad;
    }
    function getHora(){
        return $this -> hora;
    }
    function getIdMovil(){
        return $this -> idMovil;
    }
    function getIdLinea(){
        return $this -> idLinea;
    }
    //METODOS SET
    function setItemDetalle($itemDetalle){
        $this -> itemDetalle=$itemDetalle;
    }
    function setFechaRegistro($fechaRegistro){
        $this -> fechaRegistro=$fechaRegistro;
    }
    function setCantidad($cantidad){
        $this -> cantidad=$cantidad;
    }
    function setHora($hora){
        $this -> hora=$hora;
    }
    function setIdMovil($idMovil){
        $this -> idMovil =$idMovil;
    }
    function setIdLinea($idLinea){
        $this -> idLinea = $idLinea;
    }

    public function getLineas(){
        $lineas = $this ->db ->query("SELECT idlinea,descripcion FROM LINEA ORDER BY idlinea DESC");
        return $lineas;
    }
    public function getRegistrosAbastecimientos(){
        $registro = $this->db->query("SELECT itemDDetalle,itemDetalle,fechaRegistro,cantidad,hora,idMovil,idLinea,esOrganico FROM RegistroAbastecimientoDDetalle WHERE fechaRegistro LIKE '%2022%' ORDER BY itemDDetalle DESC;");
		return $registro;
    }
}