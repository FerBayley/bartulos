<?php
include("inc/config.php");
include("inc/seguridad.php");
//PARAMETROS DE CONFIGURACION
$tabla_ado = "bar_clientes"; 
$tabla = "bar_clientes"; 
$ordenar_ado = "nombre ASC, apellido ASC"; 
$url_form = "clientes-frm.php"; 
$url_list = "clientes.php";
$campos_select = " * "; 
//CONFIGURO SI TIENE IMAGENES
/*$total_imagenes_form = 1;
$destino_imagenes = "../images/slides";
$miniatura_ancho = "150";
$miniatura_alto = "150";
$miniatura_por = "proporcional";
$zoom_ancho = "1080";
$zoom_alto = "900";
$zoom_por = "ancho";*/
// FIN CONFIGURO SI TIENE ARCHIVOS
/*$total_archivos_form = 6;
$destino_archivos = "archivos";*/
include_once("inc/acciones-get.php");
include_once("inc/acciones-post.php");
include_once("inc/acciones-select.php");
$titulo = "Clientes";
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
          <div class="panel-heading"><a href="<?php echo $url_form?>?action=add&menu=<?php echo $menu?>" class="btn btn-primary">Nuevo</a></div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lista">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cotizaciones</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				while(!$rs_lista->EOF) {
				?>
                  <tr class="odd gradeX">
                    <td><?php echo $rs_lista->fields['id']?></td>
                    <td><?php echo $rs_lista->fields['nombre']?></td>
                    <td><?php echo $rs_lista->fields['apellido']?></td>
                    <td>(<?php echo contar_registros("bar_cotizaciones", $con, $rs_lista->fields['id'], "id_cliente")?>) <a href="cotizaciones.php?action=cotizacion-cliente&id=<?php echo $rs_lista->fields['id']?>">Ver</a></td>
                    <td><a href="<?php echo $url_form?>?action=edit&id=<?php echo $rs_lista->fields['id']?>&menu=<?php echo $menu?>">Editar</a> | <a href="<?php echo $url_list?>?action=delete&id=<?php echo $rs_lista->fields['id']?>&menu=<?php echo $menu?>" onclick="return confirm('Desea eliminar el administrador?')">Eliminar</a> <?php if($menu == "no") {?> | <a href="<?php echo $url_list?>?action=seleccionar&id=<?php echo $rs_lista->fields['id']?>&menu=<?php echo $menu?>" onclick="return confirm('Desea seleccionar el cliente?')">Seleccionar</a><?php }?></td>
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
