<?php
$query = "SELECT * FROM bar_categorias ORDER BY nombre ASC ";
$rs_categorias=$con->Execute($query);
$query = "SELECT * FROM bar_marcas ORDER BY nombre ASC ";
$rs_marcas=$con->Execute($query);
$query = "SELECT * FROM bar_materiales ORDER BY nombre ASC ";
$rs_materiales=$con->Execute($query);
?>
<div class="Columnas-1">
				<h2>CATEGORIAS</h2>
				<ul>
                <?php while(!$rs_categorias->EOF) {?>
					<li><a href="categorias.php?id_categoria=<?php echo $rs_categorias->fields['id']?>&id_marca=<?php echo $id_marca?>&id_material=<?php echo $id_material?>"><?php echo $rs_categorias->fields['nombre']?></a></li>
                <?php
                $rs_categorias->MoveNext();
				}?>
				</ul>

				<div class="Separador-listas"></div> <!-- / Separador-listas -->

				<h2>MARCAS</h2>
				<ul>
                <?php while(!$rs_marcas->EOF) {?>
					<li><a href="categorias.php?id_marca=<?php echo $rs_marcas->fields['id']?>&id_categoria=<?php echo $id_categoria?>&id_material=<?php echo $id_material?>"><?php echo $rs_marcas->fields['nombre']?></a></li>
                <?php
                $rs_marcas->MoveNext();
				}?>
				</ul>

				<div class="Separador-listas"></div> <!-- / Separador-listas -->

				<h2>MATERIALES</h2>
				<ul>
                <?php while(!$rs_materiales->EOF) {?>
					<li><a href="categorias.php?id_material=<?php echo $rs_materiales->fields['id']?>&id_marca=<?php echo $id_marca?>&id_categoria=<?php echo $id_categoria?>"><?php echo $rs_materiales->fields['nombre']?></a></li>
                <?php
                $rs_materiales->MoveNext();
				}?>                
				</ul>
			</div> <!-- / Columnas-1 -->