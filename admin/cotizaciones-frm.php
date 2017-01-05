<?php
include_once("inc/config.php");
include_once("inc/seguridad.php");
$pagina = "cotizaciones.php";
$tabla = "bar_cotizaciones";
$titulo = "Cotizaciones";
switch ($action) {
	case "edit":
  		$titulo_sub = "Editar";	
  		$rs_info = editar($tabla, $id, $con);
		$fecha = fecha_m_e($rs_info->fields['fecha']);
		$titulo2 = "Editar";
  		break;
  	case  "add":
  		$titulo_sub = "Nueva";	
		$titulo2 = "Seleccionar";
		$fecha = date('d-m-Y');
  		break;	
}
$query = "SELECT * FROM bar_cotizaciones_detalle WHERE id_cotizacion = '$id' ";
$rs_productos=$con->Execute($query);
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
				<div class="col-lg-4">
                    <div class="form-group">
                      <label>Fecha Cotización</label>
                      <input type="text" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha?>" required>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="form-group">
                      <label>Estado</label>
                      <div class="radio">
                        <label>
                          <?php selecionar_elemento($rs_info->fields['estado'], "Pendiente", "estado", '  ')?>
                        Pendiente </label>
                        <label>
                          <?php selecionar_elemento($rs_info->fields['estado'], "Enviada", "estado", '  ')?>
                        Enviada </label>
                      </div>
                    </div> 
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-10">                    
                    <h3>Cliente</h3>
                  </div>
                  <div class="col-lg-1"><br>           
                    <a href="#" data-toggle="modal" data-target="#cargar_cliente" class="btn btn-warning" > <?php echo $titulo2?> Cliente</a>
                  </div>
                    <div id="info_cliente">
                      <?php
					$id_cliente = $rs_info->fields['id_cliente'];
                    include("ajax-cargar-info-cliente.php")?>
                    </div>
                   <div class="clearfix"></div>  
                  <div class="col-lg-10">                    
                    <h3>Productos</h3>
                  </div>
                  <div class="col-lg-1"><br>           
                    <a href="#" data-toggle="modal" data-target="#cargar_producto" class="btn btn-warning" > <?php echo $titulo2?> Producto</a>
                  </div>
                    <div id="info_producto">
                      <?php
					$id_cotizacion = $rs_info->fields['id'];
                    include("ajax-cargar-info-productos.php")?>
                    </div>
                  <div class="clearfix"></div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>Comentarios</label>
                      <textarea class="form-control" rows="8" name="comentario_cliente"><?php echo $rs_info->fields['comentario_cliente']?></textarea>
                    </div> 
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Forma de Pago</label>
                      <input type="text" class="form-control" name="forma_de_pago" value="<?php echo $rs_info->fields['forma_de_pago']?>"> 
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Forma de Envio</label>
                      <input type="text" class="form-control" name="forma_envio" value="<?php echo $rs_info->fields['forma_envio']?>"> 
                    </div>
                  </div> 
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label>Precio de Envio</label>
                      <input type="text" class="form-control" name="precio_envio" id="precio_envio" value="<?php echo $rs_info->fields['precio_envio']?>"> 
                    </div>
                  </div>                                    
                  <div class="col-lg-12">   
                  <?php if($action == "edit") {
					  $total_general = $total_general+$rs_info->fields['precio_envio'];
					  ?>
                   <div class="alert alert-info text-right" id="div_total">
	                   <strong><?php echo "$ ".$total_general;?></strong>
                   </div>
                   <?php }?>
                   <br>
                    <?php if($action == "edit") {?>
                    <a href="cotizaciones-detalle.php?id=<?php echo $rs_info->fields['id']?>" target="new" class="btn btn-warning">Ver Cotización</a>
                    <?php }?>
                    <button class="btn btn-primary" name="grabar">Guardar</button>
                    <a href="<?php echo $pagina?>" class="btn btn-primary">Volver</a>
                    
                    </div>
                  <input name="total" id="total"  type="hidden"  value="<?php echo $total_general?>" />
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
<!-- VENTANA MODAL-->
<div class="modal fade modal-wide" id="cargar_cliente" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="cargar_info_cliente('iframe_cliente')">CERRAR [X]</button>
        <iframe width="100%" height="790" src="clientes.php?menu=no" frameborder="0" allowfullscreen id="iframe_cliente"></iframe>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="cargar_info_cliente('iframe_cliente')">CERRAR [X]</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN VENTANA --> 
