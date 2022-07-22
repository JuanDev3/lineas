<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
    if(isset($_POST['guardar']))
    { 
        $codLinea = isset($_POST['idLineaSave']) ? $_POST['idLineaSave'] : false;
        $numTicket = isset($_POST['numTicket']) ? $_POST['numTicket'] : false;
        //Obtenemos campos a validar        
        $cantTotalTicket=isset($_POST['cantTotalTicket']) ? $_POST['cantTotalTicket']: false;
        $cantYaIngresada=isset($_POST['cantYaIngresada']) ? $_POST['cantYaIngresada']: false;
        $cantidadAEvaluar = (int) $cantTotalTicket - (int)$cantYaIngresada;

        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad']: false;
        $fecha = isset($_POST['fechaActual']) ? $_POST['fechaActual']: false;
        $tipoCultivo = isset($_POST['tipoCultivo']) ? $_POST['tipoCultivo']: false;
        
        if ($codLinea != '' && $numTicket != '' && $cantidad != 0 && $fecha != '' && $cantTotalTicket != 0 && $cantidadAEvaluar != 0) {
            if ($cantidad < $cantidadAEvaluar || $cantidad == $cantidadAEvaluar) {
                if ($tipoCultivo =='O') {
                    $tipo = 1; //1 es Organico
                }else {
                    $tipo = 0; //0 es convencional
                }
                //crear uno nuevo
                $query = "INSERT INTO RegistroAbastecimientoDDetalle VALUES('$numTicket','$fecha',$cantidad,'$fecha','01','$codLinea',$tipo);";          
                $resultado=$sql->query($query); 
                echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                <strong><i class="fas fa-check-circle"></i> Registro Exitoso!.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';        
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i> Supera la cantidad total del ticket!.</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';   
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong><i class="fas fa-exclamation-triangle"></i> No deje campos vacios!.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>'; 
        }  
    }else {
        echo 'Datos vacios';
    }
 ?>