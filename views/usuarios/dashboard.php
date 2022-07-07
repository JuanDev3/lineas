
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
              <h1 class="font-weight-bold mb-0 text-secondary">Bolsa de trabajo Dominus</h1>
              <h4 class="text-left text-secondary">Usuario: <?= $_SESSION["usuario"] ?></h4>                         
              <p class="lead text-muted">Revisa la última información</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">
  <div class="container">
      <div class="card rounded-0 shadow">
          <div class="card-body">
              <div class="row">
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto">
                          <h6 class="text-muted">N° Convocatorias</h6>                         
                          <h6 class="text-secondary"><i class="icon ion-md-arrow-dropup-circle"></i> <?= $_SESSION["totalP"]; ?></h6>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-6 d-flex stat my-3">
                      <div class="mx-auto">
                          <h6 class="text-muted">N° Postulantes </h6>                         
                          <h6 class="text-secondary"><i class="icon ion-md-arrow-dropup-circle"></i> <?= $cantPostulantes; ?></h6>
                      </div>
                  </div>                  
                  
              </div>
          </div>
      </div>
  </div>
</section>
<!--
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 my-3">
                <div class="card rounded-0">
                    <div class="card-header bg-light">
                      <h6 class="font-weight-bold mb-0">Asistencias por mes</h6>
                    </div>
                    <div class="card-body">
                      <canvas id="myChart" width="300" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-3">
              <div class="card rounded-0">
                  <div class="card-header bg-light">
                      <h6 class="font-weight-bold mb-0">Medios recientes</h6>
                  </div>
                  <div class="card-body pt-2">
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="far fa-bell"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">3 874</h6><span class="badge badge-primary ml-2">18.98 %</span>
                            <small class="d-block text-muted">Internet</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="far fa-bell"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">16 041</h6><span class="badge badge-primary ml-2">78.58 % </span>
                            <small class="d-block text-muted">Televisión</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="far fa-bell"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">498</h6><span class="badge badge-primary ml-2">2.44 % </span>
                            <small class="d-block text-muted">Radio</small>
                          </div>
                      </div>
                      <div class="d-flex border-bottom py-2">
                          <div class="d-flex mr-3">
                            <h2 class="align-self-center mb-0"><i class="far fa-bell"></i></h2>
                          </div>
                          <div class="align-self-center">
                            <h6 class="d-inline-block mb-0">0</h6><span class="badge badge-primary ml-2"> 0%</span>
                            <small class="d-block text-muted">Presencial</small>
                          </div>
                      </div>

                      <button class="btn btn-primary w-100">Ver todas</button>
                  </div>
              </div>
            </div>
        </div>
    </div>

</section>
-->
<section class=" py-3"> <br>
    <div class="col-md-12 mt-4 ">
        <p class="font-weight-bold text-center text-secondary">© Dominus 2021 - Todos los derechos reservados.</p>
    </div>
</section>
<section class=" py-3"> <br>
   
</section>
</div>

<!--FIN content-->

<?php  require_once 'views/layouts/footer.php'; ?>

