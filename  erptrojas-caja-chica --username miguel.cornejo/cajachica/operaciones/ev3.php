<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$patente=$_GET["cod"];
$num=$_POST["num"];
$tvehiculo=$_POST["tvehiculo"];
$anio=$_POST["anio"];


//validación
/*
if ((!($patente)) or (!($num)) or (!($tvehiculo)))
	{
	$campos="&patente=".$_POST["patente"]."&num=".$_POST["num"];
	$valv=1;
	}
else
	{
	require("../conectar.php");
	$sql = "SELECT patente_vehiculo FROM vehiculo WHERE patente_vehiculo = '$patente'";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if(($auxr = pg_fetch_assoc($stat)))
		{
		$valvp=1;
		$campos="&patente=".$_POST["patente"]."&num=".$_POST["num"];
		}
	require("../conectar.php");
	$sql = "SELECT num_vehiculo FROM vehiculo WHERE num_vehiculo = '$num'";
	echo $sql;
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if(($auxr = pg_fetch_assoc($stat)))
		{
		$valvn=1;
		$campos="&patente=".$_POST["patente"]."&num=".$_POST["num"];
		}
	
	
	}
	*/
//Generar mensaje de warning
if($valv==1)
	{
	$val="&valv=1";
	}

if($valvp==1)
	{
	$val=$val."&valvp=1";
	}
	
if($valvn==1)
	{
	$val=$val."&valvn=1";
	}
	
if($val)
	{
	header("location: operaciones.php?op=ev".$campos.$val);
	}
else
	{
	require("../conectar.php");
	//$sql = "INSERT INTO vehiculo (patente_vehiculo, num_vehiculo, cod_tipo_vehiculo, kilometraje_vehiculo, ano_vehiculo, estado_vehiculo) VALUES ('$patente', '$num', '$tvehiculo', null, '$anio', 'OK')";
	
	$sql = "UPDATE vehiculo SET patente_vehiculo='$patente', num_vehiculo='$num', cod_tipo_vehiculo='$tvehiculo', ano_vehiculo='$anio' WHERE patente_vehiculo='$patente'";

	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=ev".$val);
		}
	else
		{
		$val="&bd=1";
		//$campos="&patente=".$_POST["patente"]."&num=".$_POST["num"];
		header("location: operaciones.php?op=ev".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>