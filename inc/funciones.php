<?php
function login($usuario, $pass, $tabla, $campo1, $campo2, $tipo, $url, $url2, $con, $session) {
	$usuario=addslashes($usuario);
	$pass=addslashes($pass);				
	$query="SELECT * FROM $tabla WHERE $campo1 = '$usuario' AND $campo2 = '$pass' AND estado = 'Activo' ";
	$rs_conectar=$con->Execute($query);
	//die($query);
	if(!$rs_conectar->EOF) {
		$_SESSION['session_bartulos_admin'] = $rs_conectar->fields['id'];			
		$nombresession=session_name();
		$idsession=session_id();
		header('location:'.$url.$idsession);
		die();
	} else {
			header('location:'.$url2);
			die();
		}
}

function chequear_session($session, $url) {
	if(!$_SESSION[$session]) {
		redireccionar($url);
		die();
	}
}

function redireccionar($url){
  echo '<script>window.location="'.$url.'"</script>';
  die();
}

function redireccionar2($url){
  header('location:'.$url);
  die();
}

function mostrar_alerta($alerta) {
	if(trim($alerta) == 'guardar') return 'Se ha guardado correctamente';	
	if(trim($alerta) == 'add') return 'Se ha agregado correctamente';	
	if(trim($alerta) == 'edit') return 'Se ha editado correctamente';			
	if(trim($alerta) == 'delete') return 'Se ha eliminado';				
	if(trim($alerta) == 'login') return 'Login incorrecto';				
	if(trim($alerta) == 'salir') return 'Ha salido correctamente';					
	if(trim($alerta) == 'restringuido') return 'Acceso restringuido';		
	if(trim($alerta) == 'limpiar') return ;
	if(!trim($alerta) == '') return $alerta;
}

function agregar_db($campos, $valores, $tabla, $con) {
	foreach($campos as $nombre => $valor) {
		if(!preg_match('/'.$campos[$nombre].' /', CONS_OMITIR_CAMPOS)) {				
			$campos_db .= $valor.', ';				
		} 
	}
	$campos_db = substr($campos_db,0,strlen($campos_db)-2);
	foreach($valores as $nombre => $valor) {		
		if(!preg_match('/'.$campos[$nombre].' /', CONS_OMITIR_CAMPOS)) {
			$valores_db .= "'".$valor."', ";				
		}
	}
	$valores_db = substr($valores_db,0,strlen($valores_db)-2);	
	$query = "INSERT INTO $tabla ($campos_db) VALUES ($valores_db)";
	//die($query);
	if(!$rs_db=$con->Execute($query)) die('Ha habido un error al procesar los datos... ');	
}

function borrar_db($tabla, $id, $con, $destino_imagen, $destino_archivo) {
	$query = "SELECT * FROM information_schema.columns WHERE table_name = '$tabla' ";
	$rs_db=$con->Execute($query);
	while(!$rs_db->EOF) {
		$columna_nombre = $rs_db->fields['COLUMN_NAME'];
		if(preg_match('/imagen/',$columna_nombre)) {
			$query = "SELECT $columna_nombre FROM $tabla WHERE id = '$id' ";
			$rs_db_borrar=$con->Execute($query);
			$valor = $rs_db_borrar->fields[$columna_nombre];
			if(!$valor=='') {
				eliminar_archivo($destino_imagen.'/chica/'.$valor);
				eliminar_archivo($destino_imagen.'/grande/'.$valor);
			}
		}
		if(preg_match('/archivo/',$columna_nombre)) {
			$query = "SELECT $columna_nombre FROM $tabla WHERE id = '$id' ";
			$rs_db_borrar=$con->Execute($query);
			$valor = $rs_db_borrar->fields[$columna_nombre];
			if(!$valor=='') {
				eliminar_archivo($destino_archivo.'/'.$valor);
			}
		}		
		$rs_db->MoveNext();
	}
	$query = "DELETE FROM $tabla WHERE id = '$id' ";
	$rs_db=$con->Execute($query);
}

function editar_db($campos, $valores, $tabla, $con) {
	for($i=0;$i<count($campos);$i++) {
		if($campos[$i] == 'id') $id = $valores[$i];
		if(!preg_match('/'.trim($campos[$i]).' /', CONS_OMITIR_CAMPOS)) {
			$campos_db_valores_db .= trim($campos[$i])."='".$valores[$i]."', ";
		}
	}	
	$campos_db_valores_db = substr($campos_db_valores_db,0,strlen($campos_db_valores_db)-2);	
	$query = "UPDATE $tabla SET $campos_db_valores_db WHERE id = '$id' ";
	//die($query);
	if(!$rs_db=$con->Execute($query)) die('Ha habido un error al procesar los datos... ');	
}

function editar($tabla, $id, $con) {
	$ids = explode('-',$id);
	$aux_where = '';
	for($i=0;$i<count($ids);$i++) {
		if(!$ids[$i] =='')	$aux_where .=  " id = '".$ids[$i]."' OR ";		
	}
	$aux_where = substr($aux_where,0,strlen($aux_where)-3);
	$query = "SELECT * FROM $tabla WHERE $aux_where ";
	//echo $query;
	return $rs_listado=$con->Execute($query);	
}

function crear_select($id, $con, $tabla, $ordenar, $nombre, $campo1, $campo2, $estilos, $javascript, $seleccion_defecto, $seleccion_defecto_valor) {
	$query = "SELECT * FROM $tabla ORDER BY $ordenar ";
	$rs_select=$con->Execute($query);
	$mostrar = "<select name='$nombre' id='$nombre' $javascript $estilos >  ";		
	if(!$seleccion_defecto == '') $mostrar .= "<option value='$seleccion_defecto_valor' >$seleccion_defecto</option>";	
	while(!$rs_select->EOF) {
		$seleccion = '';
		if($id == $rs_select->fields['id'])  $seleccion = " selected='selected' ";
		if($campo2 !=='') {
			$mostrar .= "<option value='".$rs_select->fields['id'.$id_extenso]."' $seleccion >".$rs_select->fields[$campo1]." ".$rs_select->fields[$campo2]."</option>";
		} else {				
			$mostrar .= "<option value='".$rs_select->fields['id'.$id_extenso]."' $seleccion >".utf8_encode($rs_select->fields[$campo1])."</option>";		
		}
	$rs_select->MoveNext();
	}
	$mostrar .= "</select>";
	echo $mostrar;
}

function eliminar_archivo($archivo) {
	if($archivo !== '') {
		if(file_exists($archivo)) unlink($archivo);
	}
}

function fecha_e_m($fecha) { 
	if ($fecha<>''){ 
	   $trozos=explode('-',$fecha,3); 
	   return $trozos[2].'/'.$trozos[1].'/'.$trozos[0]; } 
	else {
		return 'NULL';
	} 
}

function fecha_m_e($fecha) { 
	if (($fecha == '') or ($fecha == '0000-00-00') ) {
		return '';
	} else {
		return date('d-m-Y',strtotime($fecha));
	} 
} 

function obtimizar($imagen, $ancho, $alto, $destino, $formato) {
	$ext = obtener_extension($imagen);
//	die($ext);
	$dir_thumb = $destino.'/';
	$prefijo_thumb = '';
	$camino_nombre=explode('/',$imagen); 
	$nombre=end($camino_nombre);
	$camino=substr($imagen,0,strlen($imagen)-strlen($nombre));
		if (file_exists($camino.$dir_thumb.$prefijo_thumb.$nombre)) unlink($camino.$dir_thumb.$prefijo_thumb.$nombre);
		if($ext=='jpg')	$img = imagecreatefromjpeg($camino.$nombre) or die('No se encuentra la imagen '.$camino.$nombre.'<br>n');
		if($ext=='gif')	$img = imagecreatefromgif($camino.$nombre) or die('No se encuentra la imagen '.$camino.$nombre.'<br>n');		
		if($ext=='png')	$img = imagecreatefrompng($camino.$nombre) or die('No se encuentra la imagen '.$camino.$nombre.'<br>n');			
		$datos = getimagesize($camino.$nombre);
		$height = $datos[1];
		$width = $datos[0];
		if($ancho>=$width && $alto>=$width){
			copy($camino.$nombre,$camino.$dir_thumb.$prefijo_thumb.$nombre);
		}else{
			$new_width = $ancho;
			$new_height = $alto;
			if ($formato == 'alto')	$new_width = round(($new_height * $width) / $height) ; 
			if ($formato == 'ancho') $new_height = round(($new_width * $height) / $width) ; 
			$thumb = imagecreatetruecolor($new_width,$new_height);
			imagecopyresampled ($thumb, $img, 0, 0, 0, 0, $new_width, $new_height, $datos[0], $datos[1]);
			if($ext=='jpg')	imagejpeg($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre,100);
			if($ext=='gif') {
				$colorTransparancia=imagecolortransparent($img);				
				if($colorTransparancia !== -1) {
					$colorTransparente = imagecolorsforindex($img, $colorTransparancia);
					$idColorTransparente = imagecolorallocatealpha($thumb, $colorTransparente['red'], $colorTransparente['green'], $colorTransparente['blue'], $colorTransparente['alpha']);
					imagefill($thumb, 0, 0, $idColorTransparente);
						imagecolortransparent($thumb, $idColorTransparente);
				}
			imagegif($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre);
			}
			if($ext=='png') imagepng($thumb,$camino.$dir_thumb.$prefijo_thumb.$nombre);
		}
}

function selecionar_elemento($valor_db, $valor_obj, $nombre_obj, $estilos) {
	if($valor_db == $valor_obj) {
		echo "<input name='$nombre_obj'  id='$nombre_obj' type='radio' value='$valor_obj' checked='checked' $estilos />";
	} else {
		echo "<input name='$nombre_obj'  id='$nombre_obj' type='radio' value='$valor_obj' $estilos />";
	}
}

function selecionar_elemento2($valor_db, $valor_obj_s, $nombre_obj, $estilos) {
	echo "<input name='$nombre_obj'  id='$nombre_obj' type='hidden' value='' />";
	if($valor_db == $valor_obj_s) {
		echo "<input name='$nombre_obj'  id='$nombre_obj' type='checkbox' value='$valor_obj_s' checked='checked'  $estilos />".$valor_obj;
	} else {
		echo "<input name='$nombre_obj'  id='$nombre_obj' type='checkbox' value='$valor_obj_s' $estilos  />".$valor_obj;
	}
}

function contar_registros($tabla, $con, $id, $campo) {
	$query = "SELECT count(*) as total FROM $tabla WHERE $campo = '$id' "; 
	if($id == "") $query = "SELECT count(*) as total FROM $tabla ";
	//echo $query;
	$contar_registros=$con->Execute($query);
	if($contar_registros->fields['total']) {
		return $contar_registros->fields['total'];
	} else {
		return 0;
	}
}

function sumar_registros($tabla, $con, $id, $campo, $campo1) {
	$query = "SELECT sum($campo1) as total FROM $tabla WHERE $campo = '$id' ";
	//die($query);
	$contar_registros=$con->Execute($query);
	if($contar_registros->fields['total']) {
		return $contar_registros->fields['total'];
	} else {
		return 0;
	}
}

function mostrar_info($tabla, $con, $id, $campo, $campo2, $campo3) {
	$query = "SELECT * FROM $tabla WHERE $campo = '$id' ";
	$mostrar_registros=$con->Execute($query);
	return ($mostrar_registros->fields[$campo2]).' '.($mostrar_registros->fields[$campo3]);
}

function obtener_extension($archivo) {
	$ext = strtolower(substr($archivo, -4)); 
	$ext = str_replace(".","",$ext);
	return $ext;
}

function mostrar_imagen($imagen, $descripcion, $url, $tamanio, $css) {
	if($imagen) {
		if($tamanio !=='') {
			echo "<img src='$url/$imagen' alt='$descripcion' title='$descripcion' border='0' width='$tamanio' $css  />";					 			
		} else {
			echo "<img src='$url/$imagen' alt='$descripcion' title='$descripcion' border='0' $css />";					 					
		}
	}
}

function mostrar_archivo($archivo, $path) {
	if(!$archivo =="") echo '<a href="'.$path.$archivo.'" target="new">Descargar</a>';
}

function make_link($url){
	 $url = strtolower($url);
	 $url = html_entity_decode($url);
	 //Rememplazamos caracteres especiales latinos
	 $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	 $repl = array('a', 'e', 'i', 'o', 'u', 'n');
	 $url = str_replace ($find, $repl, $url);
	 // Añaadimos los guiones
	 $find = array('&', '\r\n', '\n', '+');
	 $url = str_replace ($find, '', $url);
	 // Sacamos los espacios
	 $find = array(' ');
	 $url = str_replace ($find, '-', $url);
	 // Eliminamos y Reemplazamos demás caracteres especiales
	 $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	 $repl = array('', '-', '');
	 $url = preg_replace ($find, $repl, $url);
	 
	 $last=substr($url,(strlen($url)-1),(strlen($url)));
	 if($last=='-') $url=substr($url,0,(strlen($url)-1));
	 return $url; 
}

function enviar_email($para, $titulo, $mensaje, $de, $de_nombre, $path) {
	include_once($path.'inc/class.phpmailer.php');
	$paras = preg_split("/,/",$para);
	if($de_nombre == "") $de_nombre = "Transaction Coordinator 365";
	if($de == "") $de = "management@transactioncoordinator365.com";
	foreach ($paras as $valor) {
		//echo $valor."<br>";
		$mail = new phpmailer();
		$mail->IsMail();                           // tell the class to use SMTP //IsMail
		$mail->Host = "";
		$mail->SMTPAuth = false;     // turn on SMTP authentication
		$mail->Username = "";  // SMTP username
		$mail->Password = ""; // SMTP password
		//$mail->Port = 25; // Puerto a utilizar
		$mail->Sender = $de;
		$mail->From =$de;
		$mail->FromName = $de_nombre;
		$mail->Timeout=30;
		$mail->Subject = ($titulo);
		$mail->IsHTML(true);
		$mail->Body = ($mensaje);
		
		if(!trim($valor)=="") $mail->AddAddress($valor);
		if($mail->Send()) {
			$envio = true;
		} else {
			$envio = false;
		}
	}
	return $envio;
}

function suma_fechas($fecha,$ndias) // d-m-Y
{
	if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
	{
		$escapar = preg_quote("/");
    	list($dia,$mes,$año)=preg_split("/".$escapar."/", $fecha);
    }       
 	if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
	{        
        list($dia,$mes,$año)=preg_split("/-/",$fecha);
        $nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
        $nuevafecha=date("d-m-Y",$nueva);
	}
      return ($nuevafecha);  
}

function formatear_numero($valor) {
	$valor = number_format($valor, 0, ",", ",");
	return $valor;
}

function num_semana($date, $firstDayOfMonth) {    
        $w1 = date("W", $firstDayOfMonth->getTimestamp());
        $w2 = date("W", $date->getTimestamp());

        $weekNum = $w2 - $w1 + 1;
        return $weekNum;
}

function activar_menu($pagina, $menu) {
	$activo = "no";
/*	echo $menu."<br>";
	echo $pagina."<br>";
	echo $_SERVER['SCRIPT_NAME']."<br>";*/
	if(preg_match("/".$pagina."/", $_SERVER['SCRIPT_NAME'])) {
		if($pagina == "contact-list.php") {
			if($menu == $_COOKIE['contact_tipo']) $activo = "si";
		} else {
		$activo = "si";
		}
	}
	if($activo == "si") echo ' class="active" ';
}

function codigo_activacion() {
//alimentamos el generador de aleatorios
	srand (time());
	//generamos un número aleatorio
	$numero_aleatorio = rand(1,1000);
	$clave = $numero_aleatorio;
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	$cad = "";
	for($i=0;$i<3;$i++)	$cad .= substr($str,rand(0,62),1);
	return $clave = $cad.$numero_aleatorio;			
}

function tab_activo($tab_activo, $activar, $bloque) {
	$a = 1;
	while($a<=9) {
	if($tab_activo == $a and $activar == $a) {
		if($bloque == "m") echo ' class="active" ';
		if($bloque == "c") echo ' active';
	}
	$a++;
	}

}
?>