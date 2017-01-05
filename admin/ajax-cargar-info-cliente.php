<?php
session_start();
extract($_REQUEST);
if($senal == "si") {
	include_once("../inc/conectar.php");
	$con = conectar($db_host, $db_usuario, $db_contra, $db_base);
	$id_cliente = $_SESSION['seleccion_cliente'];
}
$query = "SELECT * FROM bar_clientes WHERE id = '$id_cliente' ";
$rs_db=$con->Execute($query);
if(!$rs_db->EOF) {
?>
<div class="col-lg-4">
    Nombre y Apellido: <strong><?php echo $rs_db->fields['nombre']?> <?php echo $rs_db->fields['apellido']?></strong>
</div>
<div class="col-lg-4">
    DNI: <strong><?php echo $rs_db->fields['dni']?></strong>
</div>
<div class="col-lg-4">
    Email: <strong><?php echo $rs_db->fields['email']?></strong>
</div>
<div class="col-lg-4">
    Teléfono: <strong><?php echo $rs_db->fields['telefono']?></strong>
</div>
<div class="col-lg-4">
    Celular: <strong><?php echo $rs_db->fields['celular']?></strong>
</div>
<input name="id_cliente" type="hidden" value="<?php echo $id_cliente?>" />
<?php 
}
?>
