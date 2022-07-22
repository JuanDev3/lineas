
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">
    <section class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                <h3 class="font-weight-bold mb-0">Reporte general de asistencias diarias</h3>       
                <h5 class="lead text-muted">Descarga aqui el reporte</h5>
                <button id="btnExport" class="btn btn-success col-md-6 align-self-center mt-2"><i class="far fa-file-excel"></i> Exportar</button> 
                </div>            
            </div>
                    
        </div>
    </section>
<div id="reporte">
    <section class="bg-mix py-3">
        <div class="container">
            <div class="card rounded-1 shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                                <h4 class="font-weight-bold text-center">Resultado general</h4>
                                
                                <thead>
                                    <tr>                                          
                                        <th class="text-center">Provincia</th>                            
                                        <th class="text-center">Distrito</th>                               
                                        <th class="text-center">Reponsable</th>
                                        <th class="text-center">Cod.Mod.</th>                                                     
                                        <th class="text-center">II.EE</th>   
                                        <th class="text-center">Nivel</th>  
                                        <th class="text-center">Gestion</th>    
                                        <th class="text-center"># Estudiantes</th>  
                                        <th class="text-center"># Est.Participantes</th>   
                                        <th class="text-center">% Est.Participantes</th>         
                                        <th class="text-center">#Docentes</th>     
                                        <th class="text-center">#Docentes Est.</th>     
                                        <th class="text-center">% Docentes Est.</th>     
                                        <th class="text-center">#Directivos</th>     
                                        <th class="text-center">Medio Predominante</th>    
                                        <th class="text-center">Por Internet</th>   
                                        <th class="text-center">Por TV</th>  
                                        <th class="text-center">Por Radio</th>    
                                        <th hidden class="text-center">Por presencial</th>  
                                        <th class="text-center">Medio de Interacción</th>                              
                                    
                                    </tr>
                                </thead>                        
                                <tbody>                 
                                    <?php if ($reportesGeneralDiario){ 
                                                $totalInternet=0;$totalTv=0; $totalRadio=0;                                           
                                        ?>
                                        <?php foreach( $reportesGeneralDiario as $key => $value ) {
                                            foreach($value as $va){ ?>                              
                                            <tr>                            
                                                <td class="text-center"><?= $va['nomProvincia'];?></td>                                 
                                                <td class="text-center"><?= $va['nomDistrito'];?></td>                                  
                                                <td class="text-center"><?= $va['responsable'];?></td>  
                                                <td class="text-center"><?= $va['codModular'];?></td>  
                                                <td class="text-center"><?= $va['nomColegio'];?></td>
                                                <td class="text-center"><?= $va['nomNivel'];?></td>
                                                <td class="text-center"><?= $va['gestion'];?></td>                                 
                                                <td class="text-center"><?= $va['numEstudiantes'];?></td>                                            
                                                <td class="text-center"><?= $va['participantes'];?></td>      
                                                <td class="text-center"><?= ROUND($va['porcentParticipantes'],2).'%';?></td>
                                                <td class="text-center"><?= $va['numDocentes'];?></td>
                                                <td class="text-center"><?= $va['numDocentesEstrategia'];?></td>
                                                <td class="text-center"><?= ROUND($va['porcentDocentEstra'],2).'%';?></td>                                 
                                                <td class="text-center"><?= $va['numDirectivosEstrategia'];?></td>                                            
                                                <?php if (intval($va['numAlumnosInternet']) > intval($va['numAlumnosTv']) && intval($va['numAlumnosInternet']) > intval($va['numAlumnosRadio'])){?>  
                                                        <td class="text-center">Internet</td>
                                                    <?php }elseif (intval($va['numAlumnosTv']) > intval($va['numAlumnosRadio']) && intval($va['numAlumnosTv']) >intval($va['numAlumnosInternet'])){?>  
                                                    <td class="text-center">TV</td>
                                                    <?php }elseif (intval($va['numAlumnosRadio']) > intval($va['numAlumnosTv']) && intval($va['numAlumnosRadio']) > intval($va['numAlumnosInternet'])){?>   
                                                            <td class="text-center">Radio</td>
                                                        <?php } else{?> 
                                                            <td class="text-center">Presencial</td>
                                                            <?php } ?> 
                                                <td class="text-center"><?= $va['numAlumnosInternet'];?></td>      
                                                <td class="text-center"><?= $va['numAlumnosTv'];?></td>
                                                <td class="text-center"><?= $va['numAlumnosRadio'];?></td>
                                                <td hidden class="text-center"><?= $va['numAlumnosPresenciales'];?></td>
                                                <td class="text-center"><?= $va['nomMedioInteraccion'];?></td>

                                                <?php $totalInternet = $totalInternet + $va['numAlumnosInternet']?> 
                                                <?php $totalTv = $totalTv + $va['numAlumnosTv']?> 
                                                <?php $totalRadio = $totalRadio + $va['numAlumnosRadio']?> 
                        
                                            </tr>  
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
    <section class="bg-mix py-3">
        <div class="container">
            <div class="card rounded-1 shadow">
                <div class="card-body">
                    <div class="table-responsive"><hr>
                        <table class="table table-striped">
                                <h4 class="font-weight-bold text-center">Resultados de cuadro de consolidados por niveles</h4>
                                
                                <thead>
                                    <tr>                              
                                        <th class="text-center">Nivel</th>  
                                        <th class="text-center">Total II.EE</th>    
                                        <th class="text-center">Total Estudiantes</th>  
                                        <th class="text-center">Total Est.Participantes</th>   
                                        <th class="text-center">% Total Est.Participantes</th>         
                                        <th class="text-center">Total docentes</th>     
                                        <th class="text-center">Total Docentes Est.</th>     
                                        <th class="text-center">% Total Docentes Est.</th>     
                                        <th class="text-center">Total Directivos</th>                               
                                    </tr>
                                </thead>                        
                                <tbody>                 
                                    <?php if ($reportesConsolidadoDiario){
                                                $totalColegios = 0;
                                                $totalalum = 0;
                                                $totalalumpart = 0;
                                                $porcentotalalumpart=0;
                                                $totalDoc = 0;
                                                $totalDocEst = 0;
                                                $porctotalDocEst = 0;
                                                $totalDir = 0;
                                        ?>
                                        <?php foreach($reportesConsolidadoDiario as $key2 => $value2 ) {
                                            foreach($value2 as $va2){ ?>                              
                                            <tr>                            
                                                
                                                <td class="text-center"><?= $va2['nomNivel'];?></td>
                                                <td class="text-center"><?= $va2['totalcolegios'];?></td>                                 
                                                <td class="text-center"><?= $va2['totalalumnos'];?></td>                                            
                                                <td class="text-center"><?= $va2['participantes'];?></td>      
                                                <td class="text-center"><?= ROUND($va2['porcentParticipantes'],2).'%';?></td>
                                                <td class="text-center"><?= $va2['totalDocentes'];?></td>
                                                <td class="text-center"><?= $va2['totalDocEst'];?></td>
                                                <td class="text-center"><?= ROUND($va2['porcentDocentEstra'],2).'%';?></td>                                 
                                                <td class="text-center"><?= $va2['totalDirectivos'];?></td>  

                                                <?php $totalColegios = $totalColegios + $va2['totalcolegios']?> 
                                                <?php $totalalum = $totalalum + $va2['totalalumnos']?> 
                                                <?php $totalalumpart = $totalalumpart + $va2['participantes']?> 
                                                <?php $porcentotalalumpart = ($totalalumpart*100)/$totalalum?> 
                                                <?php $totalDoc = $totalDoc + $va2['totalDocentes']?> 
                                                <?php $totalDocEst = $totalDocEst + $va2['totalDocEst']?> 
                                                <?php $porctotalDocEst = ($totalDocEst *100)/$totalDoc?> 
                                                <?php $totalDir = $totalDir + $va2['totalDirectivos']?>  
                                                                                                                                            
                                                                    
                                            </tr>  
                                            <?php }                                    
                                            }?>   
                                                <td class="text-center font-weight-bold">TOTAL</td>                        
                                                <td class="text-center font-weight-bold"><?=$totalColegios;?></td>
                                                <td class="text-center font-weight-bold"><?=$totalalum;?></td>                                 
                                                <td class="text-center font-weight-bold"><?=$totalalumpart;?></td>                                            
                                                <td class="text-center font-weight-bold"><?= ROUND($porcentotalalumpart,2).'%';?></td>      
                                                <td class="text-center font-weight-bold"><?= $totalDoc;?></td>
                                                <td class="text-center font-weight-bold"><?= $totalDocEst;?></td>                                   
                                                <td class="text-center font-weight-bold"><?= ROUND($porctotalDocEst).'%';?></td>                                 
                                                <td class="text-center font-weight-bold"><?= $totalDir;?></td>  

                                        
                                                <table class="table table-striped"><br> <hr>
                                                    <h5 class="font-weight-bold text-center">Medio utilizado por alumnos participantes</h5>                            
                                                    <thead>
                                                        <tr>                                          
                                                            <th class="text-center">Total de II.EE</th> 
                                                            <th class="text-center">Total de alumnos Participantes</th> 
                                                            <th class="text-center">Total Conexión por Internet</th>  
                                                            <th class="text-center">Total Conexión por TV</th>  
                                                            <th class="text-center">Total Conexión por Radio</th>     
                                                        </tr>
                                                    </thead>
                                                    <tbody>   
                                                        <td class="text-center"><?= $totalColegios;?></td> 
                                                        <td class="text-center"><?= $totalalumpart;?></td> 
                                                        <td class="text-center"><?= $totalInternet.' / '.ROUND($totalInternet*100/$totalalumpart).'%';?></td> 
                                                        <td class="text-center"><?= $totalTv.' / '.ROUND($totalTv*100/$totalalumpart).'%';?></td> 
                                                        <td class="text-center"><?= $totalRadio.' / '.ROUND($totalRadio*100/$totalalumpart).'%';?></td> 
                                                        
                                                    </tbody>
                                                    
                                            </table>                                                            
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
    </section><br><br><br>
    </div>
</div><br>
<!--FIN content-->
<?php  require_once 'views/layouts/footer.php'; ?>

<script type="text/javascript">
    $("#btnExport").click(function(e) {
    let file = new Blob([$('#reporte').html()], {type:"application/vnd.ms-excel"});
    let url = URL.createObjectURL(file);
    let a = $("<a />", {
    href: url,
    download: "reporte_asistencias.xls"}).appendTo("body").get(0).click();
    e.preventDefault();
    });
</script>

   
   
