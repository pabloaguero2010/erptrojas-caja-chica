<?php
session_start();
if ($_SESSION[perfil]=="t"){

//variables POST

$fecha=" ".date("j/n/Y");
$concepto=$_POST["concepto"];
$ingreso=$_POST["ingreso"];


//pasar a integer los valores para no tener problemas en la base de datos, ya que no siempre llenan todos los campos

$ingreso=(int)$ingreso;

/*hay que calcular inmediatamente el saldo actual*/
require("../conectar.php");

$proveedor=$_SESSION[nusuario];
/*$sql3 = "select saldo from caja_chica order by id_caja desc limit 1";
$ssql3 = pg_exec($dbh,$sql3);
$aux2 = pg_fetch_assoc($ssql3);
$saldoactual=$aux2[saldo];
$saldoactual=$saldoactual + $ingreso;

$sqlr3 = "select total from rendicion_tesoreria order by cod desc limit 1";
$ssqlr3 = pg_exec($dbh,$sqlr3);
$auxr2 = pg_fetch_assoc($ssqlr3);
$total=$auxr2[saldor];
$total=$total + $ingreso;
//y en un nuevo campo de la tabla cajachica hay que ir metiendo el saldo actual.
*/
	
	
	$sql = "INSERT INTO rendicion_tesoreria(responsable, concepto, total, tipo, fecha)
    VALUES ('$proveedor', '$concepto', '$ingreso', 'R','$fecha');";
	//echo $sql;
	
	
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	
	if($stat)
		{
		$val="&ok=3";
		$val2="&saldo=$ingreso ";
		header("location: tesoreria.php?op=rf".$val.$val2);
		}
	else
		{
		$val="&bd=1";
	
		header("location: tesoreria.php?op=gc".$val);
		}
	







}
else
{
header("location: index.php");
}
?>