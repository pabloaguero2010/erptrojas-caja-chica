<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$patente=$_POST["patente"];
$num=$_POST["num"];
$tvehiculo=$_POST["tvehiculo"];
$anio=$_POST["anio"];


//validación

if ((!($patente)) or (!($tvehiculo)))
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
	/* validar exclusividad de numero de vehiculo
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
	
	*/
	}
	
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
	header("location: operaciones.php?op=av".$campos.$val);
	}
else
	{
	$num=(int)$num;
	if($num==0)
	echo $num;
	$anio=(int)$anio;
	require("../conectar.php");
	if($num==0)
	$sql = "INSERT INTO vehiculo (patente_vehiculo, num_vehiculo, cod_tipo_vehiculo, kilometraje_vehiculo, ano_vehiculo, estado_vehiculo) VALUES ('$patente', null, '$tvehiculo', null, '$anio', 'OK')";
	else
	$sql = "INSERT INTO vehiculo (patente_vehiculo, num_vehiculo, cod_tipo_vehiculo, kilometraje_vehiculo, ano_vehiculo, estado_vehiculo) VALUES ('$patente', '$num', '$tvehiculo', null, '$anio', 'OK')";
	echo $sql;
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=av".$val);
		}
	else
		{
		$val="&bd=1";
		$campos="&patente=".$_POST["patente"]."&num=".$_POST["num"];
		//header("location: operaciones.php?op=av".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>