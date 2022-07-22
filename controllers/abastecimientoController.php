<?php
require_once 'models/mAbastecimiento.php';
require_once 'helpers/utils.php';
class abastecimientoController{
	private $model;
	function __construct(){
		$this->model=new Abastecimiento();
	}
    public function viewAbastecimiento(){	
        $abastecimiento = new Abastecimiento();        
        $lineas = $abastecimiento->getLineas();        
		require_once ('views/abastecimiento/viewAbastecimiento.php');
	}
	public function listRegistroAbastecimiento(){
		$abastecimiento = new Abastecimiento();     
		$lista = $abastecimiento->getRegistrosAbastecimientos();
		require_once('views/abastecimiento/listAbastecimiento.php');
	}
}