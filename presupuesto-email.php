<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Vajilla</title>
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

		<section class="Recuento">
			<h2>Gracias, a la brevedad estar&aacute; llegando tu presupuesto.</h2>
			<!--<h3>Seleccione la categoría deseada:</h3> -->
		</section> <!-- / Productos -->

		<section class="Presuesto">
			<input type="text" id="email" placeholder="Ingresa tu email para presupuestar">
			<input type="submit" id="boton" value="PRESUPUESTAR">
		</section> <!-- / Presupuesto -->

		<section class="Columnas">
			<div class="Columnas-2">
				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->

				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->

				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-2 -->



			<div class="Columnas-2">
				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->

				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->

				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-2 -->



			<div class="Columnas-3">
				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->

				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->

				<img src="assets/images/productos/p-32.jpg" alt="">
				<h2>12 cuencos en vajilla color blanco</h2>
				<strong class="Verne">Valor unidad: AR$45 c/u</strong>
				<div class="Separador"></div> <!-- / Separador -->
			</div> <!-- / Columnas-3 -->
		</section> <!-- / Columnas -->

		<!-- SECCION PROMOCIONES -->
	<?php include("includes/presupuestar.php"); ?>
	<?php include("includes/path.php"); ?>
	<?php include("includes/footer.php"); ?>
	</section> <!--/Container -->
	<?php include_once("includes/analyticstracking.php") ?>
</body>
</html>