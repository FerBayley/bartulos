<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="home.php"><img src="inc/logo.png" alt="<?php echo $titulo_admin?>"/></a> </div>
  <!-- /.navbar-header -->
  
  <ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <?php echo $rs_admin->fields['nombre']?> <i class="fa fa-caret-down"></i> </a>
      <ul class="dropdown-menu dropdown-user">
        <li><a href="administradores-frm.php?action=edit&id=<?php echo $id_admin?>"><i class="fa fa-user fa-fw"></i> Cambiar contraseña</a> </li>
        <li class="divider"></li>
        <li><a href="salir.php"><i class="fa fa-sign-out fa-fw"></i> Salir[x]</a> </li>
      </ul>
      <!-- /.dropdown-user --> 
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->
  
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li> <a href="home.php" <?php activar_menu("home.php","") ?>><i class="fa fa-dashboard fa-fw"></i> Home</a> </li>
        <li> <a href="operadores.php"><i class="fa fa-table fa-fw"></i> Operadores</a> </li>
        <li> <a href="personales.php"><i class="fa fa-table fa-fw"></i> Personal</a> </li>
        <li> <a href="archivos.php"><i class="fa fa-table fa-fw"></i> PDF</a> </li>
        <li> <a href="administradores.php"><i class="fa fa-table fa-fw"></i> Administradores</a> </li>
      </ul>
    </div>
    <!-- /.sidebar-collapse --> 
  </div>
  <!-- /.navbar-static-side --> 
</nav>
