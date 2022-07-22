<?php
require_once 'models/mAdmin.php';
require_once 'helpers/utils.php';
class adminController{
	private $model;
	function __construct(){
		$this->model=new Admin();
	}
    public function login(){
		
		$user = htmlentities(addslashes($_POST['user']));  //para evitar sqlinjection
		$clave = htmlentities(addslashes($_POST['clave']));
				
		$admin = new Admin();		
		$userUser = $admin->userExiste($user);
	
		if ($userUser ==  TRUE){			
		  //existe 
			$usuario = new Admin(); 
			$dato = $usuario->loginModel("USUARIOSFAJA","usuario='$user'");					
			$claveUser = $usuario->claveExiste($clave,$user);		
			 if($claveUser ==  TRUE ){
				 // iniciar session
				 $_SESSION["usuario"]=$dato['usuario'];				
				 $_SESSION["nombres"]=$dato['nombres'];				
				 
				 header("Location:".base_url.'admin/dashboard');
	
			 } else{
				 // su contraseña no es correcta
				 $_SESSION['error_login'] = 'Contraseña Incorrecta !!';
               
				 header("Location:".base_url.'home/index');
			 }  
		} else{
		  // user no existe		 
		   $_SESSION['error_login'] = 'Usuario no Existe !!';               
		   header("Location:".base_url.'home/index');
		}
		
    }
    public function dashboard(){  
		$admin = new Admin();		   
		require_once ('views/usuarios/dashboard.php');
	}	

    public function list(){	
		$admin = new Admin();
		$usuarios = $admin->getUsuarios();        
		require_once ('views/usuarios/lista.php');
	}


    public function createUser(){
		if(isset($_POST)){
			$userName = isset($_POST['userCreate']) ? $_POST['userCreate'] : false;
			$password = isset($_POST['claveCreate']) ? $_POST['claveCreate'] : false;

			if($userName && $password){
				$admin = new Admin();
				$admin->setUsuario($userName);
				$admin->setClave($password);				
				
				$save = $admin->saveUser();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'admin/list');
	}
    
    public function updateUser(){       
        if(isset($_POST)){
            // Recoger datos form
            $codUsuario = $_POST['codUser1'];
            $userName = $_POST['userName1'];
            $clave= $_POST['claveUser1'];   
			$estado= $_POST['estado1'];        			
            
            // Upadate 
            $admin = new Admin();
            $admin->setCodUsuario($codUsuario);
            $admin->setUsuario($userName);          
            $admin->setClave($clave);
			$admin->setEstado($estado);
    
            $admin->updateUsuario();							
            
            header("Location:".base_url.'admin/list');
        }else{
            header("Location:".base_url.'admin/dashboard');
            
        }
    } 

    
    public function deleteUser(){	
		
        if(isset($_POST)){    
			$codUser = $_POST['codUser2'];
			$admin = new Admin();
			$admin->setCodUsuario($codUser);
			
			$delete = $admin->deleteUsuario();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
            header("Location:".base_url.'admin/dashboard');
		}
		
		header('Location:'.base_url.'admin/list');
	}

	public function logout(){	
		
		if(isset($_SESSION['usuario'])){
			unset($_SESSION['usuario']);
			session_destroy();
		}
		
		header("Location:".base_url);
	}
	
	public function showPerfil(){		
		$codUsuario = $_SESSION["codigo"];
		$admin = new Admin();	
		$admin->setCodUsuario($codUsuario); 	
		$dataUser = $admin->registroNullExiste();

		if ($dataUser ==  TRUE){
			$admin = new Admin();	
			$admin->setCodUsuario($codUsuario); 	
			$dataUserPerfil = $admin->getPerfilUsuarioNullData();	
			require_once ('views/usuarios/perfilUser.php');		

		}else if ($dataUser == false){
			$admin = new Admin();	
			$admin->setCodUsuario($codUsuario);
			$dataUserPerfil = $admin->getPerfilUsuariosNotnullData();
			require_once ('views/usuarios/perfilUser2.php');
		}		
	}

	public function updatePerfil(){
		if(isset($_POST)){
            // Recoger datos form
            $codUser = $_POST['cod'];
            $email = $_POST['email'];
            $clave= $_POST['claveUser'];	          

			if($codUser && $email && $clave){
				// Upadate user
				$admin = new Admin();
				$admin->setCodUsuario($codUser);				
				$admin->setEmail($email);          
				$admin->setClave($clave);	
						
				$save = $admin->updatePerfilUsuarioNull();	
				if($save){
					$_SESSION['usuariou'] = "complete";
				}else{
					$_SESSION['usuariou'] = "failed";
				}		
				header("Location:".base_url.'admin/showPerfil');			
	
			}else {
				$_SESSION['register'] = "failed";
				header("Location:".base_url.'admin/showPerfil');
			}
        }else{
			$_SESSION['validar'] = 'No se encontraron datos !!';
            header("Location:".base_url.'admin/dashboard');
            
        }

	}

}