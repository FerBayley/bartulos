<!-- jQuery --> 
<script src="bower_components/jquery/dist/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script> 
<!-- Metis Menu Plugin JavaScript --> 
<script src="bower_components/metisMenu/dist/metisMenu.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="dist/js/sb-admin-2.js"></script>
<script src="dist/js/ajax.js"></script>

<script src="bower_components/datepicker/js/bootstrap-datepicker.js"></script>
<script src="bower_components/datepicker/locales/bootstrap-datepicker.es.min.js"></script>

<script>
$(document).ready(function () {
   $('#fecha').datepicker({
   format: "dd-mm-yyyy",
    language: "es"
	});
   $('#fecha_desde').datepicker({
   format: "dd-mm-yyyy",
    language: "es"
	});	
   $('#fecha_hasta').datepicker({
   format: "dd-mm-yyyy",
    language: "es"
	});		
	$('[data-toggle="tooltip"]').tooltip(); 
});
</script>