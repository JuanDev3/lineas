<?php
require_once 'config/db.php';
class Admin{
    private $codUsuario;
    private $usuario;
    private $clave;   
    private $estado; 
    private $db;	
    public function __construct(){
        $this -> usuariosA = array();        
        $this ->db = Database::StartUp();       
    }

    function getCodUsuario(){
        return $this -> codUsuario;
    }
    function getUsuario(){
        return $this -> usuario;
    }
    function getClave(){        
       return $this -> clave;
    }  
    function getEstado(){
        return $this -> estado;
    }

    function setCodUsuario($codUsuario){
        $this -> codUsuario= $codUsuario;
    }
    function setUsuario($usuario){
		$this->usuario = $usuario;
	}
    function setClave($clave){
		$this->clave = $clave;
	}
    function setEstado($estado){
        $this ->estado= $estado;
    }
   

    public function loginModel($tabla, $condicion){
        $consulta ="SELECT codUsuario,usuario,clave,estado FROM $tabla WHERE $condicion";
        $resultado = $this->db->query($consulta);
        $filas=$resultado->FETCH(PDO::FETCH_ASSOC);    
        return $filas;      
    }
    public function userExiste($usuario){
        $consulta ="SELECT COUNT(codUsuario) FROM user WHERE usuario = '$usuario' AND estado = 1 LIMIT 1 ;";
        $resultado = $this->db->query($consulta);
        $total = $resultado->fetch(PDO::FETCH_BOTH)[0];
    
        if($total > 0){
          return true;
       }else{
          return false;
       }        
      }

    public function claveExiste($clave,$usuario){
        $consulta ="SELECT COUNT(codUsuario) FROM user WHERE clave = '$clave' AND usuario = '$usuario' LIMIT 1 ;";
        $resultado = $this->db->query($consulta);
        $total = $resultado->fetch(PDO::FETCH_BOTH)[0];
    
        if($total > 0){
          return true;
       }else{
          return false;
       }        
      }
     
    public function getUsuarios(){
        $usuarios = $this->db->query("SELECT * FROM user WHERE estado = '1' ORDER BY codUsuario DESC");
		while($filas=$usuarios->FETCHALL(PDO::FETCH_ASSOC)){
			$this->usuariosA[]=$filas;
			   }
			   return $this->usuariosA;
		return $usuarios;
	}

    public function saveUser(){
		$sql = "INSERT INTO user VALUES(NULL,'{$this->getUsuario()}','{$this->getClave()}',1);";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
    
    public function updateUsuario(){
		$sql = "UPDATE user SET usuario ='{$this->getUsuario()}',clave='{$this->getClave()}' WHERE codUsuario ={$this->getCodUsuario()}";
		$save = $this->db->query($sql);		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;	
	}

    public function deleteUsuario(){
		$sql = "UPDATE user SET estado = '0' WHERE codUsuario={$this->getCodUsuario()}";
		$delete = $this->db->query($sql);		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
    public function totalPublics(){  
        $consulta ="SELECT COUNT(codPublicacion) AS totalPublics FROM infopuesto;";
        $resultado = $this->db->query($consulta);
        $filas=$resultado->FETCH(PDO::FETCH_ASSOC);    
        return $filas;    
    }
    public function totalPostulantes(){    
        $consulta ="SELECT COUNT(codPostulante) AS totalPostulante FROM postulante WHERE codPostulante LIMIT 1;";
        $resultado = $this->db->query($consulta);
        $filas=$resultado->FETCH(PDO::FETCH_ASSOC);    
        return $filas;    
    }

}