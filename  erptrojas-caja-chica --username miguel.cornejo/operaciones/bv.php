<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables GET
$cod=$_GET["cod"];


//validación


	require("../conectar.php");
	//$sql = "DELETE FROM tipo_vehiculo WHERE cod_tipo_vehiculo = '$cod'";
	
	$sql = "UPDATE vehiculo SET estado_vehiculo='borrado' WHERE patente_vehiculo='$cod'";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=2";
		header("location: operaciones.php?op=ev".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: operaciones.php?op=ev".$val);
		}
	
	














}
else
{
header("location: index.php");
}
?>