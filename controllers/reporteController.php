<?php
require_once 'models/mColegio.php';
require_once 'helpers/utils.php';

class reporteController{
    private $model;
	function __construct(){
		$this->model=new Colegio();
	}
    public function list(){  
		$colegio = new Colegio(); 
	    $distrito = $colegio->getDistrito();
        $niveles = $colegio->getNiveles();       
		require_once ('views/reportes/lista.php');
	}
    public function buscarReporte(){  
        if(isset($_POST['cbx-Colegio'])){
            $codColegio = $_POST['cbx-Colegio'];           
            $fecha = $_POST['fecha'];           
            $colegio = new Colegio();           
		    $reportes = $colegio->getReporte("$codColegio","$fecha");            
            $mostrarCole = $colegio ->getCole("$codColegio");  
            $cole=$mostrarCole['nomColegio'];	
            $responsab=$mostrarCole['responsable'];    
            require_once ('views/reportes/resultados.php');		    
        }else{
         
            header("Location:".base_url.'reporte/list');         
        }	
        
	}
    
    public function buscarReportexNivel(){  
        if(isset($_POST['nivelEdu'])){           
            $nivel= $_POST['nivelEdu'];
            $fechaIni=$_POST['fechaIni'];
            $fechaFin=$_POST['fechaFin'];
            $colegio = new Colegio();		   
            $reportesxNivel = $colegio->reportesxNivel("$nivel","$fechaIni","$fechaFin");     
            $mostrarNivel = $colegio->getNivel("$nivel");      
            $nivelm = $mostrarNivel['nomNivel'];  
            require_once ('views/reportes/resultadosxnivel.php');		    
        }else{          
            header("Location:".base_url.'reporte/list');         
        }	        
	}

    public function buscarReporteGeneralDiario(){  
        if(isset($_POST['fechaConsulta'])){           
            $fechaConsulta=$_POST['fechaConsulta'];
            $colegio = new Colegio();		   
            $reportesGeneralDiario = $colegio->reporteGeneralDiario("$fechaConsulta");    
            $reportesConsolidadoDiario = $colegio->reporteConsolidadoDiario("$fechaConsulta");
            require_once ('views/reportes/resultadosReporteGeneral.php');		    
        }else{          
            header("Location:".base_url.'reporte/list');         
        }	        
	}
}