<?php
include("inc/config.php");
include("inc/seguridad.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("inc/head.php")?>
</head>

<body>
<div id="wrapper">
  <?php include("inc/nav.php")?>
  
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Home</h1>
          <p><?php echo $titulo_admin?></p>
        </div>
        <!-- /.col-lg-12 --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container-fluid --> 
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper -->

<?php include("inc/js.php")?>
</html>
