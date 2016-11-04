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
			<h2>Vajilla</h2>
			<!--<h3>Seleccione la categoría deseada:</h3> -->
		</section> <!-- / Productos -->

		<section class="Buscador">
			<img src="caja-busqueda.jpg" alt="">
			<input id="name" class="input" name="name" type="text" placeholder="Ingresa tu búsqueda" />
		</section> <!-- / Buscador -->

		<section class="Columnas">
			<div class="Columnas-1">
				<h2>CATEGORIAS</h2>
				<ul>
					<li><a href="#">ACCESORIOS</a></li>
					<li><a href="#">CRISTALERIA</a></li>
					<li><a href="#">CUBIERTOS</a></li>
					<li><a href="#">BUFFET</a></li>
					<li><a href="#">MAQUINARIAS & EQUIPAMIENTO</a></li>
					<li><a href="#">OLLAS & SARTENES</a></li>
					<li><a href="#">ACCESORIOS</a></li>
					<li><a href="#">VAJILLA</a></li>
				</ul>

				<div class="Separador-listas"></div> <!-- / Separador-listas -->

				<h2>MARCAS</h2>
				<ul>
					<li><a href="#">MARCA 1</a></li>
					<li><a href="#">MARCA 2</a></li>
					<li><a href="#">MARCA 3</a></li>
				</ul>

				<div class="Separador-listas"></div> <!-- / Separador-listas -->

				<h2>MATERIALES</h2>
				<ul>
					<li><a href="#">ACERO INOXIDABLE</a></li>
					<li><a href="#">ALUMINIO</a></li>
					<li><a href="#">PLASTICO</a></li>
					<li><a href="#">VIDRIO</a></li>
				</ul>
			</div> <!-- / Columnas-1 -->
			
				<section class="ColumnasProductos1">
					<img src="assets/images/productos/p-32.jpg" alt="">
					<h3>COD: 2372368</h3>
					...................
				</section> <!-- / ColumnasProductos1 -->

				<section class="ColumnasProductos2">
					<div class="Tag">NUEVO!</div>
					<h2>Titulo del producto a presupuestar</h2>
					<p>Breve descripción del producto.</p>
					<h3 class="Cantidad">- 2 +</h3>
					<div class="BotonAgregar">
						<a href="#">PRESUPUESTAR</a>
					</div>
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
			<div class="Columnas-2">
				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>Nombre de producto Breve descripción de este producto</h2>
				<p>...............................................</p>
				<a href="#">SOLICITAR PRESUPESTO</a>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-2 -->

			<div class="Columnas-3">
				<img src="assets/images/productos/p-33.jpg" alt="">
				<h2>Nombre de producto Breve descripción de este producto</h2>
				<p>...............................................</p>
				<a href="#">SOLICITAR PRESUPESTO</a>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-3 -->

			<div class="Columnas-4">
				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>Nombre de producto Breve descripción de este producto</h2>
				<p>...............................................</p>
				<a href="#">SOLICITAR PRESUPESTO</a>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-4 -->
		</section> <!-- / Columnas -->

	<?php include("includes/path.php"); ?>
	<?php include("includes/footer.php"); ?>
	</section> <!--/Container -->
	<?php include_once("includes/analyticstracking.php") ?>
</body>
</html>