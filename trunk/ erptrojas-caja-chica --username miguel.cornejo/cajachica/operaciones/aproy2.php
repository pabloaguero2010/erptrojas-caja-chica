<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$cliente=$_POST["cliente"];
$nombre=$_POST["nombre"];



//validación

if (!($cliente) or !($nombre))
	{
	$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
	$valv=1;
	}

//Generar mensaje de warning
if($valv==1)
	{
	$val="&valv=1";
	}
	
if($val)
	{
	header("location: operaciones.php?op=aproy".$campos.$val);
	}
else
	{
	require("../conectar.php");
	$sql = "INSERT INTO proyecto (rut_cliente, nombre_proyecto) VALUES ('$cliente', '$nombre')";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=aproy".$val);
		}
	else
		{
		$val="&bd=1";
		$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
		header("location: operaciones.php?op=aproy".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>