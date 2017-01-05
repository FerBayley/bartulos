<?php
include_once('adodb_lite/adodb.inc.php');
if(preg_match('/MisTrabajos/',$_SERVER['REQUEST_URI'])) {
	$db_host = 'localhost';
	$db_usuario = 'root';
	$db_contra = '852456';
	$db_base = 'bartulos';
	$basepath = "http://localhost/MisTrabajos/bartulosbazar.com.ar/02_bocetos/";
	$inicio_path = 4;	
} else {
	$db_host = '192.168.0.195';
	$db_usuario = 'coti';
	$db_contra = 'Barba3140barbaglia';
	$db_base = 'cotizacion';
	$basepath = 'http://m9000066.ferozo.com/cotizador/';
	$inicio_path = 2;	 
}
function conectar($db_host, $db_usuario, $db_contra, $db_base) {	
	$con=&ADONewConnection('mysql');
	if(@$con->Connect("$db_host","$db_usuario","$db_contra","$db_base")) {
		return $con;
	} else {
		die('Error: No es posible conectarse a la base de datos');
	}
}
?>