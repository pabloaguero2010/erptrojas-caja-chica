<?php

//Variables Post para la busqueda


if ($nombre=$_POST[nombre])
	{
	$cn=" nombre_proveedor ILIKE '%$nombre%' ";
	}
else
	{
	$cn=" TRUE ";
	}

if ($giro=$_POST[giro])
	{
	$cg=" giro_proveedor ILIKE '%$giro%' ";
	}
else
	{
	$cg=" TRUE ";
	}
	
if ($descripcion=$_POST[descripcion])
	{
	$cd=" descripcion_proveedor ILIKE '%$descripcion%' ";
	}
else
	{
	$cd=" TRUE ";
	}


	





//paginacion de los datos
//Limito la busqueda
$TAMANO_PAGINA = 10;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = $_GET["pagina"];
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
} 


require("../conectar.php");

//miro a ver el número total de campos que hay en la tabla con esa búsqueda
$ssql = "SELECT rut_proveedor FROM proveedor WHERE ".$cn."AND".$cg."AND".$cd;
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT rut_proveedor, nombre_proveedor, telefono_proveedor, mail_proveedor, web_proveedor FROM proveedor WHERE ".$cn."AND".$cg."AND".$cd." order by nombre_proveedor ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>

        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4">&nbsp;</td>
            <td width="125">&nbsp;</td>
            <td width="12">&nbsp;</td>
            <td width="280">&nbsp;</td>
            <td width="77">&nbsp;</td>
            <td width="6">&nbsp;</td>
            <td width="176">&nbsp;</td>
            <td width="7">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoproveedors.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Actualizar Proveedores.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <form  id="aif" name="aif" action="adquisiciones.php?op=ep" method="post">
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Nombre</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="nombre" id="nombre" maxlength="30" <?php if($nombre=$_POST["nombre"]) echo "value=".$nombre; ?> />
            </label></td>
            <td colspan="3" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Giro</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="giro" type="text" id="giro" maxlength="30" <?php if($giro=$_POST["giro"]) echo "value=".$giro; ?> />
            </label>            </td>
            <td colspan="3" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Descripción</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><input name="descripcion" type="text" id="descripcion" size="40" maxlength="60" <?php if($descripcion=$_POST["descripcion"]) echo "value=".$descripcion; ?> />              <label></label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><input type="submit" name="buscar" id="buscar" value="Buscar" class="botonlogin"/></td>
            <td>&nbsp;</td>
          </tr>
          </form>
          <tr>
            <td height="19">&nbsp;</td>
            
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6" class="textoform">
            
            
           <div id="tabla">
            <table width="657" border="0" cellspacing="0" cellpadding="0" id="tablasort" class="to">
              <thead class="to">
              <tr>
                <th width="180">Nombre</th>
                <th width="88">Telefono</th>
                <th width="191">E-mail</th>
                <th width="196">Sitio Web</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $rut=$aux[rut_proveedor];
			  $nombre=$aux[nombre_proveedor];
			  $fono=$aux[telefono_proveedor];
			  $mail=$aux[mail_proveedor];
			  $web=$aux[web_proveedor];
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td><a href='adquisiciones.php?op=ep2&cod=".$rut."' >".$nombre."</a></td>";
               echo "<td><a href='adquisiciones.php?op=ep2&cod=".$rut."' >".$fono."</a></td>";
               echo "<td><a href='adquisiciones.php?op=ep2&cod=".$rut."' >".$mail."</a></td>";
               echo "<td><a href='adquisiciones.php?op=ep2&cod=".$rut."' >".$web."</a></td>";

			   echo "</tr>";
			   $i=$i+1;
			   }
			  
			  ?>
              </tbody>
            </table>
            <?php
	
    //muestro los distintos índices de las páginas, si es que hay varias páginas
if ($total_paginas > 1){

	if($pagina==1)
		$prev=1;
	else
		$prev=$pagina-1;
		
	if($pagina==$total_paginas)
		$next=$total_paginas;
	else
		$next=$pagina+1;

?>
            <table border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><a href="adquisiciones.php?op=ep&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="adquisiciones.php?op=ep&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="adquisiciones.php?op=ep&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="adquisiciones.php?op=ep&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
              </tr>
            </table>
<?php
} 
?>
		</div>            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
       
        
