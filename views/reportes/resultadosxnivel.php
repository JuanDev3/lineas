
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
                    <img class="" src="<?=base_url?>/views/assets/img/startup.png">                           
                    <h5 class="font-weight-bold text-secondary"><p class="font-weight-bold text-primary">Nivel Educativo:</p> <?= $nivelm?></h5>                    
                </div>
            </div>
            <div class="card d-inline-block shadow" style="border-radius: 15px; background-color:#d9ecf7;">
                <div class="card-body text-center">
                    <img class="" src="<?=base_url?>/views/assets/img/calendar.png">                           
                    <h5 class="font-weight-bold text-secondary"><p class="font-weight-bold text-primary">Fecha Inicio:</p> <?= $fechaIni?></h5>                      
                </div>                
            </div>
            <div class="card d-inline-block shadow" style="border-radius: 15px; background-color: #eef5fa;">
                <div class="card-body text-center">                               
                    <img class="" src="<?=base_url?>/views/assets/img/calendar.png">                          
                    <h5 class="font-weight-bold text-secondary"><p class="font-weight-bold text-primary">Fecha Fin:</p> <?= $fechaFin?></h5>                    
                </div>                
            </div>
        </div>              
    </div>
</section>
<section class=" py-3">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <p class="font-weight-bold text-center">Resultados</p>
                        <thead>
                            <tr>                            
                                                  
                                <th class="text-center">Colegio</th>                            
                                <th class="text-center">Nivel</th>      
                                <th class="text-center">Responsable</th>                          
                                <th class="text-center"># Alumnos</th>                                                                                    
                                <th class="text-center">Promedio Internet</th>   
                                <th class="text-center">Promedio TV</th>  
                                <th class="text-center">Promedio Radio</th>    
                                <th hidden class="text-center">Promedio presencial</th>  
                                <th class="text-center">Conexión Predominante</th>   
                                <th class="text-center"># Docentes</th>  
                                <th class="text-center"># Docentes Estr.</th> 
                                <th class="text-center"># Directivos</th>  
                                <th class="text-center">Gestión</th>      
                                <th class="text-center">Medio Interacción</th>                   
                                       
                               
                            </tr>
                        </thead>
                         <tbody>     
                         <?php if ($reportesxNivel){ $totalalumnos = 0;$totalDoc = 0;$totalDir = 0;?>   
                                <?php foreach( $reportesxNivel as $key => $value ) {
                                    foreach($value as $va){ ?>                              
                                <tr>
                                  
                                    <td class="text-center"><?= $va['nomColegio'];?></td>                                 
                                    <td class="text-center"><?= $va['nomNivel'];?></td> 
                                    <td class="text-center"><?= $va['nomEspecialistaResp'];?></td>                                   
                                    <td class="text-center"><?= $va['numEstudiantes'];?></td>  
                                    <td class="text-center"><?= $va['promedioInternet'];?></td>  
                                    <td class="text-center"><?= $va['promedioTv'];?></td>
                                    <td class="text-center"><?= $va['promedioRadio'];?></td>
                                    <td hidden class="text-center"><?= $va['promedioPresencial'];?></td>                                 
                                    <td hidden class="text-center"><?= $va['promedioPresencial'];?></td>
                                    <?php if (intval($va['promedioInternet']) > intval($va['promedioTv']) && intval($va['promedioInternet']) > intval($va['promedioRadio'])){?>  
                                            <td class="text-center">Internet</td>
                                        <?php }elseif (intval($va['promedioTv']) > intval($va['promedioRadio']) && intval($va['promedioTv']) >intval($va['promedioInternet'])){?>  
                                           <td class="text-center">TV</td>
                                           <?php }elseif (intval($va['promedioRadio']) > intval($va['promedioTv']) && intval($va['promedioRadio']) > intval($va['promedioInternet'])){?>   
                                                <td class="text-center">Radio</td>
                                            <?php } else{?> 
                                                <td class="text-center">Presencial</td>
                                                <?php } ?> 
                                    <td class="text-center"><?= $va['numDocentes'];?></td>   
                                    <td class="text-center"><?= $va['numDocentesEstrategia'];?></td> 
                                    <td class="text-center"><?= $va['numDirectivosEstrategia'];?></td> 
                                    <td class="text-center"><?= $va['gestion'];?></td>    
                                    <td class="text-center"><?= $va['nomMedioInteraccion'];?></td>                                                                            
                                    <?php $totalalumnos = $totalalumnos + $va['numEstudiantes']?> 
                                    <?php $totalDoc = $totalDoc + $va['numDocentes']?> 
                                    <?php $totalDir = $totalDir + $va['numDirectivosEstrategia']?> 
                                   
                                                     
                                </tr>
                                <?php }
                             }?>                              
                    <?php } else{?>  
                                <div>
                                    <div class="alert alert-danger" role="alert">
                                        No hay registro de asistencia en las fechas solicitadas!
                                    </div>
                                </div>
                        <?php } ?>         

                         </tbody>
                         <section class="bg-light py-3">
                            <div class="container">              
                                <div class="card-deck">
                                    <div class="card d-inline-block shadow" style="border-radius: 15px; background-color: #bce0fb;">
                                        <div class="card-body text-center">
                                            <img class="" src="<?=base_url?>/views/assets/img/studying.png">                           
                                            <h5 class="font-weight-bold text-primary">Total de alumnos: <span class="font-weight-bold text-secondary"><?php if ($reportesxNivel){echo $totalalumnos;}?></span></h5>
                                                                
                                        </div>
                                    </div>
                                    <div class="card d-inline-block shadow" style="border-radius: 15px; background-color:#d9ecf7;">
                                        <div class="card-body text-center">
                                            <img class="" src="<?=base_url?>/views/assets/img/teacher.png">                           
                                            <h5 class="font-weight-bold text-primary">Total docentes: <span class="font-weight-bold text-secondary"><?php if ($reportesxNivel){echo $totalDoc;}?></span></h5>                      
                                        </div>                
                                    </div>
                                    <div class="card d-inline-block shadow" style="border-radius: 15px; background-color: #eef5fa;">
                                        <div class="card-body text-center">                               
                                            <img class="" src="<?=base_url?>/views/assets/img/computer.png">                          
                                            <h5 class="font-weight-bold text-primary">Total directivos: <span class="font-weight-bold text-secondary"><?php if ($reportesxNivel){echo $totalDir;}?></span></h5>                    
                                        </div>                
                                    </div>
                                </div>              
                            </div>
                        </section><br>
                    </table>
                    
                </div>            
            </div>           
        </div>
    </div>
</section><br>


</div><br>

<!--FIN content-->



<?php  require_once 'views/layouts/footer.php'; ?>
