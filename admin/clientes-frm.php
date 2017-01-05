<?php
include_once("inc/config.php");
include_once("inc/seguridad.php");
$pagina = "clientes.php?menu=".$menu;
$tabla = "bar_clientes";
$titulo = "Clientes";
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
<div id="wrapper" style="background-color:#FFFFFF">
  <?php include("inc/nav.php") ?>
  <div <?php if($menu == "") {?>id="page-wrapper"<?php }?>>
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
                      <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo $rs_info->fields['apellido']?>">
                      </div>                      
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $rs_info->fields['email']?>">
                      </div>  
                      <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $rs_info->fields['telefono']?>">
                      </div>
                      <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control" name="celular" value="<?php echo $rs_info->fields['celular']?>">
                      </div>  
                     <div class="form-group">
                        <label>DNI</label>
                        <input type="text" class="form-control" name="dni" value="<?php echo $rs_info->fields['dni']?>">
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
