<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
 if(isset($_POST['buscar']))
 { 
     $numTicket = $_POST['numTicket'];
     $valores = array();
     $valores['existe'] = "0";

     //CONSULTAR
       $resultado = $sql->query("SELECT tipoCultivo FROM RegistroAbastecimientoDetalle      
       WHERE itemDetalle= '$numTicket' GROUP BY tipoCultivo;"); 
       while($row=$resultado->FETCH(PDO::FETCH_ASSOC))
       {
           $valores['existe'] = "1";
           $valores['tipoCultivo'] = $row['tipoCultivo'];                	    
       }
       sleep(1);
       $valores = json_encode($valores);
       echo $valores;
 }
 

 ?>