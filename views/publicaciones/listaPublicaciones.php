<?php   
    require_once 'helpers/utils.php';
    require_once 'views/layouts/header.php';
?>
    <script type="text/javascript">
        function validar(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // 3
        patron =/[A-Za-z\s]/; // 4
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
        }
        function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
        
        return /\d/.test(String.fromCharCode(keynum));
        }
    </script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#publicacionesT').DataTable();
        } );
    </script>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
              <h3 class="font-weight-bold mb-0" style="color:gray">Publicaciones</h3><br>          
              <h5 class="lead text-muted text-secundary">Información de Publicaciones y su gestión</h5>
            </div>
            <div class="col-lg-3 col-md-4 d-flex mt-3 ml-1">                          
                <button style="color:#F6FBF3;" type="button" class="btn btn-warning w-100 align-self-center font-weight-bold" data-backdrop="false"
                    data-toggle="modal" data-target="#modalCreate"><i class="fas fa-user-plus"></i> Nueva Publicación</button>
                     
                    <!-- Modal para nuevo registro -->
                    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitlex" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"> Nueva Publicación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">                        
                                    <form action="<?=base_url?>publicacion/createPublicacion" method="POST">
                                        <label class="font-weight-bold">Nombre de Puesto</label>
                                        <input type="text" name="puestoCreate" id="puestoCreate" class="form-control input-sm" maxlength="45" placeholder="Cargo" required>     
                                        <label class="font-weight-bold">Cargo</label>      
                                        <select class="form-control" name="codCargo1" id="codCargo1" required> 
                                                        <option value="NULL">-- Seleccione Cargo --</option> 
                                                        <?php while ($row=$cargos->FETCH(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo $row['codCargo'] ?>"><?php echo $row['nombreCargo'] ?></option>
                                                        <?php } ?>
                                        </select>                                           
                                        <label class="font-weight-bold">Experiencia General</label>                                                                    
                                        <textarea class="form-control" name="expGeneral1" id="expGeneral1" rows="3" placeholder="Experiencia General" required></textarea>                                        
                                        <label class="font-weight-bold">Experiencia Especifica</label> 
                                        <textarea class="form-control" name="expEspec1" id="expEspec1" rows="3" placeholder="Experiencia Especifica" required></textarea>
                                        <label class="font-weight-bold">Conocimientos</label> 
                                        <textarea class="form-control" name="conocim" id="conocim" rows="3" placeholder="Conocimientos" required></textarea>   
                                        <label class="font-weight-bold">Modalidad</label>         
                                        <input type="text" name="modalidad" id="modalidad" class="form-control input-sm" maxlength="45" placeholder="Modalidad" required>  
                                        <label class="font-weight-bold">N° Vacantes</label>         
                                        <input type="text" onkeypress="return justNumbers(event);" name="numVacantes" id="numVacantes" class="form-control input-sm" placeholder="Vacantes" required>                                                 
                                        <label class="font-weight-bold">Habilidades</label>      
                                        <textarea class="form-control" name="habilid" id="habilid" rows="3" placeholder="Habilidades" required></textarea>  
                                        <label class="font-weight-bold">Planta</label>      
                                        <select class="form-control" name="codPlanta" id="codPlanta" required> 
                                                        <option value="NULL">-- Seleccione Planta --</option> 
                                                        <?php while ($row=$plantas->FETCH(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo $row['codPlanta'] ?>"><?php echo $row['nombrePlanta'] ?></option>
                                                        <?php } ?>
                                        </select>   
                                        <label class="font-weight-bold">Fecha Inicio</label>  
                                        <input type="date" name="fechaIni" id="fechaIni" class="form-control input-sm" required> 
                                        <label class="font-weight-bold">Fecha Fin</label>  
                                        <input type="date" name="fechaFin" id="fechaFin" class="form-control input-sm" required> 
                                        <div class="modal-footer">
                                            <button style="background-color:#28A745;" type="submit" class="btn btn-primary col-md-6 align-self-center"><i class="fas fa-check-circle"></i> Guardar</button>
                                        </div>                                    
                                    </form> 
                                </div>                            
                            </div>
                        </div>
                    </div>
                    <!-- fin del modal -->
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="border-bottom: 1px solid #11111126;" class="table table-striped" id="publicacionesT">
                        <thead style="border-bottom: 1px solid #11111126;">
                            <tr>                            
                                <th style="width: 10px;" class="text-center">Cod</th>            
                                <th style="width: 25px;" class="text-center">Puesto</th>                
                                <th style="width: 200px;" class="text-center">Cargo</th>   
                                <th style="width: 10px;" class="text-center">N° Vacant.</th>   
                                <th style="width: 200px;" class="text-center">Planta</th>                                                 
                                <th style="width: 10px;" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                           
                                <?php foreach( $publicaciones as $key => $value ) {
                                    foreach($value as $va){ ?>

                                <?php $datos = $va['codPublicacion']."||".                                                                                                                                                                                             
                                                $va['nomPlanta']?>
                                <tr>
                                    <td style="color:#848185;" class="text-center"><?=$va['codPublicacion'];?></td>
                                    <td style="color:#848185;" class="text-center"><?= $va['puesto'];?></td>   
                                    <td style="color:#848185;" class="text-center"><?= $va['nomCargo'];?></td>     
                                    <td style="color:#848185;" class="text-center"><?= $va['numVacantes'];?></td>  
                                    <td style="color:#848185;" class="text-center"><?= $va['nomPlanta'];?></td>   
                                   
                                    <td class="text-center">    
                                        <div style="margin-left: 1px; margin-right:1px" class="row text-center">
                                            <div class="col-6">
                                                <form action="<?=base_url?>publicacion/vistaEditar" method="POST">                                            
                                                    <input hidden type="text" id="codPubliDetalle" name="codPubliDetalle" value="<?= $va['codPublicacion'];?>"> 
                                                    <button type="submit" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>                                                                                                   
                                                </form> 
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger" data-backdrop="false" 
                                                data-toggle="modal" data-target="#modalEliminar"
                                                onclick="agregaform2('<?php echo $datos ?>')"><i class="far fa-trash-alt "></i></button> 
                                            </div>                               
                                        </div>                     
                                    </td>
                                            <!-- Modal para Eliminar datos -->
                                            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">                                                            
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <div class="modal-body">   
                                                        <div class="container mb-4 text-center">
                                                            <img src="<?=base_url?>/views/assets/img/alarma.png" alt="" class="logo">                           
                                                        </div>   
                                                        <h3>¿Está seguro de que desea borrar el registro? </h3>                                               
                                                        <form action="<?=base_url?>publicacion/deletePubli" method="POST"> 
                                                            <label hidden>COD</label>
                                                            <input hidden type="text" id="codPubliDel" name="codPubliDel">  
                                                            <div class="modal-footer">                                                                                                                     
                                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                                            </div>                                                        
                                                        </form> 
                                                    </div>                                            
                                                </div>
                                            </div>  
                                           
                                                                                            
                                            <script>                                                    
                                                function agregaform2(datos){
                                                    d=datos.split('||');
                                                    $('#codPubliDel').val(d[0]);                                                                                                 
                                                }
                                            </script>     
                                </tr>
                                <?php }
                             }?>                         
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

