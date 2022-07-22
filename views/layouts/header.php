<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url?>views/assets/bundles/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url?>views/assets/jquery.dataTables.min.css">    
    <!-- Styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=base_url?>views/assets/css/styles.css">
    <script src="<?=base_url?>views/assets/js/jquery-3.6.0.min.js"></script>  
    <script src="<?=base_url?>views/assets/bundles/jquery/jquery.min.js"></script>     
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">
    <!-- Ionic icons -->        
    <link rel="stylesheet" href="<?=base_url?>views/assets/icons/css/all.css">
    <link rel='shortcut icon' type='image/x-icon' href='<?=base_url?>views/assets/img/GOGUITO.png'/>
    <title>Bolt | Saturno </title>
</head>
<body>   
    <div class="d-flex" id="content-wrapper">
        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h5 mt-2> <a class="text-light font-weight-bold mb-0 text-center" href="<?= base_url ?>admin/dashboard"><i class="fas fa-fire"> </i> Sistema Bolt</a> </h5>               
            </div>           
            <div class="menu">                      
                <a href="<?= base_url ?>gasificado/listRegistroGasificado" class="d-block text-light p-3 border-0"><i class="fas fa-list lead mr-1"></i>
                    Registro Gasificado</a>  
                <a href="<?= base_url ?>abastecimiento/listRegistroAbastecimiento" class="d-block text-light p-3 border-0"><i class="fas fa-list lead mr-1"></i>
                    Registro Abastecimiento</a>                                
            </div>                    
        </div>
        <!-- Fin sidebar -->
        <!-- Page  -->
        <div id="page-content-wrapper" class="w-100 bg-light-blue">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow">
                <div class="container">
                    <a class="text-primary" id="menu-toggle"><i class="fas fa-bars"></i></a>   
                        <img src="<?=base_url?>views/assets/img/nav2.png" alt="" style="max-width:70%;" class="text-center">              
                    <div class=" text-right float-right">   
                        <?php //if ( $_SESSION["usuario"]  == 'admin') { ?>                                                     
                        <li class="nav-item dropdown text-right float-right" style="list-style:none;">
                            <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                                                  
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a disabled class="dropdown-item" href="<?= base_url?>admin/dashboard" ><i class="fas fa-user"></i>  Mi perfil</a>                                 
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url ?>/admin/logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Salir</a>
                            </div>
                        </li>
                        <?php //} ?>                     
                    </div>
                </div>
            </nav>
            <!-- Fin Navbar -->