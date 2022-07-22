<?php
require_once 'config/db.php';
class Postulacion{
    private $codPostulante;
    private $nombres;  
    private $apellidos;
    private $telefono;
    private $email;
    private $profesion;
    private $cv;
    private $codPublicacion ;   

    private $db;	
    public function __construct(){
        $this -> postulacionA = array();       
        $this ->db = Database::StartUp();       
    }

    function getCodPostulante(){
        return $this -> codPostulante;
    }
    function getNombres(){
        return $this -> nombres;
    }  
    function getApellidos(){
        return $this ->apellidos;
    }
    function getTelefono(){
        return $this -> telefono;
    }
    function getEmail(){
        return $this -> email;
    }
    function getProfesion(){
        return $this-> profesion; 
    }
    function getCv(){
        return $this -> cv;
    }
    function getCodPublicacion(){
        return $this-> codPublicacion;
    }
    
    /* SET */
    function setCodPostulante($codPostulante){
        $this -> codPostulante= $codPostulante;
    }
    function setNombres($nombres){
		$this -> nombres = $nombres;
	}   
    function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	} 
    function setTelefono($telefono){
        $this -> telefono= $telefono;
    }
    function setEmail($email){
		$this->email = $email;
	} 
    function setProfesion($profesion){
        $this -> profesion= $profesion;
    }
    function setCv($cv){
		$this->cv = $cv;
	} 
    function setCodPublicacion($codPublicacion){
		$this->codPublicacion = $codPublicacion;
	}
    
        
    public function getPostulaciones(){
        $postulaciones = $this->db->query("SELECT p.codPostulante,CONCAT_WS(' ', p.nombres, p.apellidos) as postulante,p.telefono,
         p.email,p.profesion,p.cv,i.codPublicacion AS codPubli,i.puesto AS puesto,c.nombreCargo AS cargo FROM postulante p INNER JOIN infopuesto i ON i.codPublicacion = p.codPublicacion INNER JOIN cargo c ON i.codCargo=c.codCargo;");
		while($filas=$postulaciones->FETCHALL(PDO::FETCH_ASSOC)){
			$this->postulacionA[]=$filas;
			   }
			   return $this->postulacionA;
		return $postulaciones;
	}
    public function mostrarPublic(){
        $consulta ="SELECT i.codPublicacion,i.puesto,c.nombreCargo AS nomCargo,
        a.nombreArea AS nomArea, i.experienciaGeneral,i.experienciaEspecifica,i.conocimientos,
        i.modalidad,i.numVacantes,i.habilidades,p.nombrePlanta AS nomPlanta
        FROM infopuesto i
        INNER JOIN cargo c ON i.codCargo = c.codCargo
        INNER JOIN area a ON c.codArea = a.codArea
        INNER JOIN planta p ON i.codPlanta = p.codPlanta WHERE $condicion ;";
        $resultado = $this->db->query($consulta);
        while($filas=$resultado->FETCHALL(PDO::FETCH_ASSOC)){
        $this->colegios[]=$filas;
        }
        return $this->colegios;
    }

    public function savePostulacion(){
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

    public function deletePublicacion(){
		$sql = "DELETE FROM area WHERE codArea={$this->getCodArea()}";
		$delete = $this->db->query($sql);		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}




    




 

 



}