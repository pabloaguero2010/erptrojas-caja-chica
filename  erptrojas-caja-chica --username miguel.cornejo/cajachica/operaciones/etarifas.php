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

function larutaes($cod)
{
	require("../conectar.php");
	$sqleve = "SELECT origen, destino FROM ruta WHERE cod_ruta = $cod";
	$stateve = pg_exec($dbh,$sqleve);
	$datoeve = pg_fetch_assoc($stateve);
	$tv = $datoeve[origen]." - ".$datoeve[destino];
	return $tv;
}

//Variables Post para la busqueda


if ($ruta=$_POST[ruta])
	{
	if($ruta!=0)
		{
		$cr=" cod_ruta = '$ruta' ";
		}
	else
		{
		$cr=" TRUE ";
		}
	}
else
	{
	$cr=" TRUE ";
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
$ssql = "SELECT cod_tarifa FROM tarifa WHERE ".$cr."AND".$ct;
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT * FROM tarifa WHERE ".$cr."AND".$ct." order by cod_ruta ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
//echo $sql;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>
          <form  id="aif" name="aif" action="operaciones.php?op=etarifas" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="4">&nbsp;</td>
            <td width="125">&nbsp;</td>
            <td width="12">&nbsp;</td>
            <td width="199">&nbsp;</td>
            <td width="87">&nbsp;</td>
            <td width="5">&nbsp;</td>
            <td width="248">&nbsp;</td>
            <td width="7">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoservicioss.png" alt="" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Actualizar Tarifas.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>


          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Ruta</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <select name="ruta" class="textoform" id="ruta">
              <option value="0">escoger ruta</option>
                <?php
			  
			require("../conectar.php");
			$sqlruta = "SELECT cod_ruta, origen, destino FROM ruta order by origen ASC";
			$statruta = pg_exec($dbh,$sqlruta);
			pg_close($dbh);
			while ($datos = pg_fetch_assoc($statruta))
			{
            echo "<option value='".$datos[cod_ruta]."'>".$datos[origen]." - ".$datos[destino]."</option>";
			}
			?>
              </select>
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
            <td class="textoform"><label>
            <input type="button" name="sobreestadia" id="sobreestadia" value="Ver/Actualizar sobreestadia" class="botonlogin" onclick='gotoLink("operaciones.php?op=ese")' />
            </label>            <label class="botonlogin"></label></td>
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
                <th width="30%">Ruta</th>
                <th width="30%">Tipo de Vehiculo</th>
                <th width="10%">Normal</th>
                <th width="10%">Urgente</th>
                <th width="10%">Retorno</th>
                <th width="10%">Actualizar</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $cod=$aux[cod_tarifa];
			  $ruta=$aux[cod_ruta];
			  $tvehiculo=$aux[cod_tipo_vehiculo];
			  $normal=$aux[normal];
			  if($normal==-1) $normal="";
			  $urgente=$aux[urgente];
			  if($urgente==-1) $urgente="";
			  $retorno=$aux[retorno];
			  if($retorno==-1) $retorno="";
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td>".larutaes($ruta)."</td>";
               echo "<td>".elvehiculoes($tvehiculo)."</td>";
               echo "<td>".$normal."</td>";
			   echo "<td>".$urgente."</td>";
               echo "<td>".$retorno."</td>";
			   echo "<td><a href='operaciones.php?op=etarifas2&cod=".$cod."'><img src='../images/edit.png' width='18' height='17' /></a> </td>";

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
                <td><a href="operaciones.php?op=etarifas&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=etarifas&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="operaciones.php?op=etarifas&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=etarifas&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
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
       
        
