<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
    if(isset($_POST['eliminar']))
    { 
        $codIngresoSalidaGasificadoDel = isset($_POST['codIngresoSalidaGasificadoDel']) ? $_POST['codIngresoSalidaGasificadoDel'] : false;
        $idCamaraDel = isset($_POST['idCamaraDel']) ? $_POST['idCamaraDel'] : false;
        $itemDetalleDel = isset($_POST['itemDetalleDel']) ? $_POST['itemDetalleDel'] : false;
        $fechaDel = isset($_POST['fechaDel']) ? $_POST['fechaDel'] : false;
        $tipoRegistroDel = isset($_POST['tipoRegistroDel']) ? $_POST['tipoRegistroDel'] : false;
        $estadoDel = isset($_POST['estadoDel']) ? $_POST['estadoDel'] : false;
        $tipoDel = isset($_POST['tipoDel']) ? $_POST['tipoDel'] : false;
        
        if ($codIngresoSalidaGasificadoDel) {
            //crear nuevo registro
            $query = "INSERT INTO IngresoSalidaGasificadoEliminado 
            VALUES('$codIngresoSalidaGasificadoDel','$idCamaraDel','$itemDetalleDel','$fechaDel','$tipoRegistroDel','$estadoDel','$tipoDel');";          
            $save=$sql->query($query);            
            if($save){
                $query2 ="DELETE IngresoSalidaGasificado WHERE idIngresoSalidaGasificado ='$codIngresoSalidaGasificadoDel'";
                $save2=$sql->query($query2);
                echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong><i class="fas fa-check-circle"></i> Registro Eliminado!.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'; 
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong><i class="fas fa-exclamation-circle"></i> No se pudo eliminar registro!.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'; 
            } 
                
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong><i class="fas fa-exclamation-circle"></i> No se encontro registro a eliminar!.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'; 
        }     
       
    }
 ?>