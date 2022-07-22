<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
  
echo '<div class="table-responsive">
        <table style="border-bottom: 1px solid #11111126;" class="table table-striped" id="ingresoGas">
            <thead style="border-bottom: 1px solid #11111126;">           
                <tr>                                                
                <th>TICKET</th>   
                <th>FECHA</th>  
                <th>CANT</th>     
                <th>LINEA</th>                                       
                </tr>
            </thead>    
 ';
 $accion = $_POST['accion'];
    if($accion == 1){
        $resultado = $sql->query("SELECT TOP 5 itemDetalle,fechaRegistro,cantidad,idlinea FROM RegistroAbastecimientoDDetalle WHERE fechaRegistro BETWEEN '2022-01-07' AND '2022-31-12' ORDER BY itemDDetalle DESC;"); 
	    while ($row=$resultado->FETCH(PDO::FETCH_ASSOC)) {
        echo 
	    '
			<tr>		      
		      <td>'.$row['itemDetalle'].'</td>
		      <td>'.$row['fechaRegistro'].'</td>
		      <td>'.$row['cantidad'].'</td>
              <td>'.$row['idlinea'].'</td>
		    </tr>
	    ';
             }  
        }              
        
echo '</table>
    </div>';
 ?>