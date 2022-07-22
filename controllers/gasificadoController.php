<?php
require_once 'models/mGasificado.php';
require_once 'helpers/utils.php';
class gasificadoController{
	private $model;
	function __construct(){
		$this->model=new Gasificado();
	}
    public function viewGasificado(){          
		require_once ('views/gasificado/viewIngresoSalida.php');
	}   
	public function listRegistroGasificado(){
		$gasificado = new Gasificado();     
		$lista = $gasificado->getRegistrosGasificado();
		require_once('views/gasificado/listGasificado.php');
	} 
}