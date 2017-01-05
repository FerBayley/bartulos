<?php
include_once("inc/config.php");
include_once("inc/seguridad.php");
$pagina = "marcas.php";
$tabla = "bar_marcas";
$titulo = "Marcas";
switch ($action) {
	case "edit":
  		$titulo_sub = "Editar";	
  		$rs_info = editar($tabla, $id, $con);
  		break;
  	case  "add":
  		$titulo_sub = "Nuevo";	
  		break;	
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("inc/head.php")?>
<body>
<div id="wrapper">
  <?php include("inc/nav.php") ?>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><?php echo $titulo?></h1>
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> <?php echo $titulo_sub?></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form role="form" action="<?php echo $pagina?>" method="post"  enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $rs_info->fields['nombre']?>" required>
                      </div>
                    <button class="btn btn-primary">Guardar</button>
                    <a href="<?php echo $pagina?>" class="btn btn-primary">Volver</a>
                    <input name="action" type="hidden" id="action" value="<?php echo $action?>" />
                    <input name="id" type="hidden" id="id" value="<?php echo $rs_info->fields['id']?>" />
                </form>
              </div>
            </div>
            <!-- /.row (nested) --> 
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
      <!-- /.col-lg-12 --> 
    </div>
    <!-- /.row --> 
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper -->
<?php include("inc/js.php")?>
</body>
</html>
