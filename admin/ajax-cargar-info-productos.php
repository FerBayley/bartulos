<?php
session_start();
extract($_REQUEST);
if($senal == "si") {
	include_once("../inc/conectar.php");
	include_once("../inc/funciones.php");
	$con = conectar($db_host, $db_usuario, $db_contra, $db_base);
	$id_seleccion = $_SESSION['seleccion_producto'];
	if(!$id_seleccion == "") { // AGREGO
		$query = "SELECT * FROM bar_productos WHERE id = '$id_seleccion' ";
		$rs_producto=$con->Execute($query);	
		$cantidad = 1;
		$precio = $rs_producto->fields['precio'];
		$sub_total = $rs_producto->fields['precio'];
		$query = "INSERT INTO bar_cotizaciones_detalle (`id`, `id_cotizacion`, `id_producto`, `cantidad`, `precio`, `sub_total`) VALUES (NULL, '$id_cotizacion', '$id_seleccion', '$cantidad', '$precio', '$sub_total')";
		$rs_db=$con->Execute($query);	
	}
	$query = "SELECT * FROM bar_cotizaciones_detalle WHERE id_cotizacion = '$id_cotizacion' ";
	$rs_productos=$con->Execute($query);
	$_SESSION['seleccion_producto'] = "";
}
if(!$rs_productos->EOF) {
	$a=1;
	while(!$rs_productos->EOF) {?>
<div class="col-lg-4">
  <div class="form-group">
    <input type="text" id="nombre_<?php echo $a?>" value="<?php echo mostrar_info("bar_productos", $con, $rs_productos->fields['id_producto'], "id", "nombre", "")?>" class="form-control" disabled/>
  </div>
</div>
<div class="col-lg-1">
  <div class="form-group">
    <input type="text" id="cantidad_<?php echo $a?>" value="<?php echo $rs_productos->fields['cantidad']?>" class="form-control" />
  </div>
</div>
<div class="col-lg-1">
  <div class="form-group">
    <input type="text" id="precio_<?php echo $a?>" value="<?php echo $rs_productos->fields['precio']?>"  class="form-control" />
  </div>
</div>
<div class="col-lg-2">
  <div class="form-group">
    <input type="text" id="sub_total_<?php echo $a?>" value="<?php echo $sub_total = $rs_productos->fields['precio']*$rs_productos->fields['cantidad'] ?>" placeholder="" class="form-control" disabled/>
  </div>
</div>
<div class="col-lg-1">
	<a onclick="actualizar('<?php echo $a?>')" class="btn btn-primary">Actualizar</a>
</div>
<div class="col-lg-2">
	<a onclick="eliminar('<?php echo $a?>')" class="btn btn-primary">Eliminar</a>
</div>

<div class="clearfix"></div>
<hr style="border:dotted 1px #A0A0A0">
<input type="hidden" id="id_<?php echo $a?>" value="<?php echo  $rs_productos->fields['id'] ?>"/>
<?php
	$total_general = $total_general + $sub_total;
	$a++;
	$rs_productos->MoveNext(); 
	}
}
?>
<input type="hidden" id="total_temporal" name="total_temporal" value="<?php echo $total_general?>">