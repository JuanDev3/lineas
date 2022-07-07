
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>
<script type="text/javascript">
    function activar(){

        document.getElementById('email').disabled = false;
        document.getElementById('claveUser').disabled = false;
        document.getElementById('btnUpdate').disabled = false;
                    
    }
</script>
<!-- Page Content -->
<div id="content" class="bg-grey w-100">
    <section class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-7">               
                <h3 class="font-weight-bold mb-0">Cambiar contraseña </h3>   
                <h5 class="lead text-muted">Actualizar la información de mi usuario</h5>
                </div>                
            </div>
        </div>
    </section>
    <section class="bg-mix py-3">
        <div class="container">
            <div class="card rounded-1 shadow">
                <div class="card-body">
                    <a  onclick="activar()" id="id_editar" type="submit" class="float-right text_btn text-primary" >
                        <i id="id_editar"  style="font-size: 30px" class="fas fa-pen-square"></i>
                    </a><p></p><br> 
                    <form id="formulario" class="p-3" action="<?=base_url?>admin/updatePerfil" method="POST">          
                        <div class="form-row">
                            <input hidden class="form-control" type="text" name="cod" id="cod" 
                            maxlength="50" value="<?=isset($dataUserPerfil) && is_object($dataUserPerfil) ? $dataUserPerfil->codigoUser: ''; ?>" />
                                <div class="form-group col-md-4 col-12">
                                    <label class="font-weight-bold" for="email">Email</label>
                                    <input disabled class="form-control" type="email" id="email" name="email" maxlength="45"                         
                                    value="<?=isset($dataUserPerfil) && is_object($dataUserPerfil) ? $dataUserPerfil->emailUser : ''; ?>" required/>
                                </div>
                            <div class="form-group col-md-4 col-12">
                                <label class="font-weight-bold" for="claveUser">Clave</label>                                      
                                <input disabled class="form-control" type="password" id="claveUser" name="claveUser" maxlength="20"                          
                                value="<?=isset($dataUserPerfil) && is_object($dataUserPerfil) ? $dataUserPerfil->claveUser : ''; ?>" required/>						
                            </div>
                            <div class="form-group  col-md-4 col-12">
                                <label class="font-weight-bold" for="perfil">Perfil</label>                                      
                                <input class="form-control" type="text" id="perfil" name="perfil"                          
                                value="<?=isset($dataUserPerfil) && is_object($dataUserPerfil) ? $dataUserPerfil->perfilUser  : ''; ?>" disabled/>	
                            </div>  
                            
                            <input hidden class="form-control" type="text" id="codResponsable" name="codResponsable"                          
                                value="<?=isset($dataUserPerfil) && is_object($dataUserPerfil) ? $dataUserPerfil->codResponsable : ''; ?>" disabled/>
                    
                                                    
                            <div class="form-group col-md-4 col-12">
                                <label class="font-weight-bold" for="estado">Estado</label>
                                <select class="form-control" id="estado" name="estado" disabled>  
                                    <option value="1"<?=isset($dataUserPerfil) && is_object($dataUserPerfil) && $dataUserPerfil->estadoUser == "1" ? 'selected' : '';?>>Activo</option>
                                    <option value="0"<?=isset($dataUserPerfil) && is_object($dataUserPerfil) && $dataUserPerfil->estadoUser == "0" ? 'selected' : '';?>>Inactivo</option>                                        
                                </select>   						
                            </div>               
        
                        </div>
                        <div class="text-right">
                            <button disabled id="btnUpdate" type="submit" class="btn btn-primary col-md-4 col-12 align-self-center"><i class="fas fa-check-circle"></i> Actualizar</button>
                          
                        </div>
                    </form>                        
                </div>
            </div>
        </div>
                <!--START ADD NOTIFICACION-->
                <div aria-live="polite" aria-atomic="true" class=" " style="position:fixed;bottom:135px;right:10px; width:300px">
                        <div class="toast atoast" style="position: absolute; top: 0; right: 0;" data-delay="8500">

                            <div class="toast-body" data-dismiss="toast" aria-label="Close">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle text-primary fa-2x"></i>
                                    </div>
                                    <div class="col-10 text-center align-middle mt-">
                                        <span class="align-middle">Se actualizó correctamente!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--END NOTIFICACION-->
    </section>
    <section class="bg-mix py-3">
    <h1></h1>
    </section> <br>
</div>
    <script>
        function notification() {
            $(document).ready(function() {
                $('.atoast').toast('show');
            });
        };

        function enotification() {
            $(document).ready(function() {
                $('.etoast').toast('show');
            });
        };
        </script>
        <script>
            $(document).ready(function () {
            $("#formulario").bind("submit",function(){
                
                    notification(); 
                
                    
            });
        });
    </script>
<!--FIN content-->

<?php  require_once 'views/layouts/footer.php'; ?>

