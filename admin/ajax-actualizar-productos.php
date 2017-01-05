<?php
session_start();
extract($_REQUEST);
if($senal == "si") {
	include_once("../inc/conectar.php");
	include_once("../inc/funciones.php");
	$con = conectar($db_host, $db_usuario, $db_contra, $db_base);	
	if($action == "actualizar-producto") {
		$query="UPDATE bar_cotizaciones_detalle SET precio = '$precio', cantidad = '$cantidad', sub_total = '$precio*$cantidad' WHERE id = '$id_p' ";
		$rs_db=$con->Execute($query);
	}
	if($action == "eliminar-producto") {
		$query="DELETE FROM bar_cotizaciones_detalle WHERE id = '$id_p'  ";
		$rs_db=$con->Execute($query);
	}	
}
?>