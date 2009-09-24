<?php
session_start();
if ($_SESSION[perfil]=="j"){

//variables POST

$fecha=$_POST["calen"];
$proveedor=$_POST["proveedor"];
$concepto=$_POST["concepto"];
$doctos=$_POST["doctos"];
$gastos=$_POST["gastos"];
$anticipos=$_POST["anticipos"];
$comb=$_POST["comb"];
$recomb=$_POST["recomb"]; 
$cheq=$_POST["cheq"];
$otros=$_POST["otros"];
$cod=$_POST["flag"];
//echo "cod=".$cod."<br>";

//pasar a integer los valores para no tener problemas en la base de datos, ya que no siempre llenan todos los campos
$gastos=(int)$gastos;
$anticipos=(int)$anticipos;
$comb=(int)$comb;
$recomb=(int)$recomb;
$cheq=(int)$cheq;
$otros=(int)$otros;

/*hay que calcular inmediatamente el saldo actual*/
require("../conectar.php");
$sql3 = "select saldo,id_caja from caja_chica order by id_caja desc limit 1";
$ssql3 = pg_exec($dbh,$sql3);
$aux2 = pg_fetch_assoc($ssql3);
$saldoactual=$aux2[saldo];
$lastid=$aux2[id_caja]+1;
$saldoactual=$saldoactual - $gastos - $anticipos - $comb + $recomb + $cheq + $otros;

//y en un nuevo campo de la tabla cajachica hay que ir metiendo el saldo actual.

	
	$sql = "UPDATE caja_chica 
	    SET fecha='$fecha', proveedor='$proveedor', concepto='$concepto', dctos='$doctos', gtosgrles=$gastos, anticipos=$anticipos, 
        combust=$comb, reintcomb=$recomb, cheques=$cheq, otros=$otros, id_caja=$lastid, saldo=$saldoactual
        WHERE id_caja=$cod;";
	//echo $sql;
	
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