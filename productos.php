<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Productos</title>
	<!-- VIEWPORT -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<!-- VIEWPORT -->
	<link rel="stylesheet" href="assets/css/normalize.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/responsive.css" />
	<link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

	<section class="Container">
		<header class="Interno">
			<div class="Interno-a">
				<h1>
					<a href="index.php">
						<img src="assets/images/logo-interno.png" alt="Bartulos Bazar">
					</a>
				</h1>
			</div> <!-- / Interno-a -->

			<div class="Interno-b">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="empresa.php"><span>EMPRESA</span></a></li>
					<li><a href="productos.php">PRODUCTOS</a></li>
					<li><a href="developer.php">NOVEDADES</a></li>
					<li><a href="contacto.php">CONTACTO</a></li>
				</ul>
			</div> <!-- / Interno-b -->

			<div class="Interno-c">
				<ul>
					<li>
						<a href="https://www.facebook.com/bartulosbazargastronomico/?fref=ts" 
						target="_blanck">
							<img src="assets/images/facebook-header.png" alt="Facebook">
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/bartulos_bazargastronomico/" target="_blanck"><img src="assets/images/instagram-header.png" alt="Instagram">
						</a>
					</li>
				</ul>
			</div> <!-- / Interno-c -->
		</header> <!-- / Interno -->

		<section class="Sombra">
			<img src="assets/images/sombrabotonera.png" alt="Sombra">
		</section> <!-- / Sombra -->

		<section class="Productos">
			<h2>Nuestra oferta de productos.</h2>
			<!--<h3>Seleccione la categoría deseada:</h3> -->
		</section> <!-- / Productos -->

		<section class="Galeria">

			<div class="Galeria-1">
				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=1&id_marca=&id_material=">
					<img src="assets/images/accesorios.png" alt="Accesorios">
					<h2>ACCESORIOS</h2>
				</a>

				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=5&id_marca=&id_material=">
					<img src="assets/images/maquinas.png" alt="Maquinaria">
					<h2>MAQUINARIAS & EQUIPAMIENTO</h2>
				</a>
			</div> <!-- / Productos-1 -->

			<div class="Galeria-2">
				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=3&id_marca=&id_material=">
					<img src="assets/images/cristaleria.png" alt="Cristaleria">
					<h2>CRISTALERÍA</h2>
				</a>

				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=6&id_marca=&id_material=">
					<img src="assets/images/ollas.png" alt="Ollas">
					<h2>OLLAS & SARTENES</h2>
				</a>
			</div> <!-- / Productos-2 -->

			<div class="Galeria-3">
				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=4&id_marca=&id_material=">
					<img src="assets/images/cubiertos.png" alt="Cubiertos">
					<h2>CUBIERTOS</h2>
				</a>
				
				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=7&id_marca=&id_material=">
					<img src="assets/images/vajilla-catalogo.png" alt="Vajilla">
					<h2>VAJILLA</h2>
				</a>
			</div> <!-- / Productos-3 -->

			<div class="Galeria-4">
				<a href="http://www.bartulosbazar.com/categorias.php?id_categoria=2&id_marca=&id_material=">
					<img src="assets/images/buffet.png" alt="Buffet">
					<h2>BUFFET</h2>
				</a>

				<img src="assets/images/novedades.png" alt="OFERTAS">
				<h2>¡OFERTAS!</h2>
			</div> <!-- / Productos-4 -->
		</section> <!-- / Productos-galeria -->

		<!-- SECCION PROMOCIONES -->

	<?php include("includes/presupuestar.php"); ?>
	<?php include("includes/path.php"); ?>
	<?php include("includes/footer.php"); ?>
	</section> <!--/Container -->
	<?php include_once("includes/analyticstracking.php") ?>
</body>
</html>