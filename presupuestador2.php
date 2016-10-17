<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Presupuestador 2</title>
	<!-- VIEWPORT -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<!-- VIEWPORT -->
	<link rel="stylesheet" href="public/css/normalize.css" />
	<link rel="stylesheet" href="public/css/main.css" />
	<link rel="stylesheet" href="public/css/responsive.css" />
	<link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

	<section class="Container">	
		<header class="Interno">
			<div class="Interno-a">
				<h1>
					<a href="index.php">
						<img src="public/images/logo-interno.png" alt="Bartulos Bazar">
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
							<img src="public/images/facebook-header.png" alt="Facebook">
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/bartulos_bazargastronomico/" target="_blanck"><img src="public/images/instagram-header.png" alt="Instagram">
						</a>
					</li>
				</ul>
			</div> <!-- / Interno-c -->
		</header> <!-- / Interno -->

		<section class="Sombra">
			<img src="public/images/sombrabotonera.png" alt="Sombra">
		</section> <!-- / Sombra -->

		<section class="Productos">
			<div class="Sec1">
				<img src="public/images/carrito.jpg" width="123px" height="119px" alt="">
			</div> <!-- / Sec1 -->

			<div class="Sec2">
				<h2>Carrito de Presupuesto!</h2>
				<h3>Productos elegidos a cotizar</h3>
			</div> <!-- / Sec2 -->
		</section> <!-- / Productos -->

	<section class="Novedades">
		
		<div class="Presupuesto4">
			<div class="Presupuesto4-col1">
				<img src="public/images/paellera.jpg" alt="">
			</div> <!-- / Presupuesto4-col1 -->

			<div class="Presupuesto4-col2">
				<h6>ÍTEM</h6>
				<h2>Chafing baño maría</h2>
				<p>rectangular doble, con tapa rebatible capacidad: 8000 cc.</p>
				<h6>CÓDIGO #2451009</h6>
			</div> <!-- / Presupuesto4-col2 -->

			<div class="Presupuesto4-col3">
				<h6>CANTIDAD</h6>
				</br>
				<img src="public/images/num1.jpg" alt="">
			</div> <!-- / Presupuesto4-col3 -->

			<div class="Presupuesto4-col4">
				<h6>DETALLES</h6>
				<p>Consultar disponiblidad de stock, cotización y tiempos de entrega.</p>
			</div> <!-- / Presupuesto4-col4 -->
		</div> <!-- / Presupuesto4 -->
	</section> <!-- / Novedades -->

		<section class="FormualarioDeContacto">
			<img src="public/images/formulario.jpg" alt="">
		</section> <!-- / FormualarioDeContacto -->

		<section class="Urgencias"></section> <!-- / Urgencias -->

	<section class="Footerbartulos"></section>
	
	<?php include("includes/footer.php"); ?>

	</section> <!--/Container -->
	
</body>
</html>