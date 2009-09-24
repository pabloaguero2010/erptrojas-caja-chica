<?php
session_start();
if ($_SESSION[perfil]=="j"){

//variables POST

$fecha=" ".date("j/n/Y");
$proveedor=$_POST["proveedor"];
$concepto=$_POST["concepto"];
$doctos=$_POST["doctos"];
$gastos=$_POST["gastos"];
$anticipos=$_POST["anticipos"];
$comb=$_POST["comb"];
$recomb=$_POST["recomb"]; 
$cheq=$_POST["cheq"];
$otros=$_POST["otros"];
$responsable=$_SESSION[rutusuario];

//pasar a integer los valores para no tener problemas en la base de datos, ya que no siempre llenan todos los campos
$gastos=(int)$gastos;
$anticipos=(int)$anticipos;
$comb=(int)$comb;
$recomb=(int)$recomb;
$cheq=(int)$cheq;
$otros=(int)$otros;

/*hay que calcular inmediatamente el saldo actual*/
require("../conectar.php");

//$saldoactual=$aux2[saldo];
$saldo=$recomb + $cheq + $otrosl - $gastos - $anticipos - $comb ; //saldo del ingreso

//y en un nuevo campo de la tabla cajachica hay que ir metiendo el saldo actual.

	$sql = "INSERT INTO caja_chica(fecha, proveedor, concepto, dctos, gtosgrles, anticipos, combust,reintcomb, cheques, otros, saldo, rut_responsable) VALUES ('$fecha','$proveedor', '$concepto', '$doctos', $gastos, $anticipos, $comb, $recomb, $cheq, $otros,$saldo,'$responsable');";
	//echo $sql;
$sql3 = "select sum(saldo) as saldo from caja_chica;";
$ssql3 = pg_exec($dbh,$sql3);
$aux2 = pg_fetch_assoc($ssql3);
$saldoactual=$aux2[saldo];	
	
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		$val2="&saldo=$saldoactual";
		header("location: cajachica.php?op=gc".$val.$val2);
		}
	else
		{
		$val="&bd=1";
	
		header("location: cajachica.php?op=gc".$val);
		}
	







}
else
{
header("location: index.php");
}
?>