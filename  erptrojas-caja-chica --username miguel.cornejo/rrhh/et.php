<?php

//Variables Post para la busqueda


if ($descripción=$_POST[descripcion])
	{
	$cd=" facturas_compra.descripcion_factura_compra ILIKE '%$descripcion%' ";
	}
else
	{
	$cd=" TRUE ";
	}

if ($proveedor=$_POST[proveedor])
	{
	$cp=" proveedor.nombre_proveedor ILIKE '%$proveedor%' ";
	}
else
	{
	$cp=" TRUE ";
	}
	



	

if( (!($fecha=$_POST[calen])) or ($fecha=="click acá") )
	{
	$fecha="'click acá'";
	$cf=" TRUE ";
	}
else
	{
	list($dia,$mes,$anio)=explode("/",$fecha);
	if (is_numeric($dia) and is_numeric($mes) and is_numeric($anio))
		{
		if (!(checkdate ($mes, $dia, $anio)))
			{
			$fecha="'click acá'";
			$cf=" TRUE ";
			}
		else
			{
			$cf=" facturas_compra.fecha_factura_compra = '$fecha' ";
			}
	
		
		}
	else
		{
		$fecha="'click acá'";
		$cf=" TRUE ";
		}
	}




if (($entregado=$_POST[entregado]) == "on")
	{
	$ce=" facturas_compra.entregado_factura_compra = '1' ";
	}
else
	{
	$ce=" TRUE ";
	}
	
if (($pagado=$_POST[pagado]) == "on")
	{
	$cpa=" facturas_compra.pagado_factura_compra = '1' ";
	}
else
	{
	$cpa=" TRUE ";
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
$ssql = "SELECT facturas_compra.cod_factura_compra, proveedor.nombre_proveedor, facturas_compra.fecha_factura_compra, facturas_compra.descripcion_factura_compra, facturas_compra.total_factura_compra, facturas_compra.entregado_factura_compra, facturas_compra.pagado_factura_compra FROM proveedor INNER JOIN facturas_compra ON proveedor.rut_proveedor=facturas_compra.rut_proveedor WHERE ".$cd."AND".$cp."AND".$cf."AND".$ce."AND".$cpa;
$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 










$sql = "SELECT facturas_compra.cod_factura_compra, proveedor.nombre_proveedor, facturas_compra.fecha_factura_compra, facturas_compra.descripcion_factura_compra, facturas_compra.total_factura_compra, facturas_compra.entregado_factura_compra, facturas_compra.pagado_factura_compra FROM proveedor INNER JOIN facturas_compra ON proveedor.rut_proveedor=facturas_compra.rut_proveedor WHERE ".$cd."AND".$cp."AND".$cf."AND".$ce."AND".$cpa." order by facturas_compra.cod_factura_compra DESC limit ". $TAMANO_PAGINA." offset " . $inicio;
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;




?>

        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15">&nbsp;</td>
            <td width="167">&nbsp;</td>
            <td width="10">&nbsp;</td>
            <td width="174">&nbsp;</td>
            <td width="107">&nbsp;</td>
            <td width="7">&nbsp;</td>
            <td width="194">&nbsp;</td>
            <td width="15">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconofacturass.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ver/Editar Facturas de Compra.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <form  id="aif" name="aif" action="rrhh.php?op=et" method="post">
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Descripción</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="descripcion" id="descripcion" <?php if($descripcion=$_POST["descripcion"]) echo "value=".$descripcion; ?> />
            </label></td>
            <td colspan="3" class="textoform">
              <input name="entregado" type="checkbox" id="entregado" <?php if($entregado=$_POST["entregado"]=="on") echo "checked='checked'"; ?> />
Entregado</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input class="ncalendar" name="calen" maxlength="20" id="calen" type="text" <?php if($fecha) echo "value=".$fecha; else echo "value='click acá'"; ?> />
            </label></td>
            <td colspan="3" class="textoform"><input type="checkbox" name="pagado" id="pagado" <?php if($pagado=$_POST["pagado"]=="on") echo "checked='checked'"; ?> />
Pagado</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Proveedor</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="demoDer">
					<input type="text" id="input_2" name="proveedor" class="input" <?php if($proveedor=$_POST["proveedor"]) echo "value=".$proveedor; ?>
					onfocus="if(document.getElementById('lista').childNodes[0]!=null && this.value!='') { filtraLista(this.value); formateaLista(this.value); 
						reiniciaSeleccion(); document.getElementById('lista').style.display='block'; }" 
					onblur="if(v==1) document.getElementById('lista').style.display='none';" 
					onkeyup="if(navegaTeclado(event)==1) {
						clearTimeout(ultimoIdentificador); 
						ultimoIdentificador=setTimeout('rellenaLista()', 1000); }">
					<div id="lista" onmouseout="v=1;" onmouseover="v=0;"></div>
				</div>
				<div class="mensaje" id="error"></div></td>
            <td class="textoform"><label>
              <input type="submit" name="buscar" id="buscar" value="Buscar" class="botonlogin"/>
              </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
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
                <th width="77">Fecha</th>
                <th width="181">Proveedor</th>
                <th width="246">Descripción</th>
                <th width="75">Valor Total</th>
                <th width="40">Ent.</th>
                <th width="36">Pag.</th>  
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			  while($aux = pg_fetch_assoc($stat))
			  {
			  $cod=$aux[cod_factura_compra];
			  $fecha=$aux[fecha_factura_compra];
			  $proveedor=$aux[nombre_proveedor];
			  $descripcion=$aux[descripcion_factura_compra];
			  $total=$aux[total_factura_compra];
			  $entregado=$aux[entregado_factura_compra];
			  $pagado=$aux[pagado_factura_compra];
			  
			  if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td><a href='rrhh.php?op=ef2&cod=".$cod."' >".$fecha."</a></td>";
               echo "<td><a href='rrhh.php?op=ef2&cod=".$cod."' >".$proveedor."</a></td>";
               echo "<td><a href='rrhh.php?op=ef2&cod=".$cod."' >".$descripcion."</a></td>";
               echo "<td><a href='rrhh.php?op=ef2&cod=".$cod."' >".$total."</a></td>";
               if ($entregado=='1')
			    echo "<td><a href='rrhh.php?op=ef2&cod=".$cod."' ><img src='../images/check.png' width='15' height='15'/></a></td>";
			   else
				echo "<td>&nbsp;</td>";
			   if ($pagado=='1')
			    echo "<td><a href='rrhh.php?op=ef2&cod=".$cod."' ><img src='../images/check.png' width='15' height='15'/></a></td>";
			   else
				echo "<td>&nbsp;</td>";
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
                <td><a href="rrhh.php?op=et&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="rrhh.php?op=et&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="rrhh.php?op=et&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="rrhh.php?op=et&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
              </tr>
            </table>
<?php
} 
?>
 
		</div>
            
            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
       
        
