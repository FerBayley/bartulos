<?php
session_start();
extract($_REQUEST);
include_once('inc/config.inc.php');
include_once('../inc/conectar.php');
$con = conectar($db_host, $db_usuario, $db_contra, $db_base);
include_once('../inc/funciones.php');
//include_once('../inc/seguridad-global.php');

$params=preg_replace("'.html'","",$_SERVER['REQUEST_URI']);
$parts=preg_split("/\//",$params);
$partes=count($parts);
$pagina = $parts[$inicio_path+1];

//include_once('../../inc/seguridad-global.php');
$id_admin = $_SESSION['session_bartulos_admin'];

$query = "SELECT * FROM bar_administradores WHERE id = '".$id_admin."' ";
$rs_admin=$con->Execute($query);
$hoy = date('Y-m-d');

$titulo_admin = "Bartulos Bazar - Panel de Cotizaciones";
$autor_admin = "";
?>