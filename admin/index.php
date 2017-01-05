<?php
include("inc/config.php");
if($senal == "login") login($login_email, $login_contrasenia, "bar_administradores", "email", "contrasenia", "admin", "home.php?idsession=", "index.php?alerta=login", $con, $config_session);
if($alerta == "login") $alerta = "El email o contraseña no son correctos";
if($alerta == "salir") $alerta = "Ha salido del admin";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("inc/head.php")?>
</head>
<body class="fondo">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center">
     <br><img src="inc/logo.png" class="img-responsive center-block"/>
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Acceso al Panel</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="post">
            <fieldset>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="E-mail" name="login_email" type="Email" autofocus>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Contraseña" name="login_contrasenia" type="Contraseña" value="">
              </div>
              <button class="btn btn-lg btn-primary btn-block">Ingresar</button>
            </fieldset>
            <?php include("inc/alertas.php") ?>
           <input name="senal" value="login" type="hidden">            
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("inc/js.php")?>
</body>
</html>