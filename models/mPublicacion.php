<?php
require_once 'config/db.php';
class Publicacion{
    private $codPublicacion;
    private $puesto;  
    private $codCargo;
    private $expGeneral;
    private $expEspecif;
    private $conocim;
    private $modalidad;
    private $numVac;
    private $habilid;
    private $codPlanta;
    private $fechaIni;
    private $fechaFin;

    private $db;	
    public function __construct(){
        $this -> publicacionA = array();       
        $this ->db = Database::StartUp();       
    }

    function getCodPublicacion(){
        return $this -> codPublicacion;
    }
    function getPuesto(){
        return $this -> puesto;
    }  
    function getCodCargo(){
        return $this ->codCargo;
    }
    function getExpGeneral(){
        return $this -> expGeneral;
    }
    function getExpEspecif(){
        return $this -> expEspecif;
    }
    function getConocim(){
        return $this-> conocim; 
    }
    function getModalidad(){
        return $this -> modalidad;
    }
    function getNumVacantes(){
        return $this-> numVac;
    }
    function getHabilid(){
        return $this -> habilid;
    }
    function getCodPlanta(){
        return $this -> codPlanta;
    }
    function getFechaIni(){
        return $this -> fechaIni;
    }
    function getFechaFin(){
        return $this -> fechaFin;
    }

    /* SET */
    function setCodPublicacion($codPublicacion){
        $this -> codPublicacion= $codPublicacion;
    }
    function setPuesto($puesto){
		$this -> puesto = $puesto;
	}   
    function setCodCargo($codCargo){
        $this -> codCargo= $codCargo;
    }
    function setExpGeneral($expGeneral){
		$this->expGeneral = $expGeneral;
	} 
    function setExpEspecif($expEspecif){
        $this -> expEspecif= $expEspecif;
    }
    function setConocim($conocim){
		$this->conocim = $conocim;
	} 
    function setModalidad($modalidad){
        $this -> modalidad= $modalidad;
    }
    function setNumVacantes($numVac){
		$this->numVac = $numVac;
	} 
    function setHabilid($habilid){
		$this->habilid = $habilid;
	}
    function setCodPlanta($codPlanta){
		$this->codPlanta = $codPlanta;
	}
    function setFechaIni($fechaIni){
		$this->fechaIni = $fechaIni;
	}
    function setFechaFin($fechaFin){
		$this->fechaFin = $fechaFin;
	}
        
    public function getPublicaciones(){
        $publicaciones = $this->db->query("SELECT i.codPublicacion,i.puesto,c.nombreCargo AS nomCargo,
        a.nombreArea AS nomArea, i.experienciaGeneral,i.experienciaEspecifica,i.conocimientos,
        i.modalidad,i.numVacantes,i.habilidades,p.nombrePlanta AS nomPlanta
        FROM infopuesto i
        INNER JOIN cargo c ON i.codCargo = c.codCargo
        INNER JOIN area a ON c.codArea = a.codArea
        INNER JOIN planta p ON i.codPlanta = p.codPlanta;");
		while($filas=$publicaciones->FETCHALL(PDO::FETCH_ASSOC)){
			$this->publicacionA[]=$filas;
			   }
			   return $this->publicacionA;
		return $publicaciones;
	}
    public function mostrarPublic($condicion){
        $consulta ="SELECT i.codPublicacion,i.puesto,c.nombreCargo AS nomCargo,
        a.nombreArea AS nomArea, i.experienciaGeneral,i.experienciaEspecifica,i.conocimientos,
        i.modalidad,i.numVacantes,i.habilidades,p.nombrePlanta AS nomPlanta,i.fechaInicio,i.fechaFin
        FROM infopuesto i
        INNER JOIN cargo c ON i.codCargo = c.codCargo
        INNER JOIN area a ON c.codArea = a.codArea
        INNER JOIN planta p ON i.codPlanta = p.codPlanta WHERE $condicion;";
        $resultado = $this->db->query($consulta);
        $filas=$resultado->FETCH(PDO::FETCH_ASSOC);    
        return $filas;     

    }
    public function getCargos(){
        $cargos = $this ->db ->query("SELECT c.codCargo,c.nombreCargo,a.nombreArea as areaNom FROM cargo c INNER JOIN area a ON c.codArea = a.codArea ORDER BY codCargo DESC");
        return $cargos;
    }
    public function getPlantas(){
        $plantas = $this ->db ->query("SELECT * FROM planta ORDER BY codPlanta DESC");
        return $plantas;
    }
    public function savePublicacion(){
		$sql = "INSERT INTO infopuesto VALUES (NULL,'{$this->getPuesto()}',
        {$this->getCodCargo()},'{$this->getExpGeneral()}','{$this->getExpEspecif()}',
        '{$this->getConocim()}','{$this->getModalidad()}',{$this->getNumVacantes()},
        '{$this->getHabilid()}',{$this->getCodPlanta()},'{$this->getFechaIni()}','{$this->getFechaFin()}');";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	} 
    public function registroExiste(){
        $consulta ="SELECT COUNT(*) FROM infopuesto WHERE codPublicacion = {$this->getCodPublicacion()};";
        $resultado = $this->db->query($consulta);
        $total = $resultado->fetch(PDO::FETCH_BOTH)[0];    
        if($total == 1){
          return true;
       }else{
          return false;
       }        
      }   
    public function updatePublicacion(){
		$sql = "UPDATE infopuesto SET puesto ='{$this->getPuesto()}', experienciaGeneral = '{$this->getExpGeneral()}',
        experienciaEspecifica = '{$this->getExpEspecif()}', conocimientos = '{$this->getConocim()}',
        modalidad = '{$this->getModalidad()}', numVacantes = {$this->getNumVacantes()},
        habilidades = '{$this->getHabilid()}', fechaInicio = '{$this->getFechaIni()}',
        fechaFin = '{$this->getFechaFin()}' WHERE codPublicacion={$this->getCodPublicacion()};";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;	
	}
    public function delPubli(){
		$sql = "DELETE FROM infopuesto WHERE codPublicacion={$this->getCodPublicacion()}";
		$delete = $this->db->query($sql);		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}




    




 

 



}