<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables GET
$cod=$_GET["cod"];


//validación


	require("../conectar.php");
	$sql = "SELECT origen, destino FROM ruta WHERE cod_ruta = '$cod'";
	$stat = pg_exec($dbh,$sql);
	$auxr = pg_fetch_assoc($stat);
	$origen = $auxr[origen];
	$destino = $auxr[destino];
	$sql = "SELECT cod_ruta FROM ruta WHERE origen = '$destino' AND destino = '$origen'";
	$stat = pg_exec($dbh,$sql);
	$auxr = pg_fetch_assoc($stat);
	$cod2 = $auxr[cod_ruta]; 
		

	$sql = "DELETE FROM ruta WHERE cod_ruta = '$cod'";
	$sql2 = "DELETE FROM ruta WHERE cod_ruta = '$cod2'";
	$stat = pg_exec($dbh,$sql);
	$stat2 = pg_exec($dbh,$sql2);
	pg_close($dbh);
	if($stat and $stat2)
		{
		$val="&ok=2";
		header("location: operaciones.php?op=ruta".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: operaciones.php?op=ruta".$val);
		}
	
	














}
else
{
header("location: index.php");
}
?>