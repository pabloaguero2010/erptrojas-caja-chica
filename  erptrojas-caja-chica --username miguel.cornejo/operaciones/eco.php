<?php




//Variables Post para la busqueda


if ($nombre=$_POST[nombre])
	{
	$cn=" personal.nombres ILIKE '%$nombre%' ";
	}
else
	{
	$cn=" TRUE ";
	}

if ($apellido=$_POST[apellido])
	{
	$ca=" personal.apellido1 ILIKE '%$apellido%' OR personal.apellido2 ILIKE '%$apellido%' ";
	}
else
	{
	$ca=" TRUE ";
	}
	
if ($rut=$_POST[rut] and $crut=$_POST[crut])
	{
	$rut=$rut."-".$crut;
	$cr=" conductor.rut_conductor LIKE '$rut'";
	}
else
	{
	$cr=" TRUE ";
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
$ssql = "SELECT conductor.rut_conductor FROM conductor INNER JOIN personal ON conductor.rut_conductor=personal.rut_personal WHERE ".$cn."AND".$ca."AND".$cr."AND estado_conductor = 'OK'";
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT conductor.rut_conductor, personal.nombres, personal.apellido1, personal.apellido2, conductor.v_licencia FROM conductor INNER JOIN personal ON conductor.rut_conductor=personal.rut_personal WHERE ".$cn."AND".$ca."AND".$cr."AND estado_conductor = 'OK' order by personal.apellido1 ASC limit ". $TAMANO_PAGINA." offset " . $inicio;

$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>
          <form  id="aif" name="aif" action="operaciones.php?op=eco" method="post">
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
                  <td width="55" height="61"><div align="center"><img src="../images/iconoconductors.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Editar/Eliminar Conductores.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>

          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="rutprov">
                <input class="validate['length[7,8]','digit']" name="rut" type="text" id="rut" size="8" maxlength="8" <?php if($rut=$_GET["rut"]) echo "value=".$rut; ?> />
              -
              <label>
                <input class="validate['alphanum']" name="crut" type="text" id="crut" size="1" maxlength="1" <?php if($crut=$_GET["crut"]) echo "value=".$crut; ?> onchange="datosconductor(); return false" />
              </label>
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Nombre</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="nombre" type="text" id="nombre" size="20" maxlength="30" <?php if($num=$_GET["num"]) echo "value=".$num; ?> />
            </label>            </td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Apellido</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="apellido" type="text" id="apellido" size="20" maxlength="30" <?php if($num=$_GET["num"]) echo "value=".$num; ?> />
            </label></td>
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
                <th width="15%">Rut</th>
                <th width="55%">Nombre</th>
                <th width="15%">Vencimiento Licencia</th>
                <th width="15%">Editar</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $rut=$aux[rut_conductor];
			  $nombre=$aux[nombres]." ".$aux[apellido1]." ".$aux[apellido2];
			  $licencia=$aux[v_licencia];
			  
			  
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td>".$rut."</td>";
               echo "<td>".$nombre."</td>";
               echo "<td>".$licencia."</td>";
			   echo "<td><a href='operaciones.php?op=eco2&cod=".$rut."'><img src='../images/edit.png' width='18' height='17' /></a> </td>";

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
                <td><a href="operaciones.php?op=eco&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=eco&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="operaciones.php?op=eco&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="operaciones.php?op=eco&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
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
       
        
