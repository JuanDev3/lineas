<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
    if(isset($_POST['guardar']))
    { 
        $numCamara = isset($_POST['camara']) ? $_POST['camara'] : false;
        $numTicket = isset($_POST['numTicket']) ? $_POST['numTicket'] : false;
        $fechaRegistro = isset($_POST['fechaRegistro']) ? $_POST['fechaRegistro'] : false;
        if ($numCamara != '' && $numTicket != '' && $fechaRegistro != '' ) {
            //crear nuevo registro
            $query = "INSERT INTO IngresoSalidaGasificado VALUES('$numCamara','$numTicket','$fechaRegistro','A','1','l');";          
            $resultado=$sql->query($query); 
            echo '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong><i class="fas fa-check-circle"></i> Registro Exitoso!.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>'; 
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong><i class="fas fa-exclamation-circle"></i> No deje campos vacios!.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>'; 
        }     
       
    }
 ?>