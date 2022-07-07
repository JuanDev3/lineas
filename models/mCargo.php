<?php
require_once 'config/db.php';
class Cargo{
    private $codCargo;
    private $nombreCargo;  
    private $codArea;
    private $db;	
    public function __construct(){
        $this -> cargosA = array();       
        $this ->db = Database::StartUp();       
    }

    function getCodCargo(){
        return $this -> codCargo;
    }
    function getNombreCargo(){
        return $this -> nombreCargo;
    }  
    function getCodArea(){
        return $this -> codArea;
    }
    function setCodCargo($codCargo){
        $this -> codCargo= $codCargo;
    }
    function setNombreCargo($nombreCargo){
		$this->nombreCargo = $nombreCargo;
	}   
    function setCodArea($codArea){
        $this->codArea= $codArea;
    }
        
    public function getCargos(){
        $cargos = $this->db->query("SELECT c.codCargo,c.nombreCargo,a.nombreArea as areaNom FROM cargo c INNER JOIN area a ON c.codArea = a.codArea ORDER BY codCargo DESC");
		while($filas=$cargos->FETCHALL(PDO::FETCH_ASSOC)){
			$this->cargosA[]=$filas;
			   }
			   return $this->cargosA;
		return $areas;
	}
    public function getAreas(){
        $areas = $this ->db ->query("SELECT codArea,nombreArea FROM area ORDER BY codArea DESC");
        return $areas;
    }

    public function saveCargo(){
		$sql = "INSERT INTO cargo VALUES(NULL,'{$this->getNombreCargo()}',{$this->getCodArea()});";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

    
    public function updateCargo(){
		$sql = "UPDATE cargo SET nombreCargo ='{$this->getNombreCargo()}' WHERE codCargo={$this->getCodCargo()};";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;	
	}

    public function deleteCargo(){
		$sql = "DELETE FROM cargo WHERE codCargo={$this->getCodCargo()}";
		$delete = $this->db->query($sql);		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

}