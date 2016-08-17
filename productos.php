<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Productos</title>
	<link rel="stylesheet" href="public/css/normalize.css" />
	<link rel="stylesheet" href="public/css/main.css" />
	<link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

	<section class="Container">	

		<header class="Interno">
			<div class="Interno-1">
				<img src="public/images/logo-interno.png" alt="">
			</div> <!-- / Interno-1 -->

			<div class="Interno-2">
				<div class="Menu-Interno">
					<ul>
						<li><a href="#">HOME</a></li>
						<li><a href="#">EMPRESA</a></li>
						<li><a href="#"><span>PRODUCTOS</span></a></li>
						<li><a href="#">NOVEDADES</a></li>
						<li><a href="#">CONTACTO</a></li>
						<li class="Mini"><a href="#"><img src="public/images/facebook-header.png" alt="Facebook"></a></li>
						<li class="Mini"><a href="#"><li><a href="#"><img src="public/images/instagram-header.png" alt="Instagram"></a></li></a></li>
					</ul>
				</div> <!-- / Menu-Interno -->
			</div> <!-- / Interno-2 -->
		</header> <!-- / Interno -->


		<section class="Productos">
			<h2>Nuestros productos.</h2>
			<h3>Seleccione la categoría deseada:</h3>
		</section> <!-- / Productos -->


		<section class="Galeria">

			<div class="Galeria-1">
				<img src="public/images/accesorios.png" alt="Accesorios">
				<h2>ACCESORIOS</h2>

				<img src="public/images/maquinas.png" alt="Maquinaria">
				<h2>MAQUINARIAS & EQUIPAMIENTO</h2>
			</div> <!-- / Productos-1 -->

			<div class="Galeria-2">
				<img src="public/images/cristaleria.png" alt="Cristaleria">
				<h2>CRISTALERÍA</h2>

				<img src="public/images/ollas.png" alt="Ollas">
				<h2>OLLAS & SARTENES</h2>
			</div> <!-- / Productos-2 -->

			<div class="Galeria-3">
				<img src="public/images/cubiertos.png" alt="Cubiertos">
				<h2>CUBIERTOS</h2>

				<img src="public/images/vajilla-catalogo.png" alt="Vajilla">
				<h2>VAJILLA</h2>
			</div> <!-- / Productos-3 -->

			<div class="Galeria-4">
				<img src="public/images/buffet.png" alt="Buffet">
				<h2>BUFFET</h2>

				<img src="public/images/novedades.png" alt="OFERTAS">
				<h2>¡OFERTAS!</h2>
			</div> <!-- / Productos-4 -->
		</section> <!-- / Productos-galeria -->

		<section class="Promos">
			<div class="Promos-1">
				<img src="public/images/promo1.png" alt="Promocion">
			</div><!-- / Promos-1 -->

			<div class="Promos-2">
				<img src="public/images/promo2.png" alt="Promocion">
			</div><!-- / Promos-2 -->
		</section> <!-- / Promos -->

		
	<?php include("includes/path.php"); ?>
	
	<?php include("includes/footer.php"); ?>

	</section> <!--/Container -->
	
</body>
</html>