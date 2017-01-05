<?php
include("inc/config.php");
include("inc/seguridad.php");
//PARAMETROS DE CONFIGURACION
$tabla_ado = "bar_administradores"; 
$tabla = "bar_administradores"; 
$ordenar_ado = "nombre ASC"; 
$url_form = "administradores-frm.php"; 
$url_list = "administradores.php";
$campos_select = " * "; 
//CONFIGURO SI TIENE IMAGENES
/*$total_imagenes_form = 1;
$destino_imagenes = "images/clientes";
$miniatura_ancho = "225";
$miniatura_alto = "130";
$miniatura_por = "proporcional";
$zoom_ancho = "1600";
$zoom_alto = "900";
$zoom_por = "ancho";*/
// FIN CONFIGURO SI TIENE ARCHIVOS
/*$total_archivos_form = 6;
$destino_archivos = "archivos";*/
include_once("inc/acciones-get.php");
include_once("inc/acciones-post.php");
include_once("inc/acciones-select.php");
$titulo = "Administradores";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("inc/head.php");?>
</head>
<body>
<div id="wrapper">
  <?php include("inc/nav.php");?>
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
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Estado</th>
                    <th>Tipo</th>
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
                    <td><?php echo $rs_lista->fields['email']?></td>
                    <td><?php echo $rs_lista->fields['estado']?></td>
                    <td><?php echo $rs_lista->fields['tipo']?></td>
                    <td><a href="<?php echo $url_form?>?action=edit&id=<?php echo $rs_lista->fields['id']?>">Editar</a> | <a href="<?php echo $url_list?>?action=delete&id=<?php echo $rs_lista->fields['id']?>"  onclick="return confirm('Desea eliminar el administrador?')">Eliminar</a></td>
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
