<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$tipo=$_POST["tipo"];
$descripcion=$_POST["descripcion"];

//validación

if (!($tipo))
	{
	$campos="&tipo=".$_POST["tipo"]."&descripcion=".$_POST["descripcion"];
	$valtv=1;
	}
else
	{
	require("../conectar.php");
	$sql = "SELECT tipo_vehiculo FROM tipo_vehiculo WHERE (tipo_vehiculo = '$tipo')";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if(($auxr = pg_fetch_assoc($stat)))
		{
		$valtv=1;
		$campos="&tipo=".$_POST["tipo"]."&descripcion=".$_POST["descripcion"];
		}
	}
	
//Generar mensaje de warning
if($valtv==1)
	{
	$val="&valtv=1";
	}
	
if($val)
	{
	header("location: operaciones.php?op=tvehiculo".$campos.$val);
	}
else
	{
	require("../conectar.php");
	$sql = "INSERT INTO tipo_vehiculo (tipo_vehiculo, descripcion_tipo_vehiculo) VALUES ('$tipo', '$descripcion')";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=tvehiculo".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: operaciones.php?op=tvehiculo".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>