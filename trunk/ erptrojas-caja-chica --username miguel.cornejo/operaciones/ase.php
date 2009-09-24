<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$tipo=$_POST["tvehiculo2"];
$sobreestadia=$_POST["sobreestadia"];




//validación

if (!($tipo) or !($sobreestadia))
	{
	//$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
	$valv=1;
	}
else {
	require("../conectar.php");
	$sqlv = "SELECT cod_sobreestadia FROM sobreestadia WHERE cod_tipo_vehiculo='$tipo'";
	$statv = pg_exec($dbh,$sqlv);
	pg_close($dbh);
	if ($auxv = pg_fetch_assoc($statv))
		{
		$valt=1;
		}
	}




//Generar mensaje de warning
if($valv==1)
	{
	$val="&valta=1";
	}
if($valt==1)
	{
	$val="&valta=2";
	}
	
if($val)
	{
	header("location: operaciones.php?op=tarifas".$val);
	}
else
	{

	
	
	require("../conectar.php");
	$sql = "INSERT INTO sobreestadia (cod_tipo_vehiculo, valor) VALUES ($tipo, $sobreestadia)";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=tarifas".$val);
		}
	else
		{
		$val="&bd=1";
		//$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
		//echo $sql;
		header("location: operaciones.php?op=tarifas".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>