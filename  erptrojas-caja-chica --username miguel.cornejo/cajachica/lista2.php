<?php

require ("../conectar.php");

$temp= $_POST[proveedor];
if ($temp!=""){
	$valor=$temp;
	$campo="usuario";
}
$cadena = trim($valor);

///////////////////////////////////
//$sql2 = "Select * from caja_chica where fecha between '$ano-$mesa-01' and '$ano-$mesa-30' order by id_caja desc limit 1";
//
//$ssql2 = pg_exec($dbh,$sql2);
//$aux = pg_fetch_assoc($ssql2);
///////////////////////////////////

$query= "select distinct on (proveedor) proveedor from caja_chica where proveedor like '$cadena%';";
//echo $query;
$select = pg_exec($dbh,$query);
echo "<ul>";
if(pg_numrows($select) == 0){
	echo '<li>No hay resultados</li>';
}else {
	for($a=0;$a<(pg_numrows($select));$a++){
		$reg = pg_fetch_assoc($select);
		echo '<li class="selected">'.$reg[proveedor].'</li>';
	}

}
echo "</ul>";
?>