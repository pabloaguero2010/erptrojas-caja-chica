<?php
session_start();
if ($_SESSION[perfil]=="q"){

//variables POST
$crut=$_POST["crut"];
$rut=$_POST["rut"]."-".$_POST["crut"];
$nombre=$_POST["nombre"];
$giro=$_POST["giro"];
$direccion=$_POST["direccion"];
$fono1=$_POST["fono1"];
$fono2=$_POST["fono2"];
$fono3=$_POST["fono3"];
$mail=$_POST["mail"];
$web=$_POST["web"];
$descripcion=$_POST["descripcion"];


//Validar campos


//validar campos obligatorios

if(!(isset($_POST["rut"]) or isset($_POST["crut"]) or isset($_POST["nombre"]) or isset($_POST["giro"]) or isset($_POST["direccion"])))
{
$valapob=1;
}

//validar rut
if($rut)
{
	$campos="&rut=".$_POST["rut"]."&crut=".$_POST["crut"];
}

require("../conectar.php");
$sql = "SELECT nombre_proveedor FROM proveedor WHERE rut_proveedor = '$rut'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
if(($auxr = pg_fetch_assoc($stat))  or (!(is_numeric($crut) or $crut=='k')))
	{
	$valapr=1;
	}


//devolver campos

if ($descripcion)
	{
	$campos=$campos."&descripcion=$descripcion";
	}
	
if ($nombre)
	{
	$campos=$campos."&nombre=$nombre";
	}
	
if ($giro)
	{
	$campos=$campos."&giro=$giro";
	}
	
if ($direccion)
	{
	$campos=$campos."&direccion=$direccion";
	}

if ($fono1)
	{
	$campos=$campos."&fono1=$fono1";
	}
	
if ($fono2)
	{
	$campos=$campos."&fono2=$fono2";
	}
	
if ($fono3)
	{
	$campos=$campos."&fono3=$fono3";
	}
	
if ($mail)
	{
	$campos=$campos."&mail=$mail";
	}

if ($web)
	{
	$campos=$campos."&web=$web";
	}
//Generar mensaje de warning
if($valapr==1)
	{
	$val="&valapr=1";
	}
if($valapob==1)
	{
	$val=$val."&valapob=1";
	}


	
	
if($val)
	{
	header("location: adquisiciones.php?op=ap".$campos.$val);
	}
else
	{

	
	
	require("../conectar.php");
	$sql = "INSERT INTO proveedor (rut_proveedor, nombre_proveedor, giro_proveedor, direccion_proveedor, telefono_proveedor, telefono2_proveedor, telefono3_proveedor, mail_proveedor, descripcion_proveedor, web_proveedor) VALUES ('$rut', '$nombre', '$giro', '$direccion', '$fono1', '$fono2', '$fono3', '$mail', '$descripcion', '$web')";
	
	
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: adquisiciones.php?op=ap".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: adquisiciones.php?op=ap".$campos.$val);
		}
	}







}
else
{
header("location: index.php");
}
?>