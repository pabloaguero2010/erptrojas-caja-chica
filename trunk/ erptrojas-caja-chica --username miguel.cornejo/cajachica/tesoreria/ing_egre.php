<?php


//paginacion de los datos
//Limito la busqueda
$TAMANO_PAGINA = 20;


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

 

$meses = array("Seleccione Mes","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

//Ver de donde saco el saldo anterior
if($_POST[flag]!='1'){

$mesa=(date('n'))-1;
$mes_actual=$meses[date('n')];
$mes_sel=date('n');
$ano=date('Y');
}
else
{
$mesa=($_POST[mes])-1;
$mes_actual=$meses[$_POST[mes]];
$mes_sel=$_POST[mes];
$ano=$_POST[ano];
}


// si es enero
if ($mesa==0)
	$mesa=12;

$sql2 = "select * from caja_chica where date_part('month',fecha) = $mesa and date_part('Year',fecha)=$ano order by id_caja desc limit 1";

$ssql2 = pg_exec($dbh,$sql2);
$aux = pg_fetch_assoc($ssql2);
$saldoant=$aux[saldo];


$sql3 = "select to_char(fecha, 'mm') as fecha2,saldo,fecha  from caja_chica order by id_caja desc limit 1";
//echo"consulta:".$sql3;
$ssql3 = pg_exec($dbh,$sql3);
$aux2 = pg_fetch_assoc($ssql3);
$mesal=$aux2[fecha2];
$fechasal=$aux2[fecha];
//saldo actual
$saldoact=$aux2[saldo];

//$ssql4 = "select * from caja_chica where fecha between '$ano-$mesa-01' and '$ano-$mesa-30'";

//miro a ver el número total de campos que hay en la tabla con esa búsqueda

$ssql =  "select * from caja_chica where date_part('month',fecha) = $mes_sel and date_part('Year',fecha)=$ano";

$sstat2 = pg_exec($dbh,$ssql);
$num_total_registros = pg_numrows($sstat2);
//calculo el total de páginas
$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);





$i=0;






?>

        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr><form name="formulario" method="post" action="tesoreria.php">	
            <td width="12">&nbsp;</td>
            <td width="202"><label>Tipo de informe 
                <select name="select" accesskey="f">
				<option value=1> Ingresos</option>
				<option value=2> Rendición</option>
                </select>
            </label></td>
            <td width="22">&nbsp;</td>
            <td width="156"><?php

$i=0;
echo"<select  name=mes id=mes>"; 

while ($i<=12)
{
echo "<option value=".$i.">".$meses[$i]."</option>\n";
$i++;
}
echo "</select>"; 
?></td>
            <td width="91"><?php
			
			
			$ssql2 =  "select distinct on (date_part('Year',fecha)) date_part('Year',fecha) as ano from caja_chica;";

			$sstat3 = pg_exec($dbh,$ssql2);
			
			
			echo"<select  name=ano id=ano>"; 
		 			  
			  while($aux = pg_fetch_assoc($sstat3))
			  {
				echo "<option value='".$aux[ano]."'>".$aux[ano]."</option>\n";
			  }
		echo "</select>"; 
		?></td>
            <td width="7">&nbsp;</td>
            <td width="179"><input name="enviar" type="submit" class="letras" id="form_mes" value="Mostrar"  />
			<input type="hidden" name="flag" value="1" />
			<input type="hidden" name="flag2" value="1" />
</form>
<td width="4"></td>
            <td width="14">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="461" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/balanceca6.png" width="45" height="52" /></div></td>
                  <td width="406"><p><strong> <?php 
				  
				  
				  echo " ".$mes_actual." de ".$ano;?> </strong></p>                  </td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <form  id="aif" name="aif" action="ing_egre.php?op=ef" method="post">
          </form>
          <tr>
            <td height="19">&nbsp;</td>
            
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><strong>Saldo mes anterior :$ <?php echo " ".$saldoant; ?></strong></td>
            <td class="textoform"><strong>Saldo Actual</strong></td>
            <td class="textoform"><strong>:</strong></td>
            <td class="textoform"><strong>$</strong><?php echo " ".$saldoact; ?></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6" class="textoform">
            
            
           <div id="tabla">
            <table width="657" border="0" cellspacing="0" cellpadding="0" id="tablasort" class="to">
              <thead class="to">
              <tr>
                <th width="8%">Fecha</th>
                <th width="10%">Proveedor</th>
                <th width="10%">Concepto</th>
                <th width="9%">Doctos</th>
                <th width="9$">Gastos Grles</th>
                <th width="9%">Anticipos</th>  
	     		<th width="9%">Comb.</th>
                <th width="9%">Reint Comb</th>
                <th width="9%">Cheques.</th>
                <th width="9%">Otros Ingr.</th>  
				<th width="9$">Saldo</th>
              </tr>
              </thead>
              <tbody class="to"> 
              <?php
			 
			  
			  while($aux = pg_fetch_assoc($sstat2))
			  {
			  
			  $fecha=$aux[fecha];
			  $proveedor=$aux[proveedor];
			  $concepto=$aux[concepto];
			  $dctos=$aux[dctos];
			  $gtosgrles=$aux[gtosgrles];
			  $anticipos=$aux[anticipos];
			  $combust=$aux[combust];
			  $reintcomb=$aux[reintcomb];
			  $cheques=$aux[cheques];
			  $otros=$aux[otros];
			  $saldo=$aux[saldo];
			  $cod=$aux[id_caja];
			  
		  
			 if ($i%2==0)
			  	{ 
	            echo "<tr>";
				}
			  else
			  	{
				echo "<tr class='odd'>";
				}
				
               echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$fecha."</a></td>";
               echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$proveedor."</a></td>";
			   echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$concepto."</a></td>";
               echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$dctos."</a></td>";
			   echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$gtosgrles."</a></td>";
               echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$anticipos."</a></td>";
			   echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$combust."</a></td>";
               echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$reintcomb."</a></td>";
			   echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$cheques."</a></td>";
			   echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$otros."</a></td>";
               echo "<td><a href='tesoreria.php?op=ec&cod=".$cod."' >".$saldo."</a></td>";
               
               
				echo "<td>&nbsp;</td>";
			   echo "</tr>";
			   $i=$i+1;
			
			   }
			  
			  
			/*  if(($mesal==date("m")))
				{
				$sql = "UPDATE saldocc  SET saldo=$saldo, fecha='".date("j-n-Y")."' WHERE fecha=$;";
				}
				else
				$sql = "INSERT INTO saldocc(saldo, fecha) VALUES ($saldo, '".date("j-n-Y")."');";
			  
		      $stat = pg_exec($dbh,$sql);*/
			  
			  
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
                <td><a href="ing_egre.php?op=ef&pagina=1"><img src="../tablesorter/icons/first.png" width="16" height="16"></a></td>
                <td><a href="ing_egre.php?op=ef&pagina=<?php echo $prev; ?>"><img src="../tablesorter/icons/prev.png" width="16" height="16"></a></td>
                <td align="center" valign="middle">&nbsp;<?php echo $pagina; ?>&nbsp;</td>
                <td><a href="ing_egre.php?op=ef&pagina=<?php echo $next; ?>"><img src="../tablesorter/icons/next.png" width="16" height="16"></a></td>
                <td><a href="ing_egre.php?op=ef&pagina=<?php echo $total_paginas; ?>"><img src="../tablesorter/icons/last.png" width="16" height="16"></a></td>
              </tr>
            </table>
<?php
} 
?>
		</div>            </td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
       
        
