<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Bazar gastronomico</title>
	<!-- VIEWPORT -->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
	<!-- VIEWPORT -->
	<link rel="stylesheet" href="public/css/normalize.css" />
	<link rel="stylesheet" href="public/css/main.css" />
	<link href="https://fonts.googleapis.com/css?family=Biryani" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

	<section class="Container">
		<header>
		<!--<span class="Burguer">MENU</span>-->
			<section class="Menu">
				<h1><img src="public/images/logo.png" alt="Bartulos Bazar"></h1>
				<ul>
					<li><span>HOME</span></li>
					<li><a href="empresa.php">EMPRESA</a></li>
					<li><a href="productos.php">PRODUCTOS</a></li>
					<li><a href="#">NOVEDADES</a></li>
					<li><a href="developer.php">CONTACTO</a></li>
				</ul>
			</section> <!--/ Menu -->

			<section class="Slider">
				<img src="public/images/slider/img-1.png" alt="Sarten modelo tal por cual">
			</section> <!--/Slider -->
		</header> <!--/ header -->

		<section class="Destacados">
			<div class="Titulo">
				<div class="Titulo-col1"></div> <!-- / Titulo-col1 -->
				<div class="Titulo-col2">
					<h2>DESTACADOS Y NOVEDADES</h2>
					<br>
					<h3>Sobre nuevos productos, ofertas, novedades</h3>
				</div> <!-- / Titulo-col2 -->
				<div class="Titulo-col3"></div> <!-- / Titulo-col2 -->
			</div> <!-- / Titulo -->
			<div class="Imagen-1">
				<div class="Cuadro">
					<h2 class="Cuadro-titulo">¡NUEVAS OLLAS Y CACEROLAS</h2>
					<h3 class="Cuadro-subtitulo">Contactanos</h3>
				</div> <!-- / Cuadro -->
			</div> <!--/ Imagen-1 -->
			<div class="Imagen-2">
				<div class="Cuadro">
					<h2 class="Cuadro-titulo">CATÁLOGO ONLINE</h2>
					<h3 class="Cuadro-subtitulo">Contactanos</h3>
				</div> <!-- / Cuadro -->
			</div> <!--/ Imagen-2 -->
			<div class="Imagen-3">
				<div class="Cuadro">
					<h2 class="Cuadro-titulo">DESCUENTOS</h2>
					<h3 class="Cuadro-subtitulo">Contactanos</h3>
				</div> <!-- / Cuadro -->
			</div> <!--/ Imagen-3 -->
			<div class="Imagen-4">
				<div class="Cuadro">
					<h2 class="Cuadro-titulo">TRABAJO DESTACADO</h2>
					<h3 class="Cuadro-subtitulo">Contactanos</h3>
				</div> <!-- / Cuadro -->
			</div> <!--/ Imagen-4 -->
		</section> <!--/ Destacados -->

		<section class="Servicios">
			<div class="Servicios-logo">
				<img src="public/images/salero-big.png" alt="Bartulos Bazar">
			</div> <!--/ Servicios-logo -->

			<div class="Servicios-descripcion">
				<article>
					<p>
						<span>Bártulos, Bazar Gastronómico</span>, nace con el deseo de poder acompañar, guiar, asesorar a los clientes en todas las compras de productos para que puedan satisfacer sus necesidades de la manera más productiva y competitiva para su organización.
					</p>
						<a href="#">
							CONOCÉ NUESTROS SERVICIOS
						</a>
				</article>
			</div> <!-- /Servicios-descripcion -->
		</section> <!--/ Servicios -->

			<div class="Titulo">
				<div class="Titulo-col1Interno"></div> <!-- / Titulo-col1 -->
				<div class="Titulo-col2Interno">
					<h2>CÓMO SOLICITO PRESUPUESTO?</h2>
					<br>
					<h3>En cuatro sencillos pasos para que coticemos tu pedido</h3>
				</div> <!-- / Titulo-col2 -->
				<div class="Titulo-col3"></div> <!-- / Titulo-col2 -->
			</div> <!-- / Titulo -->

			<section class="Presupuestar">
				<div class="Presupuestar-1">
					<img src="public/images/paso1.jpg" alt="Pasos de compra 1">
					<p>INGRESA A NUESTRA <span class="Colores">SECCION PRODUCTOS</span></p>
				</div> <!-- / Presupuestar-1 -->

				<div class="Presupuestar-2">
					<img src="public/images/paso2.jpg" alt="Pasos de compra 2">
					<p><span class="Colores">BUSCA TODO LO QUE NECESITAS</span> EN NUESTROS CATALOGOS</p>
				</div> <!-- / Presupuestar-2 -->

				<div class="Presupuestar-3">
					<img src="public/images/paso3.jpg" alt="Pasos de compra 3">
					<p>ELEGI LOS QUE QUERES Y <span class="Colores">CARGALOS AL CARRITO DE PRESUPUESTO</span></p>
				</div> <!-- / Presupuestar-3 -->

				<div class="Presupuestar-4">
					<img src="public/images/paso4.jpg" alt="Pasos de compra 4">
					<p>LLENA TUS DATOS, <span class="Colores">Y ENVIANOS TU PEDIDO. !EN BREVE TE ESTAREMOS CONTACTANDO!</span></p>
				</div> <!-- / Presupuestar-4 -->
			</section> <!-- / Presupuestar -->


		<section class="Imagen-separador">
			<img src="public/images/puntos.jpg" alt="Puntos">
		</section> <!-- / Imagen-separador -->

		<section class="Urgencias">
			<img src="public/images/urgencias.jpg" alt="Urgencias Bartulos">
		</section> <!-- / Urgencias -->

		<?php include("includes/footer.php"); ?>
	</section> <!--/Container -->

	<script>
		var $Burguer = document.getElementById('MenuDesplegable');
		var $Desplegable = document.getElementById('CloseMenu');

		$Burguer.addEventListener('touchstart', function(){
			$Desplegable.classList.toggle('active')
		});
		//$Desplegable.classList.toggle('active')
	</script>
</body>
</html>