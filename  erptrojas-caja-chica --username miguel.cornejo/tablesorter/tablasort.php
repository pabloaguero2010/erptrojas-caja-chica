<?php
require("../conectar.php");
$sql = "SELECT facturas_compra.cod_factura_compra, proveedor.nombre_proveedor, facturas_compra.fecha_factura_compra, facturas_compra.descripcion_factura_compra, facturas_compra.total_factura_compra, facturas_compra.entregado_factura_compra, facturas_compra.pagado_factura_compra FROM proveedor INNER JOIN facturas_compra ON proveedor.rut_proveedor=facturas_compra.rut_proveedor";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$i=0;



?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<meta name="author" content="DANIEL DEUDERO">

	<title>TableSort - Tabla Ordenada en Colordeu</title>
	<script src="js/jquery-latest.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.js" type="text/javascript"></script>
    <script src="js/jquery.tablesorter.pager.js" type="text/javascript"></script>
	
	<script language="javascript">
	
	$(function() {
		$("#tablasort")
			.tablesorter({widthFixed: true})
			.tablesorterPager({container: $("#pager")});
	});
	</script>	
    <link href="tablas.css" rel="stylesheet" type="text/css">
</head>

<body>

            <table width="657" border="0" cellspacing="0" cellpadding="0" id="tablasort" class="to">
              <thead class="to">
              <tr>
                <th width="77">Fecha</td>
                <th width="181">Proveedor</td>
                <th width="246">Descripción</td>
                <th width="75">Valor Total</td>
                <th width="40">Ent.</td>
                <th width="36">Pag.</td>  
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
				
               echo "<td>".$fecha."</td>";
               echo "<td>".$proveedor."</td>";
               echo "<td>".$descripcion."</td>";
               echo "<td>".$total."</td>";
               if ($entregado=='1')
			    echo "<td><img src='../images/check.png' width='15' height='15'/></td>";
			   else
				echo "<td>&nbsp;</td>";
			   if ($pagado=='1')
			    echo "<td><img src='../images/check.png' width='15' height='15'/></td>";
			   else
				echo "<td>&nbsp;</td>";
			   echo "</tr>";
			   $i=$i+1;
			   }
			  
			  ?>
              </tbody>
            </table>
            <div id="pager" class="pager">
	<form>
		<img src="icons/first.png" class="first"/>
		<img src="icons/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="icons/next.png" class="next"/>
		<img src="icons/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
		</select>
	</form>
</div> 



</body>
</html>