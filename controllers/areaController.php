<?php
require_once 'models/mArea.php';
require_once 'helpers/utils.php';
class areaController{
	private $model;
	function __construct(){
		$this->model=new Area();
	}
    public function list(){	
		$area = new Area();
		$areas = $area->getAreas();        
		require_once ('views/areas/listaAreas.php');
	}
    public function createArea(){
		if(isset($_POST)){
			$areaName = isset($_POST['areaCreate']) ? $_POST['areaCreate'] : false;		
			if($areaName){
				$area = new Area();
				$area->setNombreArea($areaName);	
				$save = $area->saveArea();
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
		header("Location:".base_url.'area/list');
	}    
    public function updateArea(){       
        if(isset($_POST)){
            // Recoger datos form
            $codArea = $_POST['codArea1'];
            $nombreArea = $_POST['AreaName1'];
           
            // Upadate
            $area = new Area();
            $area->setCodArea($codArea);
            $area->setNombreArea($nombreArea); 
            $area->updateArea();							
            
            header("Location:".base_url.'area/list');
        }else{
            header("Location:".base_url.'admin/dashboard');
            
        }
    }     
    public function deleteArea(){		
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