<?php
if($paginador == "si") {
	if($pag=="") { 
		$inicio = 0; 
		$pag = 1; 
	} else { 
		$inicio =($pag-1)*$registros; 
	}
	$query = "SELECT $campos_select FROM $tabla_ado $aux_filtro  ";
	$rs_total=$con->Execute($query);
	$total_registros = $rs_total->RecordCount();
	$total_paginas = ceil($total_registros / $registros);
	$query = "SELECT $campos_select FROM $tabla_ado $aux_filtro ORDER BY $ordenar_ado LIMIT ".$inicio.",".$registros;
	$rs_lista=$con->Execute($query);	
} else {
	$query = "SELECT $campos_select FROM $tabla_ado $aux_filtro ORDER BY $ordenar_ado  "; 
	$rs_lista=$con->Execute($query);
	$contador_lista = 1;
}
//echo $query;
?>