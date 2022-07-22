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
        function activar(){
            document.getElementById('puestoUpd').disabled = false;
            document.getElementById('expGenUpd').disabled = false;
            document.getElementById('expEspUpd').disabled = false;            
            document.getElementById('conociUpd').disabled = false;
            document.getElementById('habilUpd').disabled = false;
            document.getElementById('modalUpd').disabled = false;
            document.getElementById('vacanUpd').disabled = false;
            document.getElementById('fechaiUpd').disabled = false;
            document.getElementById('fechafUpd').disabled = false;
            document.getElementById('btnUpdate').disabled = false;                        
        }
    </script>

<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
              <h3 class="font-weight-bold mb-0" style="color:gray">Publicación: </h3><br>          
              <h5 class="lead text-muted text-secundary">Información de Publicación</h5>
            </div>            
        </div>
    </div>
</section>

<section class="bg-mix py-3">
    <div class="container">
        <div class="card rounded-1 shadow">
            <div class="card-body">
                    <a  onclick="activar()" id="id_editar" type="submit" class="float-right text_btn text-warning" >
                        <i id="id_editar" style="font-size: 30px" class="fas fa-pen-square"></i>
                    </a><p></p><br> 
                <form id="formulario" class="p-3" action="<?=base_url?>publicacion/updatePublic" method="POST">  
                    <div class="row">
                        <div hidden class="form-group col-md-4 col-12">                            
                            <input type="text" name="codPublUpd" id="codPublUpd" class="form-control input-sm" value="<?= $codPublis;?>">
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold" for="puestoUpd">Puesto</label>
                            <input type="text" name="puestoUpd" id="puestoUpd" class="form-control input-sm" value="<?= $puesto;?>" disabled>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">Cargo</label>
                            <input type="text" class="form-control input-sm" value="<?= $nomCargo;?>" disabled>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">Área</label>
                            <input type="text" class="form-control input-sm" value="<?= $nomArea;?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label class="font-weight-bold">Experiencia General</label>
                            <textarea type="text" class="form-control" name="expGenUpd" id="expGenUpd" rows="3" disabled><?= $expGene;?></textarea>                            
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label class="font-weight-bold">Experiencia Específica</label>
                            <textarea type="text" class="form-control" name="expEspUpd" id="expEspUpd" rows="3" disabled><?= $expEsp;?></textarea>     
                        </div>                                             
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label class="font-weight-bold">Conocimientos</label>
                            <textarea type="text" class="form-control" name="conociUpd" id="conociUpd" rows="3" disabled><?= $conocim;?></textarea>
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label class="font-weight-bold">Habilidades</label>
                            <textarea type="text" class="form-control" name="habilUpd" id="habilUpd" rows="3" disabled><?= $habil;?></textarea>
                        </div>                                             
                    </div>
                    <div class="row">                       
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">Modalidad</label>
                            <input type="text" name="modalUpd" id="modalUpd" class="form-control input-sm" value="<?= $modalid;?>" disabled>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">N° Vacantes</label>
                            <input type="text" name="vacanUpd" id="vacanUpd" class="form-control input-sm" value="<?= $numVacan;?>" disabled>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">Planta</label>
                            <input type="text" class="form-control input-sm" value="<?= $nomPlanta;?>" disabled>
                        </div>
                    </div>
                    <div class="row">                       
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">Fecha Inicio</label>
                            <input type="date" name="fechaiUpd" id="fechaiUpd" class="form-control input-sm" value="<?= $fechaIni;?>" disabled>
                        </div>
                        <div class="form-group col-md-4 col-12">
                            <label class="font-weight-bold">Fecha Fin</label>
                            <input type="date" name="fechafUpd" id="fechafUpd" class="form-control input-sm" value="<?= $fechaFin;?>" disabled>
                        </div>                        
                    </div>
                    <div class="text-right">
                        <button disabled id="btnUpdate" type="submit" class="btn btn-warning col-md-4 col-12 align-self-center"><i class="fas fa-check-circle"></i> Actualizar</button>
                    </div>
                </form>
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

