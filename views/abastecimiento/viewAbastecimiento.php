<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>      
        <script type="text/javascript">
            $(document).ready( function () {
                $('#usert').DataTable();
            } );

            function justNumbers(e)
            {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
            return true;            
            return /\d/.test(String.fromCharCode(keynum));
            } 
        </script>
<!-- Page Content -->
<div id="content" class="bg-grey w-100">
<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
              <h5 class="font-weight-bold" style="color:gray">Abastecimiento a Líneas de Producción</h5>        
            </div>            
        </div>
    </div>
</section>
<section class="bg-mix">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body">
                <div class="formulario">
                <form> 
                    <label class="font-weight-bold">Línea</label>
                    <select class="form-control" name="idLineaSave" id="idLineaSave" required> 
                        <option value="">-- Seleccione Línea --</option>
                        <?php while ($row=$lineas->FETCH(PDO::FETCH_ASSOC)) {?>
                        <option value="<?php echo $row['idlinea'] ?>"><?php echo $row['descripcion'] ?></option>
                        <?php } ?>            
                    </select> 
                    <label class="font-weight-bold">Número de Ticket de acopio</label>
                    <input onkeypress="return justNumbers(event);" required onblur="buscar_datos();" type="text" name="numTicket" id="numTicket" class="form-control input-sm" maxlength="7" placeholder="Ticket">  
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label class="font-weight-bold">Cant.Total Jabas</label>
                            <input disabled type="number" name="cantTotalTicket" id="cantTotalTicket" class="form-control input-sm" placeholder="Cantidad Total Jabas">
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label class="font-weight-bold">Cant.Registrada Jabas</label>
                            <input disabled type="number" name="cantYaIngresada" id="cantYaIngresada" class="form-control input-sm" placeholder="Cantidad Registrada">
                        </div>                          
                    </div>                     
                    <label class="font-weight-bold">Cantidad</label>
                    <input onkeypress="return justNumbers(event);" required type="text" name="cantidad" id="cantidad" class="form-control input-sm" maxlength="45">
                    <input hidden required type="text" name="tipoCultivo" id="tipoCultivo" class="form-control input-sm" maxlength="45">
                    <hr>
                    <?php  $Object = new DateTime();  
                        $Object->setTimezone(new DateTimeZone('America/Lima'));
                        $fecha = ($Object->format("d-m-Y h:i:s a")); ?>
                    <input hidden required value="<?=$fecha?>"type="text" name="fechaActual" id="fechaActual" class="form-control input-sm" maxlength="45">
                    <div>                           
                        <button onclick="guardar();" style="color:#FFFFF;" id="btnRegistrar" type="button" class="btn btn-primary w-100 align-self-center font-weight-bold">Registrar</button>
                    </div>                                   
                    <div id="notificacion" class="resultados">                        
                    </div>
                </form>   
                    <div class="row mt-2">
                        <div class="col-lg-6 col-md-6 mt-2">
                            <button onclick="consultar(1);" style="color:#FFFFF;" type="button" class="btn btn-outline-primary w-100 align-self-center font-weight-bold">Consultar</button>                            
                        </div>
                        <div class="col-lg-6 col-md-6 mt-2">
                            <a href="<?= base_url ?>admin/dashboard" style="color:#FFFFF;" class="btn btn-outline-info w-100 align-self-center font-weight-bold">Regresar</a>
                        </div>                          
                    </div> 
                    <script>
                        function limpiar(){
                            $("#idLineaSave").val("");
                            $("#numTicket").val("");
                            $("#cantTotalTicket").val("");
                            $("#cantYaIngresada").val("");
                            $("#cantidad").val("");
                            $("#tipoCultivo").val("")                                                             
                        }                      
                        function guardar()
                        {
                            var parametros = 
                            {
                            "guardar": "1",
                            "idLineaSave" : $("#idLineaSave").val(),        
                            "numTicket" : $("#numTicket").val(),                          
                            "cantidad" : $("#cantidad").val(),
                            "cantTotalTicket" : $("#cantTotalTicket").val(),
                            "cantYaIngresada" : $("#cantYaIngresada").val(),
                            "fechaActual" : $("#fechaActual").val(),
                            "tipoCultivo" : $("#tipoCultivo").val()
                            };
                            $.ajax(
                            {
                            data:  parametros,
                            url:   '../controllers/saveAbastecimiento.php',
                            type:  'post',
                            beforeSend: function() 
                            {                                    
                                $('.formulario').show();                                
                            }, 
                            error: function()
                            {alert("Error");},
                            complete: function() 
                            {
                                consultar(1);
                                $('.formulario').show();                              
                            
                            },
                            success: function (mensaje) 
                            {                               
                                $('.resultados').html(mensaje);                                  
                            }
                            }) 
                            
                            limpiar();
                            
                        }
                        function consultar(boton)
                        { 
                            accion = boton;
                            var parametros = 
                            {
                                "accion" : accion
                            };
                            $.ajax({
                                data: parametros,
                                url: '../controllers/viewListaIngresoAbastecimiento.php',
                                type: 'POST',
                                
                                beforesend: function()
                                {
                                $('#mostrar_lista').html("Mensaje antes de Enviar");
                                },
                                success: function(mensaje)
                                {
                                $('#mostrar_lista').html(mensaje);
                                }
                            });
                        }
                    </script>                                  
                </div>              
            </div>
        </div>
    </div>
</section>
<script>
      function buscar_datos()
        {
            numTicket = $("#numTicket").val();  
            var parametros = 
            {
            "buscar": "1",
            "numTicket" : numTicket
            };
            $.ajax(
            {
            data:  parametros,
            dataType: 'json',
            url:   '../controllers/consultarTicket.php',
            type:  'post',
            beforeSend: function() 
            {
                $('.formulario').show();            
            }, 
            error: function()
            {alert("Error");},
            complete: function() 
            {
                $('.formulario').show();        
            
            },
            success:  function (valores) 
            {
                if(valores.existe=="1")
                {
                    if(valores.sumaCantIng > 0 || valores.cantidadTk > 0){
                        
                        if(valores.cantidadTk == valores.sumaCantIng){
                            alert("No se puede ingresar más cantidad!");
                            cantidad.disabled = true;
                            btnRegistrar.disabled = true; 
                            $("#cantTotalTicket").val(valores.cantidadTk);
                            $("#cantYaIngresada").val(valores.sumaCantIng); 
                            $("#cantidad").val(valores.diferencia); 
                        }else{
                            $("#cantTotalTicket").val(valores.cantidadTk);
                            $("#cantYaIngresada").val(valores.sumaCantIng); 
                            $("#cantidad").val(valores.diferencia);
                            $("#tipoCultivo").val(valores.tipoCultivo);                          
                            cantidad.disabled = false;
                            btnRegistrar.disabled = false; 
                        }
                    }else{
                        alert("Ticket sin ingresar, ¡Registrarlo!");
                        limpiar();
                    }                      
                }
                else
                {
                alert("El Ticket no existe, ¡Registrarlo!");
                limpiar();
                }
            }
            }) 
        }
</script>
<section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body" id="mostrar_lista">
                             
            </div>
        </div>
    </div>
</section>
<section class="bg-mix py-3">
<h1></h1>
</section><br>

</div>

<!--FIN content-->


<?php  require_once 'views/layouts/footer.php'; ?>

