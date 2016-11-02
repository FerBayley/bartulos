<?php
//VALIDACIÓN DE CMAPOS
if(empty($_REQUEST['nombre']) || empty($_REQUEST['empresa']) || empty($_REQUEST['email']) || empty($_REQUEST['telefono']) || empty($_REQUEST['mensaje']))
{
	//echo "<script> window.location ='index.php';</script>";
}else{
		//RECEPCIÓN DE DATOS
		$nombre=$_POST['nombre'];
		$empresa=$_POST['empresa'];
		$email=$_POST['email'];
		$telefono=$_POST['telefono'];
		$mensaje=$_POST['mensaje'];

		//CORREO DESTINO
		$cor="fernando.bayley@gmail.com";
		
		//ENVIO DE CORREO
		$de .="MIME-Version: 1.0\n"; 
		$de .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$de .= "Content-type: text/html; charset=UTF-8\r\n"; 
		$de .="From: www.bartulosbazar.com <fernando.bayley@gmail.com, ventas@bartulosbazar.com>\r\n";
		//ASUNTO
		$asunto="Nuevo contacto por sitio web";
		
		//MENSAJE
		$mensaje="
					Mensaje de:<b>".$nombre."</b>
					<br><br>
					<b>DATOS DE CONTACTO</b><br>
					Nombre: <b>".$nombre."</b><br>
					Empresa: <b>".$empresa."</b><br>
					Correo: <b>".$email."</b><br>
					Telefono: <b>".$telefono."</b><br><br>
					Mensaje: <b>".$mensaje."</b><br><br>
					<hr>
					<a href='http://www.bartulosbazar.com' target='_blank'>http://www.bartulosbazar.com</a>
				";

		//ENVIO DE CORREO
		mail($cor, $asunto, $mensaje, $de) or die('Hubo un error');	
		
		//SCRIPT DE CONFIRMACIÓN
		//echo "<script>alert(\"Su mensaje ha sido enviado, gracias por contactarnos, pronto estaremos en contacto con usted.\\n|| www.dospuntoclick.com ||\");</script>";
		//echo "<script> window.location='index.php';</script>";
		header("Location:gracias.php");
	}
?>