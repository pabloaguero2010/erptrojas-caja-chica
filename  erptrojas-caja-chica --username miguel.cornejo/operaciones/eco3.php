<?php
session_start();
if ($_SESSION[perfil]=="o"){

//variables POST

$rut=$_GET[cod];
$fecha=$_POST["calen"];
echo $fecha;


//Validar campos


/*validar rut
if($rut)
{
	$campos="&rut=".$_POST["rut"]."&crut=".$_POST["crut"];
}

require("../conectar.php");
$sql = "SELECT * FROM personal WHERE rut_personal = '$rut'";
$sql2 = "SELECT * FROM conductor WHERE rut_conductor = '$rut' AND estado_conductor != 'borrado'";
$stat = pg_exec($dbh,$sql);
$stat2 = pg_exec($dbh,$sql2);
pg_close($dbh);
if(!($auxr = pg_fetch_assoc($stat)))
	{
	$valr=1;
	}
	
	
if(($auxr2 = pg_fetch_assoc($stat2)))
	{
	$valc=1;
	}
*/


//validar fecha


if( (!($fecha)) or ($fecha=="click acá") )
	{
	$valf=2;
	}
else
	{
	$campos=$campos."&fecha=$fecha";
	list($dia,$mes,$anio)=explode("/",$fecha);
	if (!(checkdate ($mes, $dia, $anio)))
		{
		$valf=1;
		}
	}

//Generar mensaje de warning
if($valr==1)
	{
	$val="&valr=1";
	}

if($valc==1)
	{
	$val=$val."&valc=1";
	}


if($valf==1)
	{
	$val=$val."&valf=1";
	}

	
	
if($val)
	{
	header("location: operaciones.php?op=eco2".$campos.$val);
	}
else
	{
	//if ($valf==2) $fecha=NULL;
	
	require("../conectar.php");
	/*$sql10 = "SELECT * FROM conductor WHERE rut_conductor = '$rut' AND estado_conductor = 'borrado'";
	$stat10 = pg_exec($dbh,$sql10);
	if($stat10)
		{
		$sql = "UPDATE conductor SET estado_conductor='OK' WHERE rut_conductor='$rut'";
		$stat = pg_exec($dbh,$sql);
		pg_close($dbh);
		}
	else
		{
		if ($valf==2) $sql = "INSERT INTO conductor (rut_conductor) VALUES ('$rut')";
		else $sql = "INSERT INTO conductor (rut_conductor, v_licencia, estado_conductor) VALUES ('$rut', '$fecha', 'OK')";
		$stat = pg_exec($dbh,$sql);
		pg_close($dbh);
		}
	*/	
		
	$sql = "UPDATE conductor SET v_licencia='$fecha' WHERE rut_conductor='$rut'";
	echo $sql;
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=eco".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: operaciones.php?op=eco2".$campos.$val);
		}
	}







}
else
{
header("location: index.php");
}
?>