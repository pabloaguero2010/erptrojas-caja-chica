<?php
session_start();
if ($_SESSION[perfil]=="o"){


//variables POST
$origen=$_POST["origen"];
$destino=$_POST["destino"];

//validación

if ((!($origen)) or (!($destino)))
	{
	$campos="&origen=".$_POST["origen"]."&destino=".$_POST["destino"];
	$valruta=1;
	}
else
	{
	require("../conectar.php");
	$sql = "SELECT origen, destino FROM ruta WHERE (origen = '$origen' AND destino = '$destino') OR (origen = '$destino' AND destino = '$origen')";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if(($auxr = pg_fetch_assoc($stat)))
		{
		$valruta=1;
		}
	}
	
//Generar mensaje de warning
if($valruta==1)
	{
	$val="&valruta=1";
	}
	
if($val)
	{
	header("location: operaciones.php?op=ruta".$campos.$val);
	}
else
	{
	require("../conectar.php");
	$sql = "INSERT INTO ruta (origen, destino) VALUES ('$origen', '$destino')";
	$sql2 = "INSERT INTO ruta (origen, destino) VALUES ('$destino', '$origen')";
	$stat = pg_exec($dbh,$sql);
	$stat2 = pg_exec($dbh,$sql2);
	pg_close($dbh);
	if($stat and $stat2)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=ruta".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: operaciones.php?op=ruta".$campos.$val);
		}
	}
	














}
else
{
header("location: index.php");
}
?>