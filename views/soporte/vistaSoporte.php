
<?php require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';?>
<script>
$(".menu-toggle").click(function(e) {
    e.preventDefault();
    $(".wrapper").toggleClass("toggled");
});


function cambiar(esto)
{
	vista=document.getElementById(esto).style.display;
	if (vista=='none')
		vista='block';
	else
		vista='none';

	document.getElementById(esto).style.display = vista;
}
</script>
<!-- Page Content -->
<div id="content" class="bg-grey w-100">

<section class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7">
              <h3 class="font-weight-bold mb-0">Soporte y ayuda al usuario</h3><br>          
              <h5 class="lead text-muted">Descarga aqui el manual de usuario</h5>
            </div>
            <div class="col-lg-3 col-md-4 mt-5">      
                <a class="btn btn-primary w-100 align-self-center" href="<?=base_url?>/views/assets/Manual de usuario - SISTEMA UGEL SECHURA.pdf" download="Manual_UgelSechura"><i class="fas fa-file-download"></i> Descargar </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-mix py-3">
  <div class="container">
      <div class="card rounded-1 shadow">
        <div class="card-body">
            
                
                    <div class="col-12 col-sm-12 mb-5 mt-4">
                        <div data-spy="scroll" data-target="#verticalScrollspy">
                            <div id="preg01" class="container-fluid" style="margin-top:10px">
                                <h5 class="text-primary" onclick="cambiar('01'); return false;">¿Cómo cambio mi contraseña de usuario?</h5>
                                <div id="01" style="display: none;">
                                    <p class="text-justify text-muted">Dirigirse al lado superior derecho, donde se encuentra el icono de una flecha, hacer clic y veremos 
                                    que se despliegan dos opciones, en la cual elegiremos Mi perfil. A lo que se nos mostrara la siguiente vista:</p>
                                    <div class="container mt-4">
                                        <div class="row text-center">
                                            <div class="col-md-8 text-center">
                                                <img class="text-center" src="<?=base_url?>/views/assets/img/miperfil.png" alt="" style="max-width:110%;">
                                            </div>
                                            <p class="text-justify text-muted">En esta interfaz veremos, los datos que están asociados a nuestra cuenta, los cuales son email, clave, perfil y
                                             estado (Activo), que significa que el usuario está habilitado para poder ingresar al sistema. Si queremos actualizar 
                                             los campos daremos clic en el botón superior derecho azul con icono de un lápiz. Aquí solo se podrá modificar 
                                             los campos email y clave, y dar clic en actualizar para guardas los cambios.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                    
                            </div><hr>
                            <div id="preg02" class="container-fluid">
                                <h5 class="text-primary text-muted" onclick="cambiar('02'); return false;">¿Cómo inhabilito a un usuario?</h5>
                                    <div id="02" style="display: none;">         
                                        <p class="text-justify text-muted">Para inhabilitar un usuario, dar clic en el botón rojo, 
                                        con icono de tacho de basura, en el registro que queramos inhabilitar. Solo confirmamos la advertencia y clic en eliminar.</p>
                                        <div class="container mt-4">
                                        <div class="row text-center">
                                            <div class="col-md-8 text-center">
                                                <img class="text-center" src="<?=base_url?>/views/assets/img/eliminarusuario.png" alt="" style="max-width:110%;">
                                            </div>
                                            <p class="text-justify text-muted">Otra opción es dar clic en el boton azul con icono de lápiz, sobre el registro de usuario que queremos inhabilitar.
                                             Si queremos inhabilitar el usuario, solo se debera cambiar la opcion activo a inactivo y dar clic en actualizar para guardas los cambios.</p>
                                             <div class="col-md-8 text-center">
                                                <img class="text-center" src="<?=base_url?>/views/assets/img/eliminarusuario2.png" alt="" style="max-width:110%;">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div> <hr>
                            <div id="preg03" class="container-fluid">
                                <h5 class="text-primary" onclick="cambiar('03'); return false;">¿Cómo registro a un nuevo especialista responsable?</h5>
                                <div id="03" style="display: none;">        
                                <p class="text-justify text-muted">Entrar al módulo responsables, dar clic en el botón azul Nuevo especialista, 
                                se abrirá una vista ventana emergente con un formulario para completar los datos de un especialista responsable, 
                                donde el campo celular no es obligatorio. Al completar el registro dar clic en el botón guardar.</p>
                                <div class="col-md-8 text-center">
                                    <img class="text-center" src="<?=base_url?>/views/assets/img/responsable.png" alt="" style="max-width:110%;">
                                </div>
                                </div>
                            </div> <hr>
                            <div id="preg04" class="container-fluid">
                                <h5 class="text-primary" onclick="cambiar('04'); return false;">¿Cómo registro a una II.EE?</h5>
                                <div id="04" style="display: none;"> 
                                    <p class="text-justify text-muted">Entrar al módulo colegios, dar clic en el botón azul Nuevo colegio, 
                                    se abrirá una vista ventana emergente con un formulario para completar los datos 
                                    de un colegio. Seleccionamos el distrito al que pertenece el colegio y al especialista 
                                    responsable que estará a cargo del mismo, como aviso los campos dirección y teléfono 
                                    son campos no obligatorios. Al completar el registro dar clic en el botón guardar.</p>
                                    <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/colegiosn.png" alt="" style="max-width:110%;">
                                    </div>
                                </div>
                            </div> <hr>
                            <div id="preg05" class="container-fluid">
                                <h5 class="text-primary" onclick="cambiar('05'); return false;">¿Cómo actualizo los datos de un colegio según su nivel educativo?</h5>
                                <div id="05" style="display: none;">    
                                <p class="text-justify text-muted">Ingresar al módulo colegio por nivel. Para modificar un registro, daremos clic en el botón azul con icono de lápiz en el registro
                                 el cual se quiere editar o actualizar datos.
                                A continuación, se mostrará una ventana emergente con los datos cargados del registro seleccionado, editamos los campos a criterio, 
                                que se muestran habilitados y daremos clic en actualizar.</p>
                                    <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/colxnivel.png" alt="" style="max-width:110%;">
                                    </div>
                                </div>
                            </div> <hr>
                            <div id="preg06" class="container-fluid">
                                <h5 class="text-primary" onclick="cambiar('06'); return false;">¿Cómo registro una asistencia?</h5>
                                <div id="06" style="display: none;">    
                                    <p class="text-justify text-muted">Ingresar como usuario responsable e escoger el módulo asistencias.Para registrar una asistencia dar clic en el botón 
                                    amarrillo con icono de lápiz, según el colegio por nivel educativo, al que desea registrar asistencia.</p>
                                    <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/asistencia.png" alt="" style="max-width:110%;">
                                    </div>
                                    <p class="text-justify text-muted">Se mostrará una ventana emergente con un formulario correspondiente al registro de asistencia, aquí podrá ingresar
                                     la cantidad de alumnos, según el medio de conexión a clases virtuales, como son internet, TV y radio, seguido de la fecha de registro de asistencia, 
                                     finalmente dar clic en registrar, y verificar que el registro se encuentre en la tabla inferior, llamada control de asistencias.</p>
                                </div>
                            </div> <hr>
                            <div id="preg07" class="container-fluid">
                                <h5 class="text-primary" onclick="cambiar('07'); return false;">¿Puedo modificar datos de un registro de asistencia?</h5>
                                <div id="07" style="display: none;">       
                                <p class="text-justify text-muted">Si. Dentro del módulo asistencias seleccionaremos el registro que se desea editar, 
                                dando clic en el botón verde con icono de lápiz.</p>
                                    <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/editasistencia.png" alt="" style="max-width:110%;">
                                    </div>
                                <p class="text-justify text-muted">Al dar clic se mostrará la ventana emergente con los datos cargados pertenecientes a ese 
                                registro, aquí se podrá actualizar solo los campos de cantidades de alumnos por medio de conexión a clases, mas no la fecha 
                                de registro de asistencia. Por último, clic en actualizar.</p>
                                   
                                </div>
                            </div> <hr>
                            <div id="preg08" class="container-fluid">
                                <h5 class="text-primary" onclick="cambiar('08'); return false;">¿Cómo busco reportes diarios por colegio?</span></h5>
                                <div id="08" style="display: none;">             
                                    <p class="text-justify text-muted">Ingresar al módulo reportes. En el primer apartado, escogeremos el distrito, seguido seleccionar de la lista de colegios
                                     que pertenecen a el distrito antes seleccionado, el colegio a consultar y la fecha en la cual se ha realizado un registro
                                      de asistencia. Por último, dar clic en el botón azul buscar.</p>
                                      <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/breporte.png" alt="" style="max-width:110%;">
                                    </div>
                                <p class="text-justify text-muted">Tendremos como resultado la siguiente interfaz gráfica, donde se encontrarán; el nombre del colegio,
                                 la fecha de consulta de asistencia, el responsable, los niveles encontrados de registro y la tabla donde figuran cada ítem correspondiente
                                  a los registros de asistencias.</p>
                                  <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/breporte2.png" alt="" style="max-width:110%;">
                                    </div>
                                </div>
                            </div> <hr>
                            <div id="preg09" class="container-fluid mb-5">
                                <h5 class="text-primary" onclick="cambiar('09'); return false;">¿Puedo exportar un reporte a excel?</h5>
                                <div id="09" style="display: none;">       
                                        <p class="text-justify text-muted">Ingresar al módulo reportes. En el tercer apartado,escogemos la fecha a consultar y clic en buscar. El resultado se podrá exportar 
                                        en formato Excel, para ello dar clic en el botón verde exportar..</p>
                                        <div class="col-md-8 text-center">
                                        <img class="text-center" src="<?=base_url?>/views/assets/img/rgeneral.png" alt="" style="max-width:110%;">
                                    </div>
                                </div>
                            </div> <hr>                   
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

