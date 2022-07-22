<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
  
echo '<div class="table-responsive">
        <table style="border-bottom: 1px solid #11111126;" class="table table-striped" id="ingresoGas">
            <thead style="border-bottom: 1px solid #11111126;">           
                <tr>                                                  
                    <th>Cámara</th>   
                    <th>Ticket</th>  
                    <th>Fecha</th>                                      
                </tr>
            </thead>    
 ';
 $accion = $_POST['accion'];
    if($accion == 1){
        $resultado = $sql->query("SELECT TOP 5 idCamara,itemDetalle,fecha FROM IngresoSalidaGasificado WHERE fecha LIKE '%2022%' ORDER BY idIngresoSalidaGasificado DESC"); 
	    while ($row=$resultado->FETCH(PDO::FETCH_ASSOC)) {
        echo 
	    '
			<tr>		   
		      <td>'.$row['idCamara'].'</td>
		      <td>'.$row['itemDetalle'].'</td>
		      <td>'.$row['fecha'].'</td>
		    </tr>
	    ';
             }  
        }              
        
echo '</table>
    </div>';
 ?>