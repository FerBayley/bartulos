<?php
include("config.php");
$query = "SELECT * FROM bar_productos WHERE id = '$id_producto' ";
$rs_producto=$con->Execute($query);
$query = "SELECT * FROM bar_productos WHERE id <> '$id_producto' LIMIT 0,6 ";
$rs_productos_relacionados=$con->Execute($query);
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Producto P-32</title>
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
         <!-- / Interno -->
		<section class="Sombra">
			<img src="assets/images/sombrabotonera.png" alt="Sombra">
		</section> <!-- / Sombra -->

		<section class="Productos">
			<h2><?php echo $rs_producto->fields['nombre']?></h2>
			<!--<h3>Seleccione la categoría deseada:</h3> -->
		</section> <!-- / Productos -->

		<?php include("buscador.php")?>

		<section class="Columnas">
			<?php include("sidebar.php")?>
			
				<section class="ColumnasProductos1">
					<img src="img/productos/grandes/<?php echo $rs_producto->fields['imagen1']?>" alt="<?php echo $rs_producto->fields['nombre']?>">
					<h3>COD: <?php echo $rs_producto->fields['codigo']?></h3>
					...................
				</section> <!-- / ColumnasProductos1 -->

				<section class="ColumnasProductos2">
					<?php if($rs_producto->fields['etiqueta'] !=="") {?><div class="Tag"><?php echo $rs_producto->fields['etiqueta']?></div><?php }?>
					<h2><?php echo $rs_producto->fields['nombre']?></h2>
					<p><?php echo nl2br($rs_producto->fields['descripcion'])?></p>
					<form action="producto.php" method="get">
                    <h3 class="Cantidad">- 2 +</h3>
                    <input id="cantidad" name="value" value="1">
					<div class="BotonAgregar">
						<a href="#">PRESUPUESTAR</a>
                        <button type="submit">PRESUPUESTAR</button>
					</div>
                    <input type="hidden" name="action" value="agregar">
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto?>">
                    </form>
				</section> <!-- / ColumnasProductos2 -->
		</section> <!-- / Columnas -->

		<!-- SECCION PROMOCIONES -->
	<?php include("includes/presupuestar.php"); ?>

	<div class="Relacionados">
	............................................ Productos relacionados ...........................................
	</div> <!-- / Relacionados -->

		<section class="Columnas">
			<div class="Columnas-1">
			</div> <!-- / Columnas-1 -->
            <?php
			$a = 2;
			while(!$rs_productos_relacionados->EOF) {?>
            <div class="Columnas-<?php echo $a?>">
				<img src="img/productos/chicas/<?php echo $rs_productos_relacionados->fields['imagen1']?>" alt="<?php echo $rs_productos_relacionados->fields['nombre']?>">
				<h2><?php echo $rs_producto->fields['descripcion']?></h2>
				<p>...............................................</p>
				<a href="producto.php?id_producto=<?php echo $rs_productos_relacionados->fields['id']?>">SOLICITAR PRESUPESTO</a>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-<?php echo $a?> -->
			<?php
			$a++;
            $rs_productos_relacionados->MoveNext();
			}
			?>
		</section> <!-- / Columnas -->

	<?php include("includes/path.php"); ?>
	<?php include("includes/footer.php"); ?>
	</section> <!--/Container -->
	<?php include_once("includes/analyticstracking.php") ?>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
  $( function() {
    $( "#cantidad" ).spinner({
      spin: function( event, ui ) {
        if ( ui.value > 10 ) {
          $( this ).spinner( "value", 10 );
          return false;
        } else if ( ui.value < 1 ) {
          $( this ).spinner( "value", 1 );
          return false;
        }
      }
    });
  } );
  </script>
</body>
</html>