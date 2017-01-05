<?php
die();
include("inc/config.php");
include("inc/seguridad.php");
$query = "SELECT * FROM bar_cotizaciones WHERE id = '$id' ";
$rs_info=$con->Execute($query);
$query = "SELECT * FROM bar_clientes WHERE id = '".$rs_info->fields['id_cliente']."' ";
$rs_cliente=$con->Execute($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.ReadMsgBody {
	width: 100%;
	background-color: #ffffff;
}
.ExternalClass {
	width: 100%;
	background-color: #ffffff;
}
body {
	width: 100%;
	background-color: #ffffff;
	margin: 0;
	padding: 0;
	-webkit-font-smoothing: antialiased;
	font-family: Helvetica, Arial, sans-serif
}
table {
	border-collapse: collapse
}

@media only screen and (max-width: 640px) {
body[yahoo] .deviceWidth {
	width: 440px!important;
	padding: 0
}
body[yahoo] .center {
	text-align: center!important
}
}

@media only screen and (max-width: 479px) {
body[yahoo] .deviceWidth {
	width: 280px!important;
	padding: 0
}
body[yahoo] .center {
	text-align: center!important
}
}
</style>
</head>
<?php if($precio_solo == "si") echo '<div style="display:none"  ' ?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family:Helvetica,Arial,sans-serif">
<!-- HEADER -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="100%" valign="top" bgcolor="#000000" style="padding:5px 0 20px 0"><table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth">
        <tr>
          <td width="100%"><img src="<?php echo $basepath?>admin/inc/logo.png" alt="The Unique Transaction Coordinator 365" style="width:250px;height:auto" /> 
            
            <!-- Nav -->
            
            <table border="0" cellpadding="0" cellspacing="0" align="right" class="deviceWidth">
              <tr>
                <td class="center" style="font-size:13px;color:#FF7701;text-align:right;font-family:'Noto Sans',Helvetica,Arial,sans-serif;line-height:20px;vertical-align:middle;padding-top:20px"></td>
              </tr>
            </table>
            
            <!-- End Nav --></td>
        </tr>
      </table></td>
  </tr>
</table>
<!-- /HEADER --> 
<!-- CONTENIDO -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td style="padding:0;font-family:Helvetica,Arial,sans-serif;font-size:24px; text-align:center"><strong><?php echo $rs_info->fields['titulo']?></strong></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="100%" valign="top" bgcolor="#ffffff" style="padding:0"><table width="790"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td style="padding:0;font-family:Helvetica,Arial,sans-serif;font-size:14px;color:#666666">
            <table width="98%" align="center" cellpadding="3" cellspacing="2" style="border:solid 2px #9A9A9A">
              <tbody>
                <tr>
                  <td style="padding:10px"><?php echo nl2br($rs_info->fields['aereos_observaciones']) ?></td>
                  <td style="padding:10px; text-align:center">TARIFA</td>
                  <td style="padding:10px; text-align:center">IMPUESTOS</td>
                  <td style="padding:10px; text-align:center">POR PASAJERO</td>
                </tr>
                <tr>
                  <td style="padding:10px;border:solid 2px #9A9A9A"><?php  echo nl2br($rs_info->fields['hoteles_observaciones']) ?></td>
                  <td style="padding:10px;border:solid 2px #9A9A9A; text-align:center"><strong><?php echo $rs_info->fields['moneda']?> <?php echo $rs_info->fields['t_tarifa']?></strong></td>
                  <td style="padding:10px;border:solid 2px #9A9A9A; text-align:center"><strong><?php echo $rs_info->fields['moneda']?> <?php echo $rs_info->fields['t_impuestos']?></strong></td>
                  <td style="padding:10px;border:solid 2px #9A9A9A; text-align:center"><strong><?php echo $rs_info->fields['moneda']?> <?php echo $rs_info->fields['t_tarifa']+$rs_info->fields['t_impuestos'] ?></strong></td>
                </tr>
              </tbody>
            </table>
            <br>
            <br>
            <h2 align="center"><?php echo nl2br($rs_info->fields['descripcion'])?></h2>
            </td>
        </tr>
      </table></td>
  </tr>
</table>
<!-- /CONTENIDO --> 
<!-- FOOTER -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#275B76">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td align="center"><strong><a href="mailto:info@turismobarbaglia.com" style="color:#ffffff;text-decoration:none;font-size:13px">info@turismobarbaglia.com</a></strong></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FF6600">
  <tr>
    <td height="5"><img src="<?php echo $basepath?>img/px.gif" alt="" width="1" height="5" style="display:block"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#222222">
  <tr>
    <td height="15"><img src="<?php echo $basepath?>img/px.gif" alt="" width="1" height="15"></td>
  </tr>
  <tr>
    <td align="center"><table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
          <td align="center" style="padding:0;font-size:12px;color:#969ba4">(0342) 4552729 / 4551852</td>
        </tr>
        <tr>
          <td align="center" style="padding:0;font-size:12px;color:#969ba4">Urquiza 2598 (La Rioja esquina Urquiza) - Santa Fe</td>
        </tr>
        <tr>
          <td align="center" style="padding:0;font-size:12px;color:#969ba4">Horario de Atención: Horarios: de 9 a 18 hs.</td>
        </tr>
        <tr>
          <td align="center" style="padding:0;font-size:12px;color:#969ba4"><strong><a href="http://www.turismobarbaglia.com" style="text-decoration:none;color:#969ba4">turismobarbaglia.com</a></strong> | All rights reserved</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="15"><img src="<?php echo $basepath?>img/px.gif" alt="" width="1" height="15"></td>
  </tr>
</table>
<!-- /FOOTER -->
</body>
</html>
<?php if($precio_solo == "si") echo "</div><strong>$ ".$total_final2."</strong>"; ?>