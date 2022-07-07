<?php
require_once 'models/mPostulaciones.php';
require_once 'helpers/utils.php';
class postulacionController{
	private $model;
	function __construct(){
		$this->model=new Postulacion();
	}
    public function list(){	
		$postulacion = new Postulacion();
		$postulaciones = $postulacion->getPostulaciones();	 
		require_once ('views/postulaciones/listaPostulaciones.php');
	}
     
    public function deletePostulacion(){		
        if(isset($_POST)){    
			$codArea = $_POST['codArea2'];
			$area = new Area();
			$area->setCodArea($codArea);			
			$delete = $area->deleteArea();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
            header("Location:".base_url.'admin/dashboard');
		}		
		header('Location:'.base_url.'area/list');
	}	

}