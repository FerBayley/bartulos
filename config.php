<?php
session_start();
error_reporting("E_ERROR | E_WARNING | E_PARSE");
extract($_REQUEST);
$idsession=session_id();
include_once("inc/funciones.php");
include_once("inc/conectar.php");
$con = conectar($db_host, $db_usuario, $db_contra, $db_base);
$parametros=preg_replace("'.html'","",$parametros);
$parts=preg_split("/\//",$parametros);
$hoy = date('Y-m-d');
?>