<?php
require_once 'config/db.php';
class Area{
    private $codArea;
    private $nombreArea;  
    private $db;	
    public function __construct(){
        $this -> areasA = array();       
        $this ->db = Database::StartUp();       
    }

    function getCodArea(){
        return $this -> codArea;
    }
    function getNombreArea(){
        return $this -> nombreArea;
    }  

    function setCodArea($codArea){
        $this -> codArea= $codArea;
    }
    function setNombreArea($nombreArea){
		$this->nombreArea = $nombreArea;
	}   
        
    public function getAreas(){
        $areas = $this->db->query("SELECT * FROM area ORDER BY codArea DESC");
		while($filas=$areas->FETCHALL(PDO::FETCH_ASSOC)){
			$this->areasA[]=$filas;
			   }
			   return $this->areasA;
		return $areas;
	}

    public function saveArea(){
		$sql = "INSERT INTO area VALUES(NULL,'{$this->getNombreArea()}');";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
    
    public function updateArea(){
		$sql = "UPDATE area SET nombreArea ='{$this->getNombreArea()}' WHERE codArea={$this->getCodArea()};";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;	
	}

    public function deleteArea(){
		$sql = "DELETE FROM area WHERE codArea={$this->getCodArea()}";
		$delete = $this->db->query($sql);		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}




    




 

 



}