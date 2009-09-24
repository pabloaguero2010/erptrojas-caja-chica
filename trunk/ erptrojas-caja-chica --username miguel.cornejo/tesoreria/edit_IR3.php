<?php
session_start();
if ($_SESSION[perfil]=="t"){

//variables POST

$fecha=$_POST["calen"];
$proveedor=$_POST["proveedor"];
$concepto=$_POST["concepto"];
$total=$_POST["total"];
$cod=$_POST["flag"];
//echo "cod=".$cod."<br>";

//pasar a integer los valores para no tener problemas en la base de datos, ya que no siempre llenan todos los campos

$total=(int)$total;

/*hay que calcular inmediatamente el saldo actual*/
require("../conectar.php");


//y en un nuevo campo de la tabla cajachica hay que ir metiendo el saldo actual.

	
	$sql = "UPDATE rendicion_tesoreria
   SET  responsable='$proveedor', concepto='$concepto', total=$total, fecha='$fecha'
 WHERE cod=$cod;";
	//echo $sql;
	
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="ok=1";
		$val2="&saldo=$total";
		header("location: tesoreria.php?".$val.$val2);
		}
	else
		{
		$val="bd=1";
	
		header("location: tesoreria.php?".$val);
		}
	







}
else
{
header("location: index.php");
}
?>