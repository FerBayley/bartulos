<?php
	if($action == "edit" or $action == "add") {
		$campos=array();
		$valores=array();
		foreach($_POST as $k => $v) {
			//echo $k."<br>";
			$senal = 0; 
			if($k == "id" and $senal == 0) {
				$campos[] = $k;						
				$valores[] = "$v";	
				$senal = 1; 										
			}
			if($k == "contrasenia" and $senal == 0) {
				if($v !== "") {
					$campos[] = $k;						
					$valores[] = "$v";	
				}
			$senal = 1; 													
			}		
			if($k == "fecha_desde" and $senal == 0) {
				$campos[] = $k;						
				//die(fecha_e_m($fecha_nacimiento));
				$valores[] = fecha_e_m($fecha_desde);										
				$senal = 1; 
			}
			if($k == "fecha_hasta" and $senal == 0) {
				$campos[] = $k;						
				$valores[] = fecha_e_m($fecha_hasta);										
				$senal = 1; 
			}		
			if($k == "fecha" and $senal == 0) {
				$campos[] = $k;						
				$valores[] = fecha_e_m($fecha);										
				$senal = 1; 
			}				
			if($k == "fecha_nacimiento" and $senal == 0) {
				$campos[] = $k;						
				$valores[] = fecha_e_m($fecha_nacimiento);										
				$senal = 1; 
			}							
			if($k == "c_fecha" and $senal == 0) {
				$campos[] = $k;						
				$valores[] = fecha_e_m($c_fecha);										
				$senal = 1; 
			}
			if($tabla == "bar_cotizaciones" and ($k == "nombre" or $k == "apellido"  or $k == "dni"  or $k == "email"  or $k == "telefono"  or $k == "direccion")) {
				$senal = 1; 				
			}							
			if($senal == 0) {
				$campos[] = $k;
				$valores[] = $v;										
				$senal = 1; 				
			}						
		}
		foreach($_FILES as $k => $v) {
			$codigo_aleatorio = codigo_activacion();
			$senal = 0; 
			//IMAGENES	
			if(preg_match("/imagen/",$k)) {
					$numero = strtolower(substr($k,6,2));
					//echo $numero."<br />";
					//die($numero);
					$valor = $_FILES[$k]['name'];
					$imagen_actual = $_POST['imagena'.$numero];
					$destino2=$destino_imagenes;
					if($valor !== "" and $senal == 0) {	
						$senal = 1;		
						$campos[] = strtolower(substr($k,0,8));
						$ext = obtener_extension($valor);
						for($j=1;$j<=2;$j++) { 
							if($j==1) $carpeta = "chicas";
							if($j==2) $carpeta = "grandes";
							$destino=$destino2."/$valor";				
							if($j==1) {
								move_uploaded_file($_FILES[$k]['tmp_name'], $destino);
								if($miniatura_por == "proporcional") {
									$altoancho = GetImageSize($destino); 
									$ancho = $altoancho[0];
									$alto =  $altoancho[1]; 
									if($ancho > $alto) {
										obtimizar($destino, $miniatura_ancho, $miniatura_alto, $carpeta, "ancho");
									} else {
										obtimizar($destino, $miniatura_ancho, $miniatura_alto, $carpeta, "alto");						
									}								
								} else {
										obtimizar($destino, $miniatura_ancho, $miniatura_alto, $carpeta, $miniatura_por);
								}
								$ext = ".".obtener_extension($valor);
								if($id) {
									$nuevo_nombre = $id."-".$numero."-".$codigo_aleatorio.$ext;
								} else {
									$query = "SELECT id FROM $tabla ORDER BY id DESC LIMIT 0 , 1";
									$rs_db=$con->Execute($query);
									$nuevo_nombre = ($rs_db->fields['id'] + 1)."-".$numero."-".$codigo_aleatorio.$ext;
								}
								eliminar_archivo($destino2."/chicas/".$nuevo_nombre);
								rename($destino2."/chicas/".$valor, $destino2."/chicas/".$nuevo_nombre);						
							}
							if($j==2) {
								if($miniatura_por == "proporcional") {
									$altoancho = GetImageSize($destino); 
									$ancho = $altoancho[0];
									$alto =  $altoancho[1]; 
									if($ancho > $alto) {
										obtimizar($destino, $zoom_ancho, $zoom_alto, $carpeta, "ancho");
									} else {
										obtimizar($destino, $zoom_ancho, $zoom_alto, $carpeta, "alto");						
									}								
								} else {
									obtimizar($destino, $zoom_ancho, $zoom_alto, $carpeta, $zoom_por);
								}
								unlink($destino);
								eliminar_archivo($destino2."/grandes/".$nuevo_nombre);
								rename($destino2."/grandes/".$valor, $destino2."/grandes/".$nuevo_nombre);										
								$valores[]= $nuevo_nombre;	
							}
						}
					} else {
						$eliminar = $_POST['imagen_eliminar'.$numero];
						if($eliminar == "borrar") {
							$campos[] = $k;
							$valores[]= "";
							eliminar_archivo($destino2."/chicas/$imagen_actual");
							eliminar_archivo($destino2."/grandes/$imagen_actual");					
						} else {
							$campos[] = $k;							
							$valores[]= $imagen_actual;
						}
					}
			}
			//ARCHIVOS
			if(preg_match("/archivo/",$k)) {
				$numero = strtolower(substr($k,7,2));
				$valor = $_FILES[$k]['name'];
				$archivo_actual = $_POST['archivoa'.$numero];				
				if($valor !== "" and $senal == 0) {			
					$senal = 1;	
					$campos[] = $k;						
					$ext = ".".obtener_extension($valor);		
					if($id) {
						$nuevo_nombre = $id."-".$numero."-".$codigo_aleatorio.$ext;
					} else {
						$query = "SELECT id FROM $tabla ORDER BY id DESC LIMIT 0 , 1";
						$rs_db=$con->Execute($query);
						$nuevo_nombre = ($rs_db->fields['id'] + 1)."-".$numero.$ext;
					}
					//echo $nuevo_nombre;
					$destino=$destino_archivos."/".$nuevo_nombre;								
					move_uploaded_file($_FILES[$k]['tmp_name'], $destino);		
					$valores[]= $nuevo_nombre;															
				} else {
					$eliminar = $_POST['archivo_eliminar'.$numero];
					if($eliminar == "borrar") {
						$campos[] = $k;
						$valores[]= "";
						eliminar_archivo($destino_archivos."/$archivo_actual");
					} else {
						$campos[] = $k;	
						$valores[]= $archivo_actual;
					}
				}	
			}						
		}
		switch ($action) {
			case "add":
				agregar_db($campos, $valores, $tabla, $con);
				if($tabla == "bar_cotizaciones") {
					$query = "SELECT id FROM bar_cotizaciones ORDER BY id DESC LIMIT 0,1";
					$rs_db=$con->Execute($query);
					redireccionar("cotizaciones-frm.php?id=".$rs_db->fields['id']."&action=edit");
				}
				break;
			case "edit":
				editar_db($campos, $valores, $tabla, $con);
				if($tabla == "bar_cotizaciones") redireccionar("cotizaciones-frm.php?id=".$id."&action=edit");
				break;		
			}	
		$alerta = $action;
	}	

?>