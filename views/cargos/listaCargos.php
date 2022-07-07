
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>
        <script type="text/javascript">
                        function validar(e) { // 1
                        tecla = (document.all) ? e.keyCode : e.which; // 2
                        if (tecla==8) return true; // 3
                        patron =/[A-Za-z\s]/; // 4
                        te = String.fromCharCode(tecla); // 5
                        return patron.test(te); // 6
                        }


        </script>
        <script type="text/javascript">
            $(document).ready( function () {
                $('#usert').DataTable();
            } );
        </script>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
              <h3 class="font-weight-bold mb-0" style="color:gray">Cargos</h3><br>          
              <h5 class="lead text-muted text-secundary">Información de Cargos y su gestión</h5>
            </div>
            <div class="col-lg-3 col-md-4 d-flex mt-3 ml-1">                          
                <button style="color:#F6FBF3;" type="button" class="btn btn-warning w-100 align-self-center font-weight-bold" data-backdrop="false"
                    data-toggle="modal" data-target="#modalCreate"><i class="fas fa-user-plus"></i> Nuevo Cargo</button>
                     
                    <!-- Modal para nuevo registro -->
                    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitlex" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="exampleModalLongTitle"> Nuevo Cargo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">                        
                                    <form action="<?=base_url?>cargo/createCargo" method="POST">
                                        <label class="font-weight-bold">Nombre de Cargo</label>
                                        <input type="text" name="cargoCreate" id="cargoCreate" class="form-control input-sm" maxlength="45" placeholder="Cargo" required>     
                                        <label class="font-weight-bold">Área</label>      
                                        <select class="form-control" name="codArea1" id="codArea1" required> 
                                                        <option value="NULL">-- Seleccione Área --</option> 
                                                        <?php while ($row=$areas->FETCH(PDO::FETCH_ASSOC)) { ?>
                                                        <option value="<?php echo $row['codArea'] ?>"><?php echo $row['nombreArea'] ?></option>
                                                        <?php } ?>
                                        </select>                                                     
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
                    <table style="border-bottom: 1px solid #11111126;" class="table table-striped" id="usert">
                        <thead style="border-bottom: 1px solid #11111126;">
                            <tr>                            
                                <th class="text-center">Cod</th>                           
                                <th class="text-center">Cargo</th>   
                                <th class="text-center">Área</th>                                                 
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                           
                                <?php foreach( $cargos as $key => $value ) {
                                    foreach($value as $va){ ?>

                                <?php $datos = $va['codCargo']."||". 
                                                $va['nombreCargo']."||".                                                                                                                             
                                                $va['areaNom']; ?>
                                <tr>
                                    <td style="color:#848185;" class="text-center"><?=$va['codCargo'];?></td>
                                    <td style="color:#848185;" class="text-center"><?= $va['nombreCargo'];?></td>   
                                    <td style="color:#848185;" class="text-center"><?= $va['areaNom'];?></td>     
                                   
                                    <td class="text-center">                                        
                                        <button style="background-color:#257BB5;" class="btn btn-primary" data-backdrop="false"
                                            data-toggle="modal" data-target="#modalEdicion"
                                             onclick="agregaform('<?php echo $datos ?>')"><i class="fas fa-pencil-alt"></i></button>
                                        <button class="btn btn-danger" data-backdrop="false" 
                                            data-toggle="modal" data-target="#modalEliminar"
                                             onclick="agregaform2('<?php echo $datos ?>')"><i class="far fa-trash-alt "></i></button>                           
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
                                                        <form action="<?=base_url?>cargo/deleteCargo" method="POST"> 
                                                            <label hidden>COD</label>
                                                            <input hidden type="text" id="codCargo2" name="codCargo2">  
                                                            <div class="modal-footer">                                                                                                                     
                                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
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
                                                            <form action="<?=base_url?>cargo/updateCargo" method="POST"> 
                                                                <label hidden>COD</label>
                                                                <input hidden type="text" id="codCargo1" name="codCargo1">
                                                                <label class="font-weight-bold">Cargo</label>
                                                                <input type="text" name="cargoName1" id="cargoName1" class="form-control input-sm">
                                                                
                                                                <div class="modal-footer">
                                                                    <button style="background-color:#28A745;" type="submit" class="btn btn-primary col-md-6 align-self-center"><i class="fas fa-check-circle"></i> Actualizar</button>
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
                                                    $('#codCargo1').val(d[0]);                                                                
                                                    $('#cargoName1').val(d[1]);                                                   
                                                }
                                                function agregaform2(datos){
                                                    d=datos.split('||');
                                                    $('#codCargo2').val(d[0]);                                                                                                 
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

