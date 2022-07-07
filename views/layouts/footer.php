</div>
        <!-- Fin page -->
        
</div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url?>views/assets/js/jquery-3.6.0.min.js"></script>  
    <script src="<?=base_url?>views/assets/bundles/jquery/jquery.min.js"></script>  
    <script src="<?=base_url?>views/assets/bundles/bootstrap/js/bootstrap.min.js"></script>
   <!-- JS Libraies -->  
   <script src="<?=base_url?>views/assets/jquery.dataTables.min.js"></script>
   <script src="<?=base_url?>views/assets/js/popper.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>
     
<script type="text/javascript">
    // Abrir / cerrar menu 

 $("#menu-toggle").click(function (e) {
   e.preventDefault();
   $("#content-wrapper").toggleClass("toggled");
 });

</script>
</html>