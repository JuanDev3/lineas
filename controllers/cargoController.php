<?php
require_once 'models/mCargo.php';
require_once 'helpers/utils.php';
class cargoController{
    private $model;
    function __construct(){
        $this->model=new Cargo();
    }
    public function list(){
        $cargo = new Cargo();
        $cargos = $cargo->getCargos();
        $areas = $cargo->getAreas();
        require_once ('views/cargos/listaCargos.php');
    }
    public function createCargo(){
        if(isset($_POST)){
            $cargoName = isset($_POST['cargoCreate']) ? $_POST['cargoCreate'] : false;
            $codArea = isset($_POST['codArea1']) ? $_POST['codArea1'] : false;

            if($cargoName){
                $cargo = new Cargo();
                $cargo->setNombreCargo($cargoName);
                $cargo->setCodArea($codArea);
                $save= $cargo->saveCargo();
                if($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = 'failed';
                }
            }else{
                $_SESSION['register']='failed';
            }
        }else{
            $_SESSION['register']='failed';
        }
        header("Location:".base_url.'cargo/list');
    }
    //updateCargo
        public function updateCargo(){       
        if(isset($_POST)){
            // Recoger datos form
            $codCargo = $_POST['codCargo1'];
            $nombreCargo = $_POST['cargoName1'];
           
            // Upadate
            $cargo = new Cargo();
            $cargo->setCodCargo($codCargo);
            $cargo->setNombreCargo($nombreCargo); 
            $cargo->updateCargo();							
            
            header("Location:".base_url.'cargo/list');
        }else{
            header("Location:".base_url.'admin/dashboard');
            
        }
    } 
    
        public function deleteCargo(){		
        if(isset($_POST)){    
			$codCargo = $_POST['codCargo2'];
		    $cargo = new Cargo();
			$cargo->setCodCargo($codCargo);			
			$delete = $cargo->deleteCargo();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
            header("Location:".base_url.'admin/dashboard');
		}		
		header('Location:'.base_url.'cargo/list');
	}
	
}
?>