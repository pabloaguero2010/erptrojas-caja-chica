<?php
session_start();
if ($_SESSION[perfil]=="o"){

$cod=$_GET[cod];
//variables POST
$cliente=$_POST["cliente"];
$nombre=$_POST["nombre"];



//validación

if (!($cliente) or !($nombre))
	{
	$campos="&cliente".$_POST["cliente"]."&proyecto=".$_POST["nombre"];
	$valv=1;
	}

//Generar mensaje de warning
if($valv==1)
	{
	$val="&valv=1";
	}
	
if($val)
	{
	header("location: operaciones.php?op=eproy2".$campos.$val);
	}
else
	{
	require("../conectar.php");
	$sql = "UPDATE proyecto SET rut_cliente='$cliente', nombre_proyecto='$nombre' WHERE cod_proyecto=$cod";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=eproy".$val);
		}
	else
		{
		$val="&bd=1";
		$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
		header("location: operaciones.php?op=eproy2".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>