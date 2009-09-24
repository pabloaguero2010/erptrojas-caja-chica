<?php
session_start();
}

require ("../conectar.php");

$valor = $_POST['proveedor'];
$cadena = trim($valor);

$select = mysql_query("select * from caja_chica where proveedor like '$cadena%';");
echo "<ul>";
if(mysql_num_rows($select) == 0){
	echo 'No hay resultados';
}else {
	for($a=0;$a<(mysql_num_rows($select));$a++){
		$reg = mysql_fetch_array($select);
		echo '<li>'.$reg['proveedor'].'</li>';
	}

}
echo "</ul>";
?>