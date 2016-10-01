<!DOCTYPE html>
<html lang="es-AR">
<head>
	<meta charset="UTF-8">
	<title>Bartulos Bazar - Contacto</title>
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
				<h2>Contáctenos.</h2>
				<h3>Háganos llegar sus consultas.</h3>
			</section> <!-- / Productos -->

			<section class="Contacto">
				<div class="Contacto-1">
					<div class="Formulario">
				        <form action="enviar.php" method="post">
				            <input type="text" name="nombre" placeholder="NOMBRE Y APELLIDO" required>
				            <input type="text" name="empresa" placeholder="EMPRESA" required>
				            <input type="text" name="email" placeholder="EMAIL" required>
		  		            <input type="text" name="telefono" placeholder="TELEFONO" required>
				            <textarea name="mensaje" placeholder="CONSULTA"></textarea>
				            <input type="submit" value="ENVIAR CONSULTA" id="boton">
				        </form>
		    		</div> <!-- / Formulario -->
				</div> <!-- / Contacto-1 -->

				<div class="Contacto-2">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.3296045833813!2d-58.39303224932181!3d-34.59582596449153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccabe90271eff%3A0xc9dcb629f17b8bf4!2sAv.+Santa+Fe+1643%2C+C1060ABC+CABA!5e0!3m2!1ses!2sar!4v1475077147024" width="450" height="465" frameborder="0" style="border:0" allowfullscreen></iframe>
					<p>Av. Santa Fe 1643 - C.A.B.A. / Buenos Aires</p>
					<p>CP. 1480 - Tel. +54 9 11 37 99 74 60</p>
					<p><a href="http://www.bartulosbazar.com">www.bartulosbazar.com</a></p>
					<p><a href="mailto:contacto@bartulosbazar.com">contacto@bartulosbazar.com</a></p>
				</div> <!-- / Contacto-2 -->
			</section> <!-- / Contacto -->

	<?php include("includes/path.php"); ?>
	<?php include("includes/footer.php"); ?>
	</section> <!--/Container -->
</body>
</html>