<!-- VENTANA MODAL-->
<div class="modal fade modal-wide" id="cargar_producto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="cargar_info_producto('iframe_producto')">CERRAR [X]</button>
        <iframe width="100%" height="790" src="productos.php?menu=no" frameborder="0" allowfullscreen id="iframe_producto"></iframe>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="cargar_info_producto('iframe_producto')">CERRAR [X]</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN VENTANA --> 
<script>
	  function cargar_info_cliente(iframe) {
		var frame = document.getElementById(iframe);
		var src = document.getElementById(iframe).src;	
		document.getElementById(iframe).src = src;					
		peticion_http = inicializa_xhr();
		if(peticion_http) {
			peticion_http.onreadystatechange = cargar_info_respuesta_cliente;
			peticion_http.open("GET", "ajax-cargar-info-cliente.php?id=<?php echo $id?>&senal=si&nocache="+Math.random(), true);
			peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			peticion_http.send(null);
		}

	  }
  	  function cargar_info_respuesta_cliente() {
		if(peticion_http.readyState == READY_STATE_COMPLETE) {
			if (peticion_http.status == 200) {
				var respuesta = peticion_http.responseText;
				//alert(respuesta);
				document.getElementById("info_cliente").innerHTML = respuesta;
			}
		}
	}
	function cargar_info_producto(iframe) {
		var frame = document.getElementById(iframe);
		var src = document.getElementById(iframe).src;	
		document.getElementById(iframe).src = src;					
		peticion_http = inicializa_xhr();
		if(peticion_http) {
			peticion_http.onreadystatechange = cargar_info_respuesta_producto;
			peticion_http.open("GET", "ajax-cargar-info-productos.php?id_cotizacion=<?php echo $id?>&senal=si&nocache="+Math.random(), true);
			peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			peticion_http.send(null);
		}

	  }
  	  function cargar_info_respuesta_producto() {
		if(peticion_http.readyState == READY_STATE_COMPLETE) {
			if (peticion_http.status == 200) {
				var respuesta = peticion_http.responseText;
				//alert(respuesta);
				document.getElementById("info_producto").innerHTML = respuesta;
				//SUMO TOTALES
				document.getElementById("total").value = parseFloat(document.getElementById("total_temporal").value) + parseFloat(document.getElementById("precio_envio").value);
				if(document.getElementById("total").value > 0) {
					document.getElementById("div_total").innerHTML = "<strong>$ "+document.getElementById("total").value+"</strong>";
				} else {
					document.getElementById("div_total").innerHTML = "<strong>$ 0</strong>";
				}
			}
		}
	}

	function actualizar(id) {
		var id2 = document.getElementById('id_'+id).value;
		var precio = document.getElementById('precio_'+id).value;
		var cantidad = document.getElementById('cantidad_'+id).value;		
		peticion_http = inicializa_xhr();
		if(peticion_http) {
			peticion_http.onreadystatechange = actualizar_producto_respuesta;
			peticion_http.open("GET", "ajax-actualizar-productos.php?action=actualizar-producto&id=<?php echo $id?>&id_p="+id2+"&precio="+precio+"&cantidad="+cantidad+"&senal=si&nocache="+Math.random(), true);
			peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			peticion_http.send(null);
		}

	  }
  	  function actualizar_producto_respuesta() {
		if(peticion_http.readyState == READY_STATE_COMPLETE) {
			if (peticion_http.status == 200) {
				var respuesta = peticion_http.responseText;
				//alert(respuesta);
				cargar_info_producto('iframe_producto');
			}
		}
	  }	
	 function eliminar(id) {
		var id2 = document.getElementById('id_'+id).value;
		peticion_http = inicializa_xhr();
		if(peticion_http) {
			peticion_http.onreadystatechange = actualizar_producto_respuesta;
			peticion_http.open("GET", "ajax-actualizar-productos.php?action=eliminar-producto&id=<?php echo $id?>&id_p="+id2+"&senal=si&nocache="+Math.random(), true);
			peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			peticion_http.send(null);
		}
	  }	  
	</script>
</body>
</html>
