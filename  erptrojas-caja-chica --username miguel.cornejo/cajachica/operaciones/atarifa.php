<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$tipo=$_POST["tvehiculo"];
$ruta=$_POST["ruta"];
$normal=$_POST["normal"];
$urgente=$_POST["urgente"];
$retorno=$_POST["retorno"];
$sobredimen=$_POST["sobredimen"];
$escolta=$_POST["escolta"];
$sobrepeso=$_POST["sobrepeso"];
$desmov=$_POST["desmov"];



//validación

if (!($tipo) or !($ruta) or !($normal))
	{
	//$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
	$valv=1;
	}

else {
	require("../conectar.php");
	$sqlv = "SELECT cod_tarifa FROM tarifa WHERE cod_ruta='$ruta' AND cod_tipo_vehiculo='$tipo'";
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
if(!$urgente)
$urgente=-1;
if(!$retorno)
$retorno=-1;
if(!$sobredimen)
$sobredimen=-1;
if(!$sobrepeso)
$sobrepeso=-1;
if(!$desmov)
$desmov=-1;
if(!$escolta)
$escolta=-1;
	
	
	require("../conectar.php");
	$sql = "INSERT INTO tarifa (cod_tipo_vehiculo, cod_ruta, normal, urgente, retorno, sobredimen, sobrepeso, desmov, escolta) VALUES ($tipo, $ruta, $normal, $urgente, $retorno, $sobredimen, $sobrepeso, $desmov, $escolta)";
	$stat = pg_exec($dbh,$sql);
	
	$sql2 = "SELECT origen, destino FROM ruta WHERE cod_ruta='$ruta'";
	$stat2 = pg_exec($dbh,$sql2);
	$aux2 = pg_fetch_assoc($stat2);
	$origen2 = $aux2[destino];
	$destino2 = $aux2[origen];
	$sql3 = "SELECT cod_ruta FROM ruta WHERE origen = '$origen2' AND destino = '$destino2'";
	$stat3 = pg_exec($dbh,$sql3);
	$aux3 = pg_fetch_assoc($stat3);
	$ruta2 = $aux3[cod_ruta];
	
	$sql4 = "INSERT INTO tarifa (cod_tipo_vehiculo, cod_ruta, normal, urgente, retorno, sobredimen, sobrepeso, desmov, escolta) VALUES ($tipo, $ruta2, $normal, $urgente, $retorno, $sobredimen, $sobrepeso, $desmov, $escolta)";
	$stat4 = pg_exec($dbh,$sql4);
	
	pg_close($dbh);
	if($stat AND $stat2 AND $stat3 AND $stat4)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=tarifas".$val);
		}
	else
		{
		$val="&bd=1";
		//$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
		//echo $sql2;
		header("location: operaciones.php?op=tarifas".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>