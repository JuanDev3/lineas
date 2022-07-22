<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#listaAbas').DataTable();
        } );
    </script>
<!-- Page Content -->
<div id="content" class="bg-grey w-100">
<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
              <h3 class="font-weight-bold mb-0">Registros a Lineas de Abastecimientos</h3>          
              <h5 class="lead text-muted">Lista de registros a lineas de abastecimiento</h5>
            </div>
            <div class="col-lg-3 col-md-4 d-flex mt-2 ml-1">                          
            <a href="<?= base_url ?>admin/dashboard" style="color:#FFFFF;" class="btn btn-info w-100 align-self-center font-weight-bold">Regresar</a>
            </div>
        </div>
    </div>
</section>
<section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="listaAbas">
                        <thead>
                        <tr>                            
                            <th class="text-center">CodAbastecimiento</th>                           
                            <th class="text-center">Ticket</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Cant</th>     
                            <th class="text-center">Linea</th> 
                            <th class="text-center">Cultivo</th>                       
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>                           
                            <?php while ($va=$lista->FETCH(PDO::FETCH_ASSOC)) {?>                  
                                <?php $datos = $va['itemDDetalle']."||".
                                                $va['itemDetalle']."||".  
                                                $va['fechaRegistro']."||".   
                                                $va['cantidad']."||".     
                                                $va['idLinea']."||".                                        
                                                $va['esOrganico']; ?>

                                <?php $datos2 = $va['itemDDetalle']."||".
                                                $va['itemDetalle']."||".                                              
                                                $va['cantidad']."||".                                               
                                                $va['idMovil']."||".  
                                                $va['idLinea']."||".                                        
                                                $va['esOrganico']; ?>
                                <tr>
                                    <td class="text-center"><?=$va['itemDDetalle'];?></td>
                                    <td class="text-center"><?= $va['itemDetalle'];?></td>                                 
                                    <td class="text-center"><?= $va['fechaRegistro'];?></td>
                                    <td class="text-center"><?=$va['cantidad'];?></td>   
                                    <td class="text-center"><?=$va['idLinea'];?></td>                     
                                    <?php if ( $va['esOrganico']  == '1') { ?>
                                        <td class="text-center badge badge-success mt-3">Organico</td> 
                                        <?php } else { ?>
                                        <td class="text-center text-light badge badge-warning mt-3">Convencional</td>
                                    <?php } ?>                           
                                    <td class="text-center">                                        
                                        <button class="btn btn-primary" data-backdrop="false"
                                            data-toggle="modal" data-target="#modalEdicion"
                                            onclick="agregaform('<?php echo $datos ?>')"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger" data-backdrop="false" 
                                            data-toggle="modal" data-target="#modalEliminarAbas"
                                            onclick="agregaform2('<?php echo $datos2 ?>')"><i class="far fa-trash-alt "></i></button>                                      
                                    </td>
                                        <!-- Modal para eliminar registro -->
                                        <div class="modal fade" id="modalEliminarAbas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">  
                                                    <h5 class="font-weight-bold">Sistema Bolt </h5>                                                          
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">   
                                                        <div class="container mb-4 text-center">
                                                            <img src="<?=base_url?>/views/assets/img/triangulo.png" alt="" class="logo">                           
                                                        </div>   
                                                        <h4 class="lead text-muted font-weight-bold">¿Está seguro de que desea borrar el registro? </h4>                                            
                                                        <form><br>                                                            
                                                            <input hidden type="text" id="itemDDetalleDel" name="itemDDetalleDel">
                                                            <input hidden type="text" id="itemDetalleDel">
                                                            <?php  $Object = new DateTime();  
                                                            $Object->setTimezone(new DateTimeZone('America/Lima'));
                                                            $fecha = ($Object->format("d-m-Y h:i:s a")); ?>
                                                            <input hidden value="<?=$fecha?>" type="text" id="fechaRegistroDel"> 
                                                            <input hidden type="text" id="cantidadDel">
                                                            <input hidden value="<?=$fecha?>" type="text" id="horaDel">
                                                            <input hidden type="text" id="idMovilDel">
                                                            <input hidden type="text" id="idLineaDel">
                                                            <input hidden type="text" id="esOrganicoDel">
                                                            <div class=" row mt-2">  
                                                                <div class="col">
                                                                    <button onclick="eliminar();" style="color:#FFFFF;" id="btnEliminar" type="button" class="btn btn-danger w-100 align-self-center font-weight-bold">Eliminar</button>
                                                                </div>    
                                                                <div class="col">
                                                                    <button data-dismiss="modal" style="color:#FFFFF;" id="btnCancelar" type="button" class="btn btn-primary w-100 align-self-center font-weight-bold">Cancelar</button>
                                                                </div>             
                                                            </div>                                                           
                                                        </form> 
                                                    </div>                                            
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fin del modal -->   
                                        <!-- Modal para edicion de datos -->
                                        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle">Actualizar Datos</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                    </div>
                                                    <div class="modal-body">                                                  
                                                        <form>                                                            
                                                            <input hidden type="text" id="itemDDetalle" name="itemDDetalle">
                                                            <label class="font-weight-bold">Ticket</label>
                                                            <input type="text" name="itemDetalle" id="itemDetalle" class="form-control input-sm">
                                                            <label class="font-weight-bold">Fecha</label>
                                                            <input type="text" name="fechaRegistro" id="fechaRegistro" class="form-control input-sm">                                                         
                                                            <label class="font-weight-bold">Cant</label>
                                                            <input type="text" name="cantidad" id="cantidad" class="form-control input-sm" disabled>
                                                            <label class="font-weight-bold">Linea</label>
                                                            <input type="text" name="idLinea" id="idLinea" class="form-control input-sm">                                                                                                                                                                                         
                                                            <div class=" row mt-4">  
                                                                <div class="col">
                                                                    <button onclick="guardar();" style="color:#FFFFF;" id="btnGuardar" type="button" class="btn btn-primary w-100 align-self-center font-weight-bold">Actualizar</button>
                                                                </div>    
                                                                <div class="col">
                                                                    <button data-dismiss="modal" style="color:#FFFFF;" id="btnCancelar" type="button" class="btn btn btn-info w-100 align-self-center font-weight-bold">Cancelar</button>
                                                                </div>             
                                                            </div>
                                                        </form> 
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!-- fin del modal -->                                                      
                                        <script>                                                        
                                            function agregaform(datos){
                                                d=datos.split('||');
                                                $('#itemDDetalle').val(d[0]);                                                                
                                                $('#itemDetalle').val(d[1]);
                                                $('#fechaRegistro').val(d[2]);    
                                                $('#cantidad').val(d[3]);                                                           
                                                $('#idLinea').val(d[4]);                                                
                                                }
                                            function agregaform2(datos2){
                                                d=datos2.split('||');
                                                $('#itemDDetalleDel').val(d[0]);
                                                $('#itemDetalleDel').val(d[1]);                                               
                                                $('#cantidadDel').val(d[2]);                                                
                                                $('#idMovilDel').val(d[3]); 
                                                $('#idLineaDel').val(d[4]); 
                                                $('#esOrganicoDel').val(d[5]); 

                                                }

                                                //Eliminar registro de gasificado
                                                function eliminar()
                                                    {
                                                        var parametros = 
                                                        {
                                                        "eliminar": "1",
                                                        "itemDDetalleDel" : $("#itemDDetalleDel").val(),
                                                        "itemDetalleDel" : $("#itemDetalleDel").val(),  
                                                        "fechaRegistroDel" : $("#fechaRegistroDel").val(), 
                                                        "cantidadDel" : $("#cantidadDel").val(), 
                                                        "horaDel" : $("#horaDel").val(), 
                                                        "idMovilDel" : $("#idMovilDel").val(),
                                                        "idLineaDel" : $("idLineaDel").val(),
                                                        "esOrganicoDel" : $("idLineaDel").val()                                                        

                                                        };
                                                        $.ajax(
                                                        {
                                                        data:  parametros,
                                                        url:   '../controllers/deleteAbastecimiento.php',
                                                        type:  'post',
                                                        beforeSend: function() 
                                                        {                                    
                                                            $('.formulario').show();                                
                                                        }, 
                                                        error: function()
                                                        {alert("Error");},
                                                        complete: function() 
                                                        {                                                           
                                                            $("#modalEliminarAbas").hide();                                                           
                                                            window.location.reload();                         
                                                        },
                                                        success:  function (mensaje) 
                                                        {$('.resultados').html(mensaje);}
                                                        })                                                        
                                                       
                                                    }
                                        </script>     
                                </tr>
                            <?php }?>                                                      
                        </tbody>
                    </table>
                </div>              
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

