<?php

//Variables Post para la busqueda


if ($nombre=$_POST[nombre])
	{
	$cn=" nombre_cliente ILIKE '%$nombre%' ";
	}
else
	{
	$cn=" TRUE ";
	}

if ($giro=$_POST[giro])
	{
	$cg=" giro_cliente ILIKE '%$giro%' ";
	}
else
	{
	$cg=" TRUE ";
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
$ssql = "SELECT rut_cliente FROM cliente WHERE ".$cn."AND".$cg;
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT rut_cliente, nombre_cliente, telefono_cliente, mail_cliente, web_cliente FROM cliente WHERE ".$cn."AND".$cg." order by nombre_cliente ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
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
                  <td width="55" height="61"><div align="center"><img src="../images/iconoclientes.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Editar/Borrar Cliente.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <form  id="aif" name="aif" action="operaciones.php?op=ecl" method="post">
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
            <td colspan="3" class="textoform"><input type="submit" name="buscar" id="buscar" value="Buscar" class="botonlogin"/></td>
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
                <th width="30%">Nombre</th>
                <th width="15%">Telefono</th>
                <th width="20%">E-mail</th>
                <th width="20%">Sitio Web</th>
                <th width="15%">Editar</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $rut=$aux[rut_cliente];
			  $nombre=$aux[nombre_cliente];
			  $fono=$aux[telefono_cliente];
			  $mail=$aux[mail_cliente];
			  $web=$aux[web_cliente];
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td>".$nombre."</td>";
               echo "<td>".$fono."</td>";
               echo "<td>".$mail."</td>";
               echo "<td>".$web."</td>";
			   echo "<td><a href='operaciones.php?op=ecl2&cod=".$rut."'><img src='../images/edit.png' width='18' height='17' /></a></td>";

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
                <td><a href="operaciones.php?op=ecl&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=ecl&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="operaciones.php?op=ecl&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=ecl&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
              </tr>
            </table>
<?php
} 
?>
		</div>            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
       
        
