<?php








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
$ssql = "SELECT cod_ruta FROM ruta";
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT * FROM ruta order by origen ASC limit ". $TAMANO_PAGINA." offset " . $inicio;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>
<form  id="aif" name="aif" action="ar.php" method="post">
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
                  <td width="55" height="61"><div align="center"></div></td>
                  <td width="401"><strong> Configuración de Rutas</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Origen</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input class="validate['required']" type="text" name="origen" id="origen" maxlength="30" <?php if($origen=$_GET["origen"]) echo "value=".$origen; ?> />
            </label></td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Destino</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input class="validate['required']" name="destino" type="text" id="destino" maxlength="30" <?php if($destino=$_GET["destino"]) echo "value=".$destino; ?>  />
            </label>            </td>
            <td colspan="3" class="textoform"><input type="submit" name="buscar" id="buscar" value="agregar" class="botonlogin" /></td>
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
                
                <th width="40%">Origen</th>
                <th width="40%">Destino</th>
                <th width="20%">Eliminar&nbsp;<img src='../images/del.png' width='18' height='17' /></th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $cod=$aux[cod_ruta];
			  $origen=$aux[origen];
			  $destino=$aux[destino];

			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
             
               echo "<td>".$origen."</td>";
               echo "<td>".$destino."</td>";
               echo "<td><a href='br.php?cod=".$cod."'><img src='../images/del.png' width='18' height='17' /></a></td>";

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
                <td><a href="adquisiciones.php?op=ruta&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="adquisiciones.php?op=ruta&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="adquisiciones.php?op=ruta&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="adquisiciones.php?op=ruta&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
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
        
       
        
