<?php
	switch ($action) {
		case "delete":
			$ids = explode("-",$_GET['id']);
			for($i=0;$i<=count($ids);$i++){ 
				if(!$ids[$i]=="") {
					$id = $ids[$i];
					borrar_db($tabla, $id, $con, $destino_imagenes, $destino_archivos);
					if($tabla=="bar_cotizaciones") { // BORRO RELACIONES
						$query="DELETE FROM bar_cotizaciones_detalle WHERE id_cotizacion = '$id' ";
						$rs_db=$con->Execute($query);
					}
				}
			}
			$alerta = $action;
			break;
		case "ordenar":
			$prioridad = 1;
			$aux_where = str_replace("\'","'",$aux_where);
			$query = "SELECT id FROM $tabla $aux_where ORDER BY orden ASC";
			$rs_prioridad=$con->Execute($query);
			while(!$rs_prioridad->EOF) {
				$id = $rs_prioridad->fields['id'];
				$query = "UPDATE $tabla SET orden = '$prioridad' WHERE id='$id'  ";
				$rs_actualizo=$con->Execute($query);
			$prioridad++;
			$rs_prioridad->MoveNext();
			}			
			$id = $_GET['id'];
			$orden = $_GET['orden'];			
			$query = "SELECT orden FROM $tabla WHERE id='$id' ";
			$rs_orden_previo=$con->Execute($query);
			$orden_previo = $rs_orden_previo->fields['orden'];
			$aux_where = str_replace("WHERE", "AND", $aux_where);
			if ($orden>$orden_previo) {
				$query = "UPDATE $tabla SET orden = orden-1 WHERE orden > $orden_previo AND orden <= $orden $aux_where ";
				$rs_actualizar=$con->Execute($query);
			}
			if ($orden<$orden_previo) {
				$query = "UPDATE $tabla SET orden = orden+1 WHERE orden >= $orden AND orden < $orden_previo $aux_where ";	
				$rs_actualizar=$con->Execute($query);
			}
			$query="UPDATE $tabla SET orden = '$orden' WHERE id='$id' ";
			$rs_actualizar=$con->Execute($query);
			break;	
		case "seleccionar":
			$_SESSION['seleccion_cliente'] = $id;
			$alerta = "Ya puede cerrar la ventana, para cargar los datos de cliente.";
			break;
		case "seleccionar-producto":
			$_SESSION['seleccion_producto'] = $id;
			$alerta = "Ya puede cerrar la ventana, para cargar los datos del producto a la cotización.";
			break;
		case "cotizacion-cliente":
			setcookie("id_cliente",$id);
			//die($tipo);
			header("location:cotizaciones.php");
			break;	
}
?>