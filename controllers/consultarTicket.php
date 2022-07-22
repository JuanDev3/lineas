<?php
 require_once '../config/db.php';
 $sql= Database::StartUp();
 if(isset($_POST['buscar']))
 { 
     $numTicket = $_POST['numTicket'];
     $valores = array();
     $valores['existe'] = "0";

     //CONSULTAR
       $resultado = $sql->query("SELECT FLOOR(ISNULL(SUM(rdd.cantidad),0)) AS sumaCantIng,ISNULL((SELECT ra.tipoCultivo FROM RegistroAbastecimientoDetalle ra WHERE ra.itemDetalle= '$numTicket'),'') AS tipoCultivo,
       FLOOR(ISNULL((SELECT ra.cantidad FROM RegistroAbastecimientoDetalle ra WHERE ra.itemDetalle= '$numTicket'),0)) AS cantidadTk, 
       FLOOR(ISNULL((SELECT ra.cantidad FROM RegistroAbastecimientoDetalle ra WHERE ra.itemDetalle= '$numTicket'),0)-(ISNULL(SUM(rdd.cantidad),0))) AS diferencia
       FROM RegistroAbastecimientoDDetalle rdd      
       WHERE rdd.itemDetalle= '$numTicket';"); 
       while($row=$resultado->FETCH(PDO::FETCH_ASSOC))
       {
           $valores['existe'] = "1";
           $valores['cantidadTk'] = $row['cantidadTk'];
           $valores['sumaCantIng'] = $row['sumaCantIng'];
           $valores['diferencia'] = $row['diferencia'];
           $valores['tipoCultivo'] = $row['tipoCultivo'];
     	    
       }
       sleep(1);
       $valores = json_encode($valores);
       echo $valores;
 }
 

 ?>