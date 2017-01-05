<?php
include("inc/config.php");
include("inc/seguridad.php");
//PARAMETROS DE CONFIGURACION
$tabla_ado = "bar_productos"; 
$tabla = "bar_productos"; 
$ordenar_ado = "nombre ASC"; 
$url_form = "productos-frm.php"; 
$url_list = "productos.php";
$campos_select = " * "; 
//CONFIGURO SI TIENE IMAGENES
$total_imagenes_form = 2;
$destino_imagenes = "../img/productos";
$miniatura_ancho = "150";
$miniatura_alto = "150";
$miniatura_por = "proporcional";
$zoom_ancho = "800";
$zoom_alto = "800";
$zoom_por = "ancho";
// FIN CONFIGURO SI TIENE ARCHIVOS
/*$total_archivos_form = 2;
$destino_archivos = "../personales-archivos";*/
include_once("inc/acciones-get.php");
include_once("inc/acciones-post.php");
include_once("inc/acciones-select.php");
$titulo = "productos";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("inc/head.php");?>
</head>
<body>
<div id="wrapper" style="background-color:#FFFFFF">
  <?php include("inc/nav.php");?>
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
      <?php include("inc/alertas.php");?>
        <div class="panel panel-default">
          <div class="panel-heading"><a href="<?php echo $url_form?>?action=add" class="btn btn-primary">Nuevo</a></div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lista">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Material</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				while(!$rs_lista->EOF) {
				?>
                  <tr class="odd gradeX">
                    <td><?php echo $rs_lista->fields['codigo']?></td>
                    <td><?php mostrar_imagen($rs_lista->fields['imagen1'], $rs_lista->fields['imagen1'], "../img/productos/chicas", '85px', '');?></td>
                    <td><?php echo $rs_lista->fields['nombre']?></td>
                    <td><?php echo mostrar_info("bar_categorias", $con, $rs_lista->fields['id_categoria'], "id", "nombre", "")?></td>
                    <td><?php echo mostrar_info("bar_marcas", $con, $rs_lista->fields['id_marca'], "id", "nombre", "")?></td>
                    <td><?php echo mostrar_info("bar_materiales", $con, $rs_lista->fields['id_material'], "id", "nombre", "")?></td>
                    <td><a href="<?php echo $url_form?>?action=edit&id=<?php echo $rs_lista->fields['id']?>">Editar</a> | <a href="<?php echo $url_list?>?action=delete&id=<?php echo $rs_lista->fields['id']?>" onclick="return confirm('Desea eliminar el administrador?')">Eliminar</a><?php if($menu == "no") {?> | <a href="<?php echo $url_list?>?action=seleccionar-producto&id=<?php echo $rs_lista->fields['id']?>&menu=<?php echo $menu?>" onclick="return confirm('Desea cargar el Producto?')">Seleccionar</a><?php }?></td>
                  </tr>
                  <?php 
			   $rs_lista->MoveNext();
			   }?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
      <!-- /.col-lg-12 --> 
    </div>
  </div>
  <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper -->
<?php include("inc/js.php");?>
<?php include("inc/js-table.php");?>
</body>
</html>
