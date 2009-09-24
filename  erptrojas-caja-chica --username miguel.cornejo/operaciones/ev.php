<?php


function elvehiculoes($num)
{
	require("../conectar.php");
	$sqleve = "SELECT tipo_vehiculo FROM tipo_vehiculo WHERE cod_tipo_vehiculo = $num";
	$stateve = pg_exec($dbh,$sqleve);
	$datoeve = pg_fetch_assoc($stateve);
	$tv = $datoeve[tipo_vehiculo];
	return $tv;
}

//Variables Post para la busqueda


if ($patente=$_POST[patente])
	{
	$cp=" patente_vehiculo ILIKE '%$patente%' ";
	}
else
	{
	$cp=" TRUE ";
	}

if ($num=$_POST[num])
	{
	$cn=" num_vehiculo = '$num' ";
	}
else
	{
	$cn=" TRUE ";
	}
	
if ($tvehiculo=$_POST[tvehiculo])
	{
	if($tvehiculo!=0)
		{
		$ct=" cod_tipo_vehiculo = '$tvehiculo' ";
		}
	else
		{
		$ct=" TRUE ";
		}
	}
else
	{
	$ct=" TRUE ";
	}
		
if ($anio=$_POST[anio])
	{
	$ca=" ano_vehiculo = '$anio' ";
	}
else
	{
	$ca=" TRUE ";
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
$ssql = "SELECT patente_vehiculo FROM vehiculo WHERE ".$cp."AND".$cn."AND".$ct."AND".$ca."AND estado_vehiculo = 'OK'";
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT patente_vehiculo, num_vehiculo, cod_tipo_vehiculo, ano_vehiculo FROM vehiculo WHERE ".$cp."AND".$cn."AND".$ct."AND".$ca."AND estado_vehiculo = 'OK' order by num_vehiculo ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
//echo $sql;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>
          <form  id="aif" name="aif" action="operaciones.php?op=ev" method="post">
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
                  <td width="55" height="61"><div align="center"><img src="../images/iconovehiculos.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Editar/Eliminar Vehículos.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Patente</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
            <input name="patente" class="validate['length[6,6]','alphanum']" type="text" id="patente" size="6" maxlength="6" <?php if($patente=$_GET["patente"]) echo "value=".$patente; ?> />
            </label></td>
            <td class="textoform">Año</td>
            <td>:</td>
            <td><input name="anio" class="validate['digit']" type="text" id="anio" size="4" maxlength="4" /></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Número</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="num" class="validate['digit']" type="text" id="num" size="6" maxlength="6" <?php if($num=$_GET["num"]) echo "value=".$num; ?> />
            </label>            </td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Tipo Vehículo</td>
            <td class="textoform">:</td>
            <td class="textoform"><select name="tvehiculo" class="textoform" id="tvehiculo">
	            <option value="0">escoger tipo</option>
              <?php
			  require("../conectar.php");
			  $sql2 = "SELECT cod_tipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo order by tipo_vehiculo ASC";
			  $stat2 = pg_exec($dbh,$sql2);
			  pg_close($dbh);
			  while ($datos = pg_fetch_assoc($stat2))
				{
            	echo "<option value='".$datos[cod_tipo_vehiculo]."'>".$datos[tipo_vehiculo]."</option>";
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
                <th width="20%">Patente</th>
                <th width="15%">Número</th>
                <th width="35%">Tipo Vehículo</th>
                <th width="15%">Año</th>
                <th width="15%">Editar/Eliminar</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $patente=$aux[patente_vehiculo];
			  $num=$aux[num_vehiculo];
			  $tvehiculo=$aux[cod_tipo_vehiculo];
			  $anio=$aux[ano_vehiculo];
			  
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td>".$patente."</td>";
               echo "<td>".$num."</td>";
               echo "<td>".elvehiculoes($tvehiculo)."</td>";
               echo "<td>".$anio."</td>";
			   echo "<td><a href='operaciones.php?op=ev2&cod=".$patente."'><img src='../images/edit.png' width='18' height='17' /></a> <a href='bv.php?cod=".$patente."'><img src='../images/del.png' width='18' height='17' /></a></td>";

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
                <td><a href="operaciones.php?op=ev&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=ev&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="operaciones.php?op=ev&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=ev&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
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
       
        
