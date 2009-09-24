<?php
session_start();
if ($_SESSION[perfil]=="t"){

//variables POST

$fecha=" ".date("j/n/Y");
$proveedor=$_POST["proveedor"];
$tipo_s=$_POST["tipo_s"];
$total=$_POST["total"];
$observacion=$_POST["observacion"];



//pasar a integer los valores para no tener problemas en la base de datos, ya que no siempre llenan todos los campos
$total=(int)$total;


/*hay que calcular inmediatamente el saldo actual*/
require("../conectar.php");




for($i=0;$i<100000;$i++){
$numero=rand(100,1000000);
//echo "numero".$numero;
	$sql = "INSERT INTO prueba(numero)
    VALUES ($numero);";
	$stat = pg_exec($dbh,$sql);
}
echo "hola".$sql;	
	//echo $sql;
	
	
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	
	if($stat)
		{
		$val="&ok=3";
		$val2="&saldo=$total ";
		header("location: tesoreria.php?op=ip".$val.$val2);
		}
	else
		{
		$val="&bd=1";
	
		header("location: tesoreria.php?op=ip".$val);
		}
	







}
else
{
header("location: index.php");
}
?>