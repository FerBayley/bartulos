<?php
define(CONS_DOMINIO, $basepath);
define(CONS_PARA, 'marianobini08@gmail.com');
define(CONS_ENVIADO_POR, 'from: info@turismobarbaglia.com');
define(CONS_SESSION, $_SESSION['session_bartulos_admin']);

$ip = getRealIP();
$query = "SELECT ip FROM bar_ip_bloqueadas WHERE ip = '$ip' LIMIT 0, 1 ";
$rs_db=$con->Execute($query);
if(!$rs_db->EOF) {
	redireccionar(CONS_DOMINIO."404.php");
}

function getRealIP() {
   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' ) {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               'unknown' );
      $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);
      reset($entries); 
      while (list(, $entry) = each($entries)) {
         $entry = trim($entry);
         if ( preg_match('/^([0-9]+\\.[0-9]+\\.[0-9]+\\.[0-9]+)/', $entry, $ip_list) ) {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\\./',
                  '/^127\\.0\\.0\\.1/',
                  '/^192\\.168\\..*/',
                  '/^172\\.((1[6-9])|(2[0-9])|(3[0-1]))\\..*/',
                  '/^10\\..*/');

            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

            if ($client_ip != $found_ip) {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   } else {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               'unknown' );
   }
   return $client_ip;
}

function anti_hacker($string, $campo, $con) {
	$dominio = CONS_DOMINIO;
	$para = CONS_PARA;
	$envoyby = CONS_ENVIADO_POR;
	$ip = getRealIP();
	//echo $string;
	if($string !=='') {
		$bad_words = array(
		 //"'",  
		 //"--",  
		 //";",  
		 //"<",  
		 //"[",  
		 //"&lt;",  
		 //">",
		':2082/index.html?',
		'<a href=\\',
		'[url=',
		'union all select',
		'order by ',
		'and 1>1',
		'/*',
//		 "&gt",  
//		 "&quot",  
		 '&#x27',  
		 '&#x2F',  
		 '/*',  
		 '*/',  
		 'select ',  
		 'declare ',  
		 'insert ',  
		 'update ',  
		 'drop ',  
		 'exec(',  
		 'execute(',  
		 'cast(',  
		// 'nchar',  
		 'varchar',  
		 'nvarchar',   
		 'substring',  
		 'sysobject',  
		 'iframe',  
		 'syscolumns',
		// '.php',
//		 'http',
		 'win.ini',
		 '../',	
//		 "delete",	
		  );
		for($i=0; $i<count($bad_words); $i++) {
			if(strstr(strtoupper($string), strtoupper($bad_words[$i]))) {
				agregar_ip($con);
				$titulo  = 'valor ingresado no permitido -  $dominio ';
				$mensaje = 'Campo: '.$campo.'\n\n';
				$mensaje .= 'IP: '.$ip.'\n\n';
				$mensaje .= 'Valor no permitido: '.$bad_words[$i].'\n\n';
				$mensaje .= 'Valor enviado: '.$string.'\n\n';
				$mensaje .= 'Sessión: '.CONS_SESSION.'\n\n';						
				$mensaje .= 'URL: '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'\n\n';	
				//echo $mensaje;
				//die();
				@mail($para,$titulo,$mensaje,$envoyby);
				header('location:'.$dominio.'/404.php');
				redireccionar($dominio."/404.php");
				die();
				return(false);
				
			}
		}
	}
}

function comprobar_extension($ext, $ext_permitidas, $nombre_archivo, $campo, $con) {
	if(!preg_match('/'.$ext.'/',$ext_permitidas)) {
		agregar_ip($con);
		$dominio = CONS_DOMINIO;
		$para = CONS_PARA;
		$envoyby = CONS_ENVIADO_POR;
		//die();
		$ip = getRealIP();
		$titulo  = 'Archivo cargado no permitido -  $dominio ';
		$mensaje .= 'IP: '.$ip.'\n\n';
		$mensaje .= 'Valor permitido: '.$ext_permitidas.'\n\n';		
		$mensaje .= 'Valor no permitido: '.$ext.'\n\n';
		$mensaje .= 'Valor del campo: '.$nombre_archivo.'\n\n';
		$mensaje .= 'Nombre del campo: '.$campo.'\n\n';
		$mensaje .= 'Sessión: '.CONS_SESSION.'\n\n';		
		$mensaje .= 'URL: '.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'\n\n';												
		//echo $mensaje;
		//die();
		//die();
		$para = CONS_PARA;
		@mail($para,$titulo,$mensaje,$envoyby);
		die();
		return false;
	}
}

function agregar_ip($con) {
	$ip = getRealIP();
	$fecha = date('Y-m-d');
	$hora = date('H:i');
	$query = "INSERT INTO bar_ip_bloqueadas (`id`, `ip`, `fecha`, `hora`) VALUES (NULL, '$ip', '$fecha', '$hora')";
	$rs_db=$con->Execute($query);
}

//// SEGURIDAD /////
foreach($_POST as $k => $v) {
	anti_hacker($v, $k, $con); 
}

foreach($_GET as $k => $v) {
	anti_hacker($v, $k, $con); 
}

foreach($_FILES as $k => $v) {
	anti_hacker($_FILES[$k]['name'], $k, $con);
	$ext = obtener_extension($_FILES[$k]['name']);			
	comprobar_extension($ext, '.jpg, .gif, .jpeg, .png, .pdf, .doc, .rtf, .mdb .rar .ocx .xls .bmp', $_FILES[$k]['name'], $k, $con);																 
}

foreach($_COOKIE as $k => $v) {
	anti_hacker($v, $k, $con); 
}
//// SEGURIDAD /////
?>