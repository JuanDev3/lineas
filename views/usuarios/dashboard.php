<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>
<!-- Page Content -->
<div id="content" class="bg-grey w-100">
<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">              
              <h2 class="font-weight-bold text-primary">Bolt <b class="font-weight-bold text-secondary">| Modulos</b>  </h2>                                         
            </div>
            <div class="col-lg-9 col-md-8">
              <h4 class="text-left text-secondary">Usuario: <?= $_SESSION["usuario"] ?></h4>  
            </div>
        </div>
    </div>
</section>
<section class="bg-mix">
  <div class="container">
      <div class="card rounded-0 shadow">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto text-center">
                      <form action="<?=base_url?>gasificado/viewGasificado" method="POST"> 
                          <button class="btn btn-outline-primary" type="submit">
                            <img src="<?=base_url?>/views/assets/img/tubo.png"/> 
                          </button><br><br>    
                      </form> 
                          <h6 class="text-secondary font-weight-bold">INGRESO/SALIDA A GASIFICADO </h6>
                      </div>
                  </div>                                
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto text-center">
                        <form action="<?=base_url?>abastecimiento/viewAbastecimiento" method="POST"> 
                          <button class="btn btn-outline-primary" type="submit">
                          <img src="<?=base_url?>/views/assets/img/procesando.png"/> 
                          </button><br><br>      
                        </form>                
                          <h6 class="text-secondary font-weight-bold">ABASTECIMIENTO LINEA PROCESO</h6>
                      </div>
                  </div>   
              </div>              
          </div>
      </div>
  </div>
</section>
<section class=" py-3"> <br>
    <div class="col-md-12 mt-0">
        <p class="font-weight-bold text-center text-secondary">© Saturno 2022</p>
    </div>
</section>
<section class=" py-3"> <br>   
</section>
</div>

<!--FIN content-->

<?php  require_once 'views/layouts/footer.php'; ?>

