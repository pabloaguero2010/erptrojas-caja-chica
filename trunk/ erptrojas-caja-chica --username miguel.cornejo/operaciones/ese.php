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
$ssql = "SELECT cod_sobreestadia FROM sobreestadia";
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT * FROM sobreestadia order by cod_sobreestadia ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
//echo $sql;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>
          <form  id="aif" name="aif" action="#" method="post">
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
                  <td width="401"><strong> Ver/Actualizar Tarifas de Sobreestadia.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>


          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label>            </td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><input type="button" name="sobreestadia" id="sobreestadia" value="Ver/Actualizar otras tarifas" class="botonlogin" onclick='gotoLink("operaciones.php?op=etarifas")' /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label>            
            <label class="botonlogin"></label></td>
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
                <th width="50%">Tipo de Vehiculo</th>
                <th width="25%">Valor por día</th>
                <th width="25%">Actualizar</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $cod=$aux[cod_sobreestadia];
			  $tvehiculo=$aux[cod_tipo_vehiculo];
			  $valor=$aux[valor];
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
  
               echo "<td>".elvehiculoes($tvehiculo)."</td>";
               echo "<td>".$valor."</td>";
			   echo "<td><a href='operaciones.php?op=ese2&cod=".$cod."'><img src='../images/edit.png' width='18' height='17' /></a> </td>";

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
       
        
