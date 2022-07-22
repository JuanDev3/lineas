<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>      
        <script type="text/javascript">
            $(document).ready( function () {
                $('#ingresoGas').DataTable();
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
              <h5 class="font-weight-bold mb-0" style="color:gray">Ingreso/Salida de Pallet de Acopio a Cámara de Gasificado</h5>         
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
                        <label class="font-weight-bold">Cámara</label>
                        <select class="form-control" name="camara" id="camara" required> 
                            <option value="">-- Seleccione Cámara --</option> 
                            <option value="001">Cámara 01</option>                        
                            <option value="002">Cámara 02</option> 
                            <option value="003">Cámara 03</option> 
                        </select>  
                        <label class="font-weight-bold">Número de Ticket</label>
                        <input onkeypress="return justNumbers(event);" required onblur="buscar_datos();" type="text" name="numTicket" id="numTicket" class="form-control input-sm" maxlength="7" placeholder="Ticket">
                        <?php  $Object = new DateTime();  
                        $Object->setTimezone(new DateTimeZone('America/Lima'));
                        $fecha = ($Object->format("d-m-Y h:i:s a")); ?>
                        <input hidden required value="<?=$fecha?>"type="text" name="fechaRegistro" id="fechaRegistro" class="form-control input-sm" maxlength="45">
                        <input hidden type="text" name="esOrganico" id="esOrganico" class="form-control input-sm"><hr>
                        <div>                           
                            <button onclick="guardar();" style="color:#FFFFF;" id="btnGuardar" type="button" class="btn btn-primary w-100 align-self-center font-weight-bold">Registrar</button>
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
                            $("#camara").val("");
                            $("#numTicket").val("")                                                             
                        }
                        function guardar()
                        {
                            var parametros = 
                            {
                            "guardar": "1",
                            "camara" : $("#camara").val(),     
                            "numTicket" : $("#numTicket").val(),   
                            "fechaRegistro" : $("#fechaRegistro").val()                          
                           
                            };
                            $.ajax(
                            {
                            data:  parametros,
                            url:   '../controllers/saveGasificado.php',
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
                                consultar(1);                             
                            },
                            success:  function (mensaje) 
                            {$('.resultados').html(mensaje);}
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
                                url: '../controllers/viewListaIngresoSalidaGas.php',
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
                            url:   '../controllers/consultarEsorganico.php',
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
                                    if (valores.tipoCultivo=="C" || valores.tipoCultivo=="") {
                                        $("#esOrganico").val(valores.tipoCultivo);
                                        btnGuardar.disabled = false;                                 
                                    }else{
                                        btnGuardar.disabled = true;
                                        alert("Error,el cultivo es organico!");
                                    }
                                }
                                else
                                {
                                alert("El ticket no Existe!")
                                }
                            }
                            }) 
                        }
                    </script>                    
                </div>              
            </div>
        </div>
    </div>
</section>
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

