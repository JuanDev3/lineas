<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
    if(isset($_POST['eliminar']))
    { 
        $itemDDetalleDel = isset($_POST['itemDDetalleDel']) ? $_POST['itemDDetalleDel'] : false;
        $itemDetalleDel = isset($_POST['itemDetalleDel']) ? $_POST['itemDetalleDel'] : false;
        $fechaRegistroDel = isset($_POST['fechaRegistroDel']) ? $_POST['fechaRegistroDel'] : false;
        $cantidadDel = isset($_POST['cantidadDel']) ? $_POST['cantidadDel'] : false;
        $horaDel = isset($_POST['horaDel']) ? $_POST['horaDel'] : false;
        $idMovilDel = isset($_POST['idMovilDel']) ? $_POST['idMovilDel'] : false;
        $idLineaDel = isset($_POST['idLineaDel']) ? $_POST['idLineaDel'] : false;
        $esOrganicoDel = isset($_POST['esOrganicoDel']) ? $_POST['esOrganicoDel'] : false;
        //var_dump($idLineaDel);
        if ($itemDDetalleDel) {
            //crear nuevo registro
            $query = "INSERT INTO RegistroAbastecimientoDDetalleEliminado 
            VALUES('$itemDetalleDel','$fechaRegistroDel',$cantidadDel,
            '$horaDel','$idMovilDel','$idLineaDel','$esOrganicoDel');";          
            $save=$sql->query($query);            
            if($save){
                $query2 ="DELETE RegistroAbastecimientoDDetalle WHERE itemDDetalle ='$itemDDetalleDel'";
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