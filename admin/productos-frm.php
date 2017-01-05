<?php
include_once("inc/config.php");
include_once("inc/seguridad.php");
$pagina = "productos.php";
$tabla = "bar_productos";
$titulo = "Productos";
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
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Codigo</label>
                      <input type="text" class="form-control" name="codigo" value="<?php echo $rs_info->fields['codigo']?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="<?php echo $rs_info->fields['nombre']?>" required>
                    </div>
                  </div>
                 <div class="col-lg-4">
                    <div class="form-group">
                      <label>Precio</label>
                      <input type="text" class="form-control" name="precio" value="<?php echo $rs_info->fields['precio']?>">
                    </div>
                  </div>
                 <div class="col-lg-4">
                    <div class="form-group">
                      <label>Descuento</label>
                      <input type="text" class="form-control" name="descuento" value="<?php echo $rs_info->fields['descuento']?>">
                    </div>
                  </div>                  
                 <div class="col-lg-4">
                    <div class="form-group">
                      <label>Etiqueta</label>
                      <input type="text" class="form-control" name="etiqueta" value="<?php echo $rs_info->fields['etiqueta']?>">
                    </div>
                  </div>                                    
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Descripción</label>
                      <textarea class="form-control" rows="8" name="descripcion"><?php echo $rs_info->fields['descripcion']?></textarea>
                    </div>  
                   </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Categoria</label>
                      <?php crear_select($rs_info->fields['id_categoria'], $con, "bar_categorias", "nombre", "id_categoria", "nombre", "", '  class="form-control" required  ', " ", "-- Seleccione --", "")?>
                    </div>
                  </div>
                  <div class="col-lg-4">                  
                   <div class="form-group">
                      <label>Marca</label>
                      <?php crear_select($rs_info->fields['id_marca'], $con, "bar_marcas", "nombre", "id_marca", "nombre", "", '  class="form-control" required  ', " ", "-- Seleccione --", "")?>
					   </div>
                  </div>
                  <div class="col-lg-4">                  
                   <div class="form-group">
                      <label>Material</label>
                      <?php crear_select($rs_info->fields['id_material'], $con, "bar_materiales", "nombre", "id_material", "nombre", "", '  class="form-control" required  ', " ", "-- Seleccione --", "")?>
					   </div>
                  </div>                  
                 <div class="clearfix"></div>
                 <div class="col-lg-12">
                 <?php
					$contador = 1;
					while($contador <= 3) {?>
                  <div class="form-group">
                    <label>
                      <?php
                         if($contador == 1) echo "imagen Principal";
						 if($contador == 2) echo "imagen Secundaria";
						 if($contador == 2) echo "imagen Secundaria";
						 ?>
                    </label>
                    <input name="imagen<?php echo $contador?>" type="file" id="imagen<?php echo $contador?>" class="form-control" />
                  </div>
                  <input name="imagena<?php echo $contador?>" type="hidden" value="<?php echo $rs_info->fields['imagen'.$contador]?>"/>
                  <div class="form-group">
                    <?php if(!$rs_info->fields['imagen'.$contador]=="") {?>
                    <div class="checkbox">
                      <label>
                        <input id="imagen_eliminar<?php echo $contador?>" name="imagen_eliminar<?php echo $contador?>" type="checkbox" value="borrar" />
                        Eliminar</label>
                    </div>
                    <?php }?>
                    <?php mostrar_imagen($rs_info->fields['imagen'.$contador], $rs_info->fields['imagen'.$contador], "../img/productos/chicas", '190px', '');?>
                  </div>
                  <?php
					$contador++;
					}?>
                  <button class="btn btn-primary">Guardar</button>
                  <a href="<?php echo $pagina?>" class="btn btn-primary">Volver</a>
                  </div>
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
