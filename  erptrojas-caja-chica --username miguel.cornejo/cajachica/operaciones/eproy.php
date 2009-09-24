<?php

function elclientees($rut)
{
	require("../conectar.php");
	$sqleve = "SELECT nombre_cliente FROM cliente WHERE rut_cliente = '$rut'";
	$stateve = pg_exec($dbh,$sqleve);
	pg_close($dbh);
	$datoeve = pg_fetch_assoc($stateve);
	$tv = $datoeve[nombre_cliente];
	return $tv;
}


//lista de clientes

require("../conectar.php");
$sqlc1 = "SELECT rut_cliente, nombre_cliente FROM cliente";
$statc1 = pg_exec($dbh,$sqlc1);
pg_close($dbh);


//Variables Post para la busqueda


if ($cliente=$_POST[cliente])
	{
	$cc=" rut_cliente = '$cliente' ";
	}
else
	{
	$cc=" TRUE ";
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
$ssql = "SELECT rut_cliente, nombre_proyecto FROM proyecto WHERE ".$cc;
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT cod_proyecto, rut_cliente, nombre_proyecto FROM proyecto WHERE ".$cc." order by nombre_proyecto ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
//echo $sql;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>
          <form  id="aif" name="aif" action="operaciones.php?op=eproy" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4">&nbsp;</td>
            <td width="125">&nbsp;</td>
            <td width="12">&nbsp;</td>
            <td width="280">&nbsp;</td>
            <td width="73">&nbsp;</td>
            <td width="10">&nbsp;</td>
            <td width="176">&nbsp;</td>
            <td width="7">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoclientes.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Editar/Proyectos.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Cliente</td>
            <td class="textoform">:</td>
            <td class="textoform"><select name="cliente" class="textoform" id="cliente">
              <option value="0">escoger tipo</option>
              <?php

			  while ($datos = pg_fetch_assoc($statc1))
				{
            	echo "<option value='".$datos[rut_cliente]."'>".$datos[nombre_cliente]."</option>";
				}
			  ?>
            </select>
            <label></label></td>
            <td class="textoform"><input type="submit" name="buscar" id="buscar" value="Buscar" class="botonlogin"/></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>

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
                <th width="40%">Cliente</th>
                <th width="40%">Proyecto</th>
                <th width="20%">Editar</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $cod=$aux[cod_proyecto];
			  $rut=$aux[rut_cliente];
			  $cliente=elclientees($rut);
			  $proyecto=$aux[nombre_proyecto];
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td>".$cliente."</td>";
               echo "<td>".$proyecto."</td>";
			   echo "<td><a href='operaciones.php?op=eproy2&cod=".$cod."'><img src='../images/edit.png' width='18' height='17' /></a></td>";

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
                <td><a href="operaciones.php?op=eproy&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=eproy&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="operaciones.php?op=eproy&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=eproy&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
              </tr>
            </table>
<?php
} 
?>
		</div>            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>      
       
        
