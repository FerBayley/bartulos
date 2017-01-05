<?php
include("config.php");
$aux_filtro = "WHERE id > '0' ";
$titulo = "Productos";
if($senal == "buscar") {
	//CATEGORIA
	$aux_filtro = " WHERE nombre LIKE '%$texto%' ";
	$query = "SELECT * FROM bar_categorias WHERE nombre LIKE '%$texto%' ";
	$rs_db=$con->Execute($query);
	while(!$rs_db->EOF) {
		$aux_filtro1 .= " id_categoria = '".$rs_db->fields['id']."' OR ";
	$rs_db->MoveNext();
	}
	if(!$aux_filtro1 =="") {
		$aux_filtro1 = substr($aux_filtro1,0,strlen($aux_filtro1)-3);
		$aux_filtro .= " OR (".$aux_filtro1.")";	
	}
	//MARCAS
	$query = "SELECT * FROM bar_marcas WHERE nombre LIKE '%$texto%' ";
	$rs_db=$con->Execute($query);
	while(!$rs_db->EOF) {
		$aux_filtro2 .= " id_marca = '".$rs_db->fields['id']."' OR ";
	$rs_db->MoveNext();
	}
	if(!$aux_filtro2 =="") {
		$aux_filtro2 = substr($aux_filtro2,0,strlen($aux_filtro2)-3);	
		$aux_filtro .= " OR (".$aux_filtro2.")";	
	}
	//MATERIALES
	$query = "SELECT * FROM bar_materiales WHERE nombre LIKE '%$texto%' ";
	$rs_db=$con->Execute($query);
	while(!$rs_db->EOF) {
		$aux_filtro3 .= " id_material = '".$rs_db->fields['id']."' OR ";
	$rs_db->MoveNext();
	}
	if(!$aux_filtro3 =="") {
		$aux_filtro3 = substr($aux_filtro3,0,strlen($aux_filtro3)-3);		
		$aux_filtro .= " OR (".$aux_filtro3.")";	
	}
}
if(!$id_categoria == "") {
	$aux_filtro .= " AND id_categoria = '$id_categoria' ";
	$titulo_categoria = mostrar_info("bar_categorias", $con, $id_categoria, "id", "nombre", "");
}
if(!$id_marca == "") {
	$aux_filtro .= " AND id_marca = '$id_marca' ";
	$titulo_marca = mostrar_info("bar_marcas", $con, $id_marca, "id", "nombre", "");
}
if(!$id_material == "") {
	$aux_filtro .= " AND id_material = '$id_material' ";
	$titulo_material = mostrar_info("bar_materiales", $con, $id_material, "id", "nombre", "");
}
$query = "SELECT * FROM bar_productos $aux_filtro ORDER BY nombre ASC ";
$rs_productos=$con->Execute($query);
$registros_por_columnas = round($rs_productos->RecordCount()/3);
if($registros_por_columnas == 0) $registros_por_columnas = 4;
$query = "SELECT * FROM bar_productos $aux_filtro ORDER BY nombre ASC LIMIT 0, $registros_por_columnas ";
$rs_productos1=$con->Execute($query);
$query = "SELECT * FROM bar_productos $aux_filtro ORDER BY nombre ASC LIMIT ".$registros_por_columnas.", $registros_por_columnas ";
$rs_productos2=$con->Execute($query);
$query = "SELECT * FROM bar_productos $aux_filtro ORDER BY nombre ASC LIMIT ".($registros_por_columnas*2).", $registros_por_columnas ";
$rs_productos3=$con->Execute($query);
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
<meta charset="UTF-8">
<title>Bartulos Bazar - <?php echo $titulo?></title>
<!-- VIEWPORT -->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
<!-- VIEWPORT -->
<link rel="stylesheet" href="assets/css/normalize.css" />
<link rel="stylesheet" href="assets/css/main.css" />
<link rel="stylesheet" href="assets/css/styles.css" />
<link rel="stylesheet" href="assets/css/responsive.css" />
<link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
<section class="Container">
  <?php include("header.php") ?>
  <section class="Sombra"> <img src="assets/images/sombrabotonera.png" alt="Sombra"> </section>
  <!-- / Sombra -->
  
  <section class="Productos">
    <h2><?php echo $titulo?></h2>
    <p>
    <?php if(!$id_categoria == "") {?><?php echo $titulo_categoria?> (<a href="categorias.php?id_marca=<?php echo $id_marca?>&id_material=<?php echo $id_material?>">X</a>)<?php }?> <?php if(!$id_marca == "") {?><?php echo $titulo_marca?> (<a href="categorias.php?id_categoria=<?php echo $id_categoria?>&id_material=<?php echo $id_material?>">X</a>)<?php }?> <?php if(!$id_material == "") {?><?php echo $titulo_material?> (<a href="categorias.php?id_marca=<?php echo $id_marca?>&id_categoria=<?php echo $id_categoria?>">X</a>)<?php }?>
    </p>
  </section>
  <!-- / Productos -->
  
<?php include("buscador.php")?>
  <!-- / Buscador -->
  
  <section class="Columnas">
    <?php include("sidebar.php")?>
          <?php if($rs_productos1->EOF) {?>
	      <div class="Columnas-2"><h3>No existe productos</h3><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

      <?php }?>
    <div class="Columnas-2">
      <?php while(!$rs_productos1->EOF) {?>
      <img src="img/productos/chicas/<?php echo $rs_productos1->fields['imagen1']?>" alt="<?php echo $rs_productos1->fields['nombre']?>">
      <h2><?php echo $rs_productos1->fields['descripcion']?></h2>
      <p>...............................................</p>
      <a href="producto.php?id_producto=<?php echo $rs_productos1->fields['id']?>">SOLICITAR PRESUPUESTO</a>
      <div class="Separador"></div>
      <!-- / Separador -->
      <?php
		     $rs_productos1->MoveNext();
			}
			?>
    </div>
    <!-- / Columnas-2 -->
    <div class="Columnas-3">
      <?php while(!$rs_productos2->EOF) {?>
      <img src="img/productos/chicas/<?php echo $rs_productos2->fields['imagen1']?>" alt="<?php echo $rs_productos2->fields['nombre']?>">
      <h2><?php echo $rs_productos2->fields['descripcion']?></h2>
      <p>...............................................</p>
      <a href="producto.php?id_producto=<?php echo $rs_productos2->fields['id']?>">SOLICITAR PRESUPUESTO</a>
      <div class="Separador"></div>
      <!-- / Separador -->
      <?php
		     $rs_productos2->MoveNext();
			}
			?>
    </div>
    <!-- / Columnas-3 -->
    <div class="Columnas-4">
      <?php while(!$rs_productos3->EOF) {?>
      <img src="img/productos/chicas/<?php echo $rs_productos3->fields['imagen1']?>" alt="<?php echo $rs_productos3->fields['nombre']?>">
      <h2><?php echo $rs_productos3->fields['descripcion']?></h2>
      <p>...............................................</p>
      <a href="producto.php?id_producto=<?php echo $rs_productos3->fields['id']?>">SOLICITAR PRESUPUESTO</a>
      <div class="Separador"></div>
      <!-- / Separador -->
      <?php
		     $rs_productos3->MoveNext();
			}
			?>
    </div>
    <!-- / Columnas-4 --> 
  </section>
  <!-- / Columnas --> 
  
  <!-- SECCION PROMOCIONES -->
  <?php include("includes/presupuestar.php"); ?>
  <?php include("includes/path.php"); ?>
  <?php include("includes/footer.php"); ?>
</section>
<!--/Container -->
<?php include_once("includes/analyticstracking.php") ?>
</body>
</html>