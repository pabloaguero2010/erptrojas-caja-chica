<?php
session_start();
if ($_SESSION[perfil]=="o"){

$cod=$_GET[cod];
//variables POST
$valor=$_POST["valor"];












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
	$sql = "UPDATE sobreestadia SET valor = '$valor' WHERE cod_sobreestadia = '$cod'";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=ese".$val);
		}
	else
		{
		$val="&bd=1";
		//$campos="&cliente".$_POST["cliente"]."&nombre=".$_POST["nombre"];
		//echo $sql;
		header("location: operaciones.php?op=ese".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>