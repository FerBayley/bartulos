<?php
include_once("inc/config.php");
include_once("inc/seguridad.php");
$pagina = "administradores.php";
$tabla = "bar_administradores";
$titulo = "Administradores";
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
                  <div class="form-group">
                    <label>Email</label>
                    <input  type="email" class="form-control" name="email" value="<?php echo $rs_info->fields['email']?>" required>
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input  type="contrasenia" class="form-control" name="contrasenia" value="<?php echo $rs_info->fields['contrasenia']?>" required>
                  </div>                  
                  <div class="form-group">
                      <label>Estado</label>
                      <div class="radio">
                        <label>
                          <?php selecionar_elemento($rs_info->fields['estado'], "ACTIVO", "estado", '')?>
                          Activo </label>
                      </div>
                      <div class="radio">
                        <label>
                          <?php selecionar_elemento($rs_info->fields['estado'], "NO ACTIVO", "estado", '')?>
                          No Activo </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tipo</label>
                      <div class="radio">
                        <label>
                          <?php selecionar_elemento($rs_info->fields['tipo'], "Administrador", "tipo", '')?>
                          Administrador </label>
                      </div>
                      <div class="radio">
                        <label>
                          <?php selecionar_elemento($rs_info->fields['tipo'], "Empleado", "tipo", '')?>
                          Empleado </label>
                      </div>
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