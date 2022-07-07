<?php
require_once 'models/mPublicacion.php';
require_once 'helpers/utils.php';
class publicacionController{
	private $model;
	function __construct(){
		$this->model=new Publicacion();
	}
    public function list(){	
		$publicacion = new Publicacion();
		$publicaciones = $publicacion->getPublicaciones();   
		$cargos = $publicacion ->getCargos();    
		$plantas = $publicacion ->getPlantas();  
		require_once ('views/publicaciones/listaPublicaciones.php');
	}
    public function createPublicacion(){
		if(isset($_POST)){
			$puesto = isset($_POST['puestoCreate']) ? $_POST['puestoCreate'] : false;
			$codCargo = isset($_POST['codCargo1']) ? $_POST['codCargo1'] : false;
			$expGeneral = isset($_POST['expGeneral1']) ? $_POST['expGeneral1'] : false;
			$expEspecif = isset($_POST['expEspec1']) ? $_POST['expEspec1'] : false;
			$conocimntos = isset($_POST['conocim']) ? $_POST['conocim'] : false;
			$modalidad = isset($_POST['modalidad']) ? $_POST['modalidad'] : false;
			$numVacantes = isset($_POST['numVacantes']) ? $_POST['numVacantes'] : false;
			$habilidades = isset($_POST['habilid']) ? $_POST['habilid'] : false;
			$codPlanta = isset($_POST['codPlanta']) ? $_POST['codPlanta'] : false;	
			$fechaIni = isset($_POST['fechaIni']) ? $_POST['fechaIni'] : false;
			$fechaFin = isset($_POST['fechaFin']) ? $_POST['fechaFin'] : false;

			if($puesto && $codCargo && $expGeneral && $expEspecif &&  $conocimntos && $modalidad && $numVacantes && $habilidades && $codPlanta){
				$publicacion = new Publicacion();
				$publicacion->setPuesto($puesto);	
				$publicacion->setCodCargo($codCargo);	
				$publicacion->setExpGeneral($expGeneral);	
				$publicacion->setExpEspecif($expEspecif);	
				$publicacion->setConocim($conocimntos);	
				$publicacion->setModalidad($modalidad);	
				$publicacion->setNumVacantes($numVacantes);	
				$publicacion->setHabilid($habilidades);	
				$publicacion->setCodPlanta($codPlanta);	
				$publicacion->setFechaIni($fechaIni);
				$publicacion->setFechaFin($fechaFin);
				$save = $publicacion->savePublicacion();
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
		header("Location:".base_url.'publicacion/list');
	}    

	function vistaEditar(){
		if(isset($_POST)){
            // Recoger datos     
			$codPubli= $_POST['codPubliDetalle'];             
            $publicacion = new Publicacion();			
			$dato = $publicacion->mostrarPublic("i.codPublicacion='$codPubli'");
			$codPublis = $dato['codPublicacion'];	
			$puesto = $dato['puesto'];	
			$nomCargo = $dato['nomCargo'];	
			$nomArea = $dato['nomArea'];			
			$expGene = $dato['experienciaGeneral'];		
			$expEsp = $dato['experienciaEspecifica'];	
			$conocim = $dato['conocimientos'];	
			$modalid = $dato['modalidad'];
			$numVacan = $dato['numVacantes'];
			$habil = $dato['habilidades'];
			$nomPlanta = $dato['nomPlanta'];
			$fechaIni = $dato['fechaInicio'];
			$fechaFin = $dato['fechaFin'];							
            require_once ('views/publicaciones/editPublicaciones.php');
			
        }else{
            header("Location:".base_url.'admin/dashboard');
            
        }	
	}
    public function updatePublic(){       
        if(isset($_POST)){
            // Recoger datos form
            $codPubli = $_POST['codPublUpd'];
            $puestoUpd = $_POST['puestoUpd'];      
			$expGeneralUpd = $_POST['expGenUpd'];
            $expEspecUpd = $_POST['expEspUpd'];
			$conocimUpd = $_POST['conociUpd'];
            $modalidadUpd = $_POST['modalUpd'];
			$numVacantesUpd = $_POST['vacanUpd'];
            $habilidUpd = $_POST['habilUpd'];  
			$fechaIni = $_POST['fechaiUpd'];   
			$fechaFin = $_POST['fechafUpd']; 
		
			if($codPubli){
				// Update
				$publicacion = new Publicacion();	
				$publicacion->setCodPublicacion($codPubli);
				$publicacion->setPuesto($puestoUpd); 
				$publicacion->setExpGeneral($expGeneralUpd); 
				$publicacion->setExpEspecif($expEspecUpd); 
				$publicacion->setConocim($conocimUpd); 
				$publicacion->setModalidad($modalidadUpd); 
				$publicacion->setNumVacantes($numVacantesUpd); 
				$publicacion->setHabilid($habilidUpd); 
				$publicacion->setFechaIni($fechaIni); 
				$publicacion->setFechaFin($fechaFin); 
				$save = $publicacion->updatePublicacion();		
				
				if($save){
					$_SESSION['publicup'] = "complete";
					$_SESSION["codigoP"] = $codPubli;	
					header("Location:".base_url.'publicacion/showPublic');			
				}else{
					$_SESSION['publicup'] = "failed";
					header("Location:".base_url.'publicacion/showPublic');	
				}				
	
			}else {
				$_SESSION['updt'] = "failed";
				header("Location:".base_url.'publicacion/showPublic');
			}

        }else{
            header("Location:".base_url.'admin/dashboard');            
        }
    }    
	
	public function showPublic(){
		$codPublicUp = $_SESSION["codigoP"];
		$publicacion = new Publicacion();	
		$publicacion->setCodPublicacion($codPublicUp); 	
		$dataPublic = $publicacion->registroExiste();

		if ($dataPublic ==  TRUE){
			//$codPubli= $_POST['codPubliDetalle'];             
            $publicacion = new Publicacion();			
			$dato = $publicacion->mostrarPublic("i.codPublicacion='$codPublicUp'");
			$codPublis = $dato['codPublicacion'];	
			$puesto = $dato['puesto'];	
			$nomCargo = $dato['nomCargo'];	
			$nomArea = $dato['nomArea'];			
			$expGene = $dato['experienciaGeneral'];		
			$expEsp = $dato['experienciaEspecifica'];	
			$conocim = $dato['conocimientos'];	
			$modalid = $dato['modalidad'];
			$numVacan = $dato['numVacantes'];
			$habil = $dato['habilidades'];
			$nomPlanta = $dato['nomPlanta'];
			$fechaIni = $dato['fechaInicio'];
			$fechaFin = $dato['fechaFin'];							
            require_once ('views/publicaciones/editPublicaciones.php');

		}else{			
			header("Location:".base_url.'admin/dashboard');
		}
	}
    public function deletePubli(){		
        if(isset($_POST)){    
			$codPubl = $_POST['codPubliDel'];
			$publicacion = new Publicacion();
			$publicacion->setCodPublicacion($codPubl);			
			$delete = $publicacion->delPubli();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
            header("Location:".base_url.'admin/dashboard');
		}		
		header("Location:".base_url.'publicacion/list');
	}	

}