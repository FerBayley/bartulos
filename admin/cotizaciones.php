<?php
include("inc/config.php");
include("inc/seguridad.php");
//PARAMETROS DE CONFIGURACION
$tabla_ado = "bar_cotizaciones"; 
$tabla = "bar_cotizaciones"; 
$ordenar_ado = "fecha DESC"; 
$url_form = "cotizaciones-frm.php"; 
$url_list = "cotizaciones.php";
$campos_select = " * "; 
//CONFIGURO SI TIENE IMAGENES
/*$total_imagenes_form = 2;
$destino_imagenes = "../img/operadores";
$miniatura_ancho = "100";
$miniatura_alto = "100";
$miniatura_por = "proporcional";
$zoom_ancho = "400";
$zoom_alto = "400";
$zoom_por = "ancho";
// FIN CONFIGURO SI TIENE ARCHIVOS
$total_archivos_form = 2;
$destino_archivos = "../operadores-archivos";*/
$titulo = "Cotizaciones";
$aux_filtro = " WHERE id >'0' ";
if(!$id_cliente == "") {
	$titulo = "Cotizaciones de ".mostrar_info("bar_clientes", $con, $id_cliente, "id", "nombre", "apellido");
	$aux_filtro .= " AND id_cliente = '".$id_cliente."' ";
}
include_once("inc/acciones-get.php");
include_once("inc/acciones-post.php");
include_once("inc/acciones-select.php");
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
          <div class="panel-heading">
            <div class="row">
              <div class="col-lg-2"> <a href="<?php echo $url_form?>?action=add" class="btn btn-primary">Nueva</a> </div>
              <div class="col-lg-10 text-right">
              <form role="form" action="<?php echo $pagina?>" method="get">
                <div class="col-lg-4">
                  <?php crear_select($id_cliente, $con, "bar_clientes", "nombre", "id_cliente", "nombre", "", '  class="form-control" required  ', " ", "-- Seleccione --", "")?>
                </div>
                <div class="col-lg-1">
                  <button class="btn btn-primary">Filtrar</button>
                </div>
                <input name="action" type="hidden" id="action" value="filtrar" />
              </form>
            </div>
          </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="dataTable_wrapper">
              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-lista">
                <thead>
                  <tr>
                    <th width="9%">Fecha</th>
                    <th width="9%">Cliente</th>
                    <th width="13%">Productos</th>
                    <th width="13%">Total</th>
                    <th width="33%">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
				while(!$rs_lista->EOF) {
				?>
                  <tr class="odd gradeX">
                    <td><?php echo fecha_m_e($rs_lista->fields['fecha'])?></td>
                    <td><?php echo mostrar_info("bar_clientes", $con, $rs_lista->fields['id_cliente'], "id", "nombre", "apellido")?></td>
                    <td>(<?php echo contar_registros("bar_cotizaciones_detalle", $con, $rs_lista->fields['id'], "id_cotizacion")?>)</td>
                    <td>$ <?php echo $rs_lista->fields['total']?></td>
                    <td><a href="<?php echo $url_list?>?action=delete&id=<?php echo $rs_lista->fields['id']?>" onclick="return confirm('Desea eliminar el Registro?')">Eliminar</a> | <a href="<?php echo $url_form?>?action=edit&id=<?php echo $rs_lista->fields['id']?>">Editar</a> | <a href="cotizaciones-detalle.php?id=<?php echo $rs_lista->fields['id']?>" target="new">Imprimir</a></td>
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
