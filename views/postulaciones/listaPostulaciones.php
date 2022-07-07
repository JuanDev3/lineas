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
              <h3 class="font-weight-bold mb-0" style="color:gray">Solicitud de Postulaciones</h3><br>          
              <h5 class="lead text-muted text-secundary">Información de Postulaciones</h5>
            </div>
            <div class="col-lg-3 col-md-4 d-flex mt-3 ml-1">                          
                
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
                                <th class="text-center">Cod</th>            
                                <th class="text-center">Postulante</th>                
                                <th class="text-center">Tel.</th>   
                                <th class="text-center">Email</th>   
                                <th class="text-center">Prof.</th>     
                                <th class="text-center">Cargo</th>   
                                <th class="text-center">CV</th>                                                 
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                           
                                <?php foreach( $postulaciones as $key => $value ) {
                                    foreach($value as $va){ ?>

                                <?php $datos = $va['codPostulante']."||".                                                                                                                                                                                            
                                                $va['codPubli']?>
                                <tr>
                                    <td style="color:#848185;" class="text-center"><?= $va['codPostulante'];?></td>
                                    <td style="color:#848185;" class="text-center"><?= $va['postulante'];?></td>                                     
                                    <td style="color:#848185;" class="text-center"><?= $va['telefono'];?></td>  
                                    <td style="color:#848185;" class="text-center"><?= $va['email'];?></td>  
                                    <td style="color:#848185;" class="text-center"><?= $va['profesion'];?></td> 
                                    <td style="color:#848185;" class="text-center"><?= $va['cargo'];?></td> 
                                    <td style="color:#848185;" class="text-center"><?= $va['cv'];?></td>  
                                   
                                    <td class="text-center">                                        
                                    <a style="background-color:#28A745;" class="btn btn-primary" href="<?=base_url2?>uploads/<?= $va['cv'];?>" download="<?= $va['postulante'];?>" target="_blank"><i class="fas fa-download"></i></a>
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
                                                        <form action="<?=base_url?>publicacion/deletePublicacion" method="POST"> 
                                                            <label hidden>COD</label>
                                                            <input hidden type="text" id="codPubliDel" name="codPubliDel">  
                                                            <div class="modal-footer">                                                                                                                     
                                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                                            </div>                                                        
                                                        </form> 
                                                    </div>                                            
                                                </div>
                                            </div>  
                                            </div>                          
                                            <!-- fin del modal -->  
                                                                                               
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

