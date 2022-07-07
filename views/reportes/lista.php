
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>

    <script type="text/javascript">
    $(document).ready(function(){
        $("#distrito").change(function(){
            $("#distrito option:selected").each(function(){
            codDistrito=$(this).val();
            $.post("<?= base_url ?>/controllers/getColegio.php",{codDistrito:codDistrito
            },function(data){
                $("#cbx-Colegio").html(data);
            });
            });

        });
        });
    </script>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">
    <section class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-7">
                <h3 class="font-weight-bold mb-0">Reportes de asistencias</h3>                      
                <h5 class="lead text-muted">Filtra reportes por colegios según el distrito y fecha de asistencia</h5> 
                </div>     
            </div>  
        </div>
    </section>
    <section class="bg-light py-3"> 
        <div class="container">
            <div class="card rounded-1 shadow">
                <div class="card-body">
                <h6 class="font-weight-bold mb-2">Reporte diario por colegios</h6>
                    <form action="<?=base_url?>reporte/buscarReporte" method="POST"> 
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">      
                                <label class="font-weight-bold" for="distrito">Distrito</label> 
                                <select class="form-control" name="distrito" id="distrito" > 
                                    <option value="NULL">-- Seleccione distrito--</option> 
                                    <?php while ($row=$distrito->FETCH(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $row['codDistrito'] ?>"><?php echo $row['nomDistrito'] ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                    <label class="font-weight-bold" for="cbx-Colegio">Colegio :</label>
                                    <select name="cbx-Colegio" id="cbx-Colegio" class="cont form-control font-italic" required>
                                    </select>       
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                    <label class="font-weight-bold" for="fecha">Fecha :</label>
                                    <input type="date" name="fecha" id="fecha" class="cont form-control font-italic" required>                    
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3 mt-4">
                            
                                <button type="submit" class="btn btn-primary col-md-6 align-self-center mt-2"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-3"> 
        <div class="container">
            <div class="card rounded-1 shadow">
                <div class="card-body">
                <h6 class="font-weight-bold mb-2">Reporte por niveles educativos</h6>
                    <form action="<?=base_url?>reporte/buscarReportexNivel" method="POST"> 
                        <div class="row">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">      
                                <label class="font-weight-bold" for="nivelEdu">Nivel educativo</label> 
                                <select class="form-control" name="nivelEdu" id="nivelEdu" > 
                                    <option value="NULL">-- Seleccione Nivel--</option> 
                                    <?php while ($row2=$niveles->FETCH(PDO::FETCH_ASSOC)) { ?>
                                    <option value="<?php echo $row2['codNivel'] ?>"><?php echo $row2['nomNivel'] ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">                                   
                                    <label class="font-weight-bold" for="fechaIni">Fecha Inicio :</label>
                                    <input type="date" name="fechaIni" id="fechaIni" class="cont form-control font-italic" required>      
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3">
                                    <label class="font-weight-bold" for="fechaFin">Fecha Fin :</label>
                                    <input type="date" name="fechaFin" id="fechaFin" class="cont form-control font-italic" required>                    
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-3 mt-4">
                            
                                <button type="submit" class="btn btn-primary col-md-6 align-self-center mt-2"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light py-3"> 
        <div class="container">
            <div class="card rounded-1 shadow">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-2">Reporte general diario</h6>
                    <div class="row">  
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <form action="<?=base_url?>reporte/buscarReporteGeneralDiario" method="POST"> 
                                <div class="row">  
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-7">                                   
                                        <label class="font-weight-bold" for="fechaConsulta">Fecha consulta :</label>
                                        <input type="date" name="fechaConsulta" id="fechaConsulta" class="cont form-control font-italic" required>      
                                    </div>                   
                                    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-4">                            
                                        <button type="submit" class="btn btn-primary col-md-10  align-self-center mt-2"><i class="fas fa-search"></i> Buscar</button>
                                    </div>
                                    
                                </div>
                            </form> 
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                           
                        </div>
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

