<?php require_once 'helpers/utils.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lineas | Login</title>
    <link rel="stylesheet" href="<?=base_url?>views/assets/css/bootstrap.min.css">    
    <link rel="stylesheet" href="<?=base_url?>views/assets/css/styles.css">
    <link rel='shortcut icon' type='image/x-icon' href='<?=base_url?>views/assets/img/uicon.png'/>
    <link rel='shortcut icon' type='image/x-icon' href='<?=base_url?>views/assets/img/logo_2.png'/>
</head>
<body>    
    <div class="container-fluid"> 
        <div class="row justify-content-center">
            <div class="col-md d-none d-sm-none d-md-block img-login">
                <div class="container container-login100">
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="container-login100">
                    <form class="text-center p-5" action="<?=base_url?>admin/login" method="POST" >                          
                        <div style="padding-right: var(--bs-gutter-x,.75rem);" class="mb-3 text-center">
                            <img src="<?=base_url?>/views/assets/img/Logo01.png" alt="" class="logo">                           
                        </div>                                 
                        <div class="col-xs-5">
                            <label for="email" class="form-label"> </label>                            
                            <input placeholder="Usuario" name="user" type="text" class="form-control" id="user" aria-describedby="emailHelp" required>                                                         
                        </div>                       
                        <div class="col-xs-5">
                            <label for="clave" class="form-label"></label>
                            <input placeholder="Contraseña" name="clave" type="password" class="form-control" id="clave" required>
                        </div>  
                        <div class="d-grid gap-2 col-12 mx-auto">        
                            <button style="background-color:#00559C;color: #FFFFFF;" class="btn btn-block my-4 shadow" type="submit" name="" value="">Iniciar sesión</button>
                        </div> 
                                <?php if(isset($_SESSION['error_login']) ): ?>
                                <strong class="text-center text-danger"><?=$_SESSION['error_login']?></strong>
                                <?php endif; ?>
                                <?php Utils::deleteSession('error_login'); ?>                            
                                <hr>                    
                                    
                     </form> 
                     <div class="container-fluid">
                        <div class="row mt-1">                   
                            <div class="col-md-12">
                                <span><p class="text-center text-secondary">© Saturno 2022</p></span>
                            </div>
                        </div>
                    </div>                     
                      
                </div>
            </div>              
         </div>    
    </div>

    <script src="<?=base_url?>views/assets/js/jquery-3.6.0.min.js"></script>   
    <script src="<?=base_url?>views/assets/js/popper.min.js"></script>
    <script src="<?=base_url?>views/assets/js/bootstrap.min.js"></script>
  
</body>
</html>
