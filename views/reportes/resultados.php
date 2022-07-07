
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <h3 class="font-weight-bold mb-0">Reportes de asistencias</h3> <br>           
        <div class="card-deck">
            <div class="card d-inline-block shadow" style="border-radius: 15px; background-color: #bce0fb;">
                <div class="card-body text-center">
                    <img class="" src="<?=base_url?>/views/assets/img/school.png">                           
                    <h5 class="lead text-muted"><p class="font-weight-bold text-primary">Colegio:</p> <?= $cole?></h5>                    
                </div>
            </div>
            <div class="card d-inline-block shadow" style="border-radius: 15px; background-color:#d9ecf7;">
                <div class="card-body text-center">
                    <img class="" src="<?=base_url?>/views/assets/img/calendar.png">                           
                    <h5 class="lead text-muted"><p class="font-weight-bold text-primary">Fecha asistencia:</p> <?= $fecha?></h5>                      
                </div>                
            </div>
            <div class="card d-inline-block shadow" style="border-radius: 15px; background-color: #eef5fa;">
                <div class="card-body text-center">                               
                    <img class="" src="<?=base_url?>/views/assets/img/teacher.png">                          
                    <h5 class="lead text-muted"><p class="font-weight-bold text-primary">Responsable:</p> <?= $responsab?></h5>                    
                </div>                
            </div>
        </div>              
    </div>
</section>
<section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body">
                <div class="table-responsive">
                     <table class="table table-striped">
                            <h4 class="font-weight-bold text-center">Resultados</h4>
                            
                            <thead>
                                <tr>                                          
                                    <th hidden class="text-center">Colegio</th>                            
                                    <th class="text-center">Nivel</th>                               
                                    <th class="text-center"># Alumnos</th>
                                    <th class="text-center"># Asistencias</th>                                                     
                                    <th class="text-center">Por Internet</th>   
                                    <th class="text-center">Por TV</th>  
                                    <th class="text-center">Por Radio</th>    
                                    <th hidden class="text-center">Por presencial</th>  
                                    <th class="text-center">Predominante</th>   
                                    <th class="text-center"># Docentes</th>         
                                    <th class="text-center">Medio Interaccion</th>                   
                                        
                                
                                </tr>
                            </thead>                        
                            <tbody>                 
                                <?php if ($reportes){?>
                                    <?php foreach( $reportes as $key => $value ) {
                                        foreach($value as $va){ ?>                              
                                        <tr>                            
                                            <td hidden class="text-center"><?= $va['nomColegio'];?></td>                                 
                                            <td class="text-center"><?= $va['nomNivel'];?></td>                                  
                                            <td class="text-center"><?= $va['numEstudiantes'];?></td>  
                                            <td class="text-center"><?= $va['participantes'];?></td>  
                                            <td class="text-center"><?= $va['numAlumnosInternet'];?></td>
                                            <td class="text-center"><?= $va['numAlumnosTv'];?></td>
                                            <td class="text-center"><?= $va['numAlumnosRadio'];?></td>                                 
                                            <td hidden class="text-center"><?= $va['numAlumnosPresenciales'];?></td>
                                            <?php if (intval($va['numAlumnosInternet']) > intval($va['numAlumnosTv']) && intval($va['numAlumnosInternet']) > intval($va['numAlumnosRadio'])){?>  
                                                    <td class="text-center">Internet</td>
                                                <?php }elseif (intval($va['numAlumnosTv']) > intval($va['numAlumnosRadio']) && intval($va['numAlumnosTv']) >intval($va['numAlumnosInternet'])){?>  
                                                <td class="text-center">TV</td>
                                                <?php }elseif (intval($va['numAlumnosRadio']) > intval($va['numAlumnosTv']) && intval($va['numAlumnosRadio']) > intval($va['numAlumnosInternet'])){?>   
                                                        <td class="text-center">Radio</td>
                                                    <?php } else{?> 
                                                        <td class="text-center">Presencial</td>
                                                        <?php } ?> 
                                            <td class="text-center"><?= $va['numDocentes'];?></td>      
                                            <td class="text-center"><?= $va['nomMedioInteraccion'];?></td>     

                                            <?php $totalalumnos = $va['numEstudiantes'];
                                                  $numInt = $va['numAlumnosInternet'];
                                                  $numTv = $va['numAlumnosTv'];
                                                  $numRadio = $va['numAlumnosRadio'];
                                                  $numPrese = $va['numAlumnosPresenciales'];
                                                  $percentNumInt = round($numInt/$totalalumnos*100,2).'%';
                                                  $percentNumTv = round($numTv/$totalalumnos*100,2).'%';
                                                  $percentNumRadio = round($numRadio/$totalalumnos*100,2).'%';
                                                  $percentNumPrese = round($numPrese/$totalalumnos*100,2).'%';
                                                
                                            
                                            ?>       
                                                                
                                        </tr>  
                                        <section class="bg-light py-3">
                                            <div class="container"> 
                                            <h5 class="font-weight-bold text-center text-secondary"><?= $va['nomNivel'];?></h5>                                 
                                                <div class="card-deck">
                                                    <div class="card d-inline-block shadow" style="border-radius: 30px; background-color: #bce0fb;">
                                                        <div class="card-body text-center">
                                                            <img class="" src="<?=base_url?>/views/assets/img/browser.png">                           
                                                            <h5 class="font-weight-bold text-primary">Conexión por Internet: <span class="font-weight-bold text-secondary"><?php if ($reportes){echo $percentNumInt;}?></span></h5>                 
                                                        </div>
                                                    </div>
                                                    <div class="card d-inline-block shadow" style="border-radius: 30px; background-color:#d9ecf7;">
                                                        <div class="card-body text-center">
                                                            <img class="" src="<?=base_url?>/views/assets/img/television.png">                           
                                                            <h5 class="font-weight-bold text-primary">Conexión por TV: <span class="font-weight-bold text-secondary"><?php if ($reportes){echo $percentNumTv;}?></span></h5>                      
                                                        </div>                
                                                    </div>
                                                    <div class="card d-inline-block shadow" style="border-radius: 30px; background-color: #eef5fa;">
                                                        <div class="card-body text-center">                               
                                                            <img class="" src="<?=base_url?>/views/assets/img/radio.png">                          
                                                            <h5 class="font-weight-bold text-primary">Conexión por Radio: <span class="font-weight-bold text-secondary"><?php if ($reportes){echo $percentNumRadio;}?></span></h5>                    
                                                        </div>                
                                                    </div>
                                                </div>              
                                            </div>
                                        </section>
                                        <?php }                                    
                                        }?>                                                            
                            </tbody>                                               
                                <?php }                  
                                    else{?>              
                                        <div>
                                            <div class="alert alert-danger" role="alert">
                                                No hay registro de asistencia en la fecha solicitada!
                                            </div>
                                        </div>
                                        <?php } ?>      
                     </table>
                </div>              
            </div>
        </div>
    </div>
</section><br>

<br>

</div><br>
<!--FIN content-->
<?php  require_once 'views/layouts/footer.php'; ?>



   
   
