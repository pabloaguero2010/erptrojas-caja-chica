<?php
session_start();
if ($_SESSION[perfil]=="r"){

//variables POST
$crut=$_POST["crut"];
$rut=$_POST["rut"]."-".$_POST["crut"];
$nombres=$_POST["nombres"];
$apellido1=$_POST["apellido1"];
$apellido2=$_POST["apellido2"];
$fechanaci=$_POST["fechanaci"];
$direccion=$_POST["direccion"];
$fono1=$_POST["fono1"];
$correo=$_POST["correo"];
$departamento=$_POST["departamento"];
$anexo=$_POST["anexo"];
$contrato=$_POST["contrato"];
$fechaing=$_POST["fechaing"];
$fechatermino=$_POST["fechatermino"];
$horas=$_POST["horas"];
$dias=$_POST["dias"];





//Validar campos
//validar campos obligatorios

if(!(isset($_POST["rut"]) or isset($_POST["crut"]) or isset($_POST["nombres"]) or isset($_POST["apellido1"]) or isset($_POST["apellido2"]) or isset($_POST["fechanaci"]) or isset($_POST["direccion"]) or isset($_POST["departamento"]) or isset($_POST["anexo"]) or isset($_POST["contrato"]) or isset($_POST["fechaing"]) or isset($_POST["horas"]) or isset($_POST["dias"])))
{
$valapob=1;
}

//validar rut

if($rut)
{
	$campos="&rut=".$_POST["rut"]."&crut=".$_POST["crut"];
}

require("../conectar.php");
$sql = "SELECT nombres FROM personal WHERE rut_personal = '$rut'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
if(($auxr = pg_fetch_assoc($stat))  or (!(is_numeric($crut) or $crut=='k')))
	{
	$valapr=1;
	}

/*if($rut)
{
	$campos="&rut=".$_POST["rut"]."&crut=".$_POST["crut"];
}


if(!(is_numeric($crut) or $crut=='k'))
	{
	$valapr=1;
	}*/

//validar fecha nacimiento


if( (!($fechanaci)) or ($fechanaci=="click acá") )
	{
	$valfn=1;
	}
else
	{
	$campos=$campos."&fechanaci=$fechanaci";
	list($dia,$mes,$anio)=explode("/",$fechanaci);
	if (!(checkdate ($mes, $dia, $anio)))
		{
		$valfn=1;
		}
	}

//validar fecha inicio contrato


if( (!($fechaing)) or ($fechaing=="click acá") )
	{
	$valfing=1;
	}
else
	{
	$campos=$campos."&fechaing=$fechaing";
	list($dia,$mes,$anio)=explode("/",$fechaing);
	if (!(checkdate ($mes, $dia, $anio)))
		{
		$valfing=1;
		}
	}
	
	//validar fecha termino contrato


if( (!($fechatermino)) or ($fechatermino=="click acá") )
	{
	$valfter=1;
	}
else
	{
	$campos=$campos."&fechatermino=$fechatermino";
	list($dia,$mes,$anio)=explode("/",$fechatermino);
	if (!(checkdate ($mes, $dia, $anio)))
		{
		$valfter=1;
		}
	}


//validar fono1
/*
if ($fono1)
	{
	$campos=$campos."&fono1=$fono1";
	
	if(!is_numeric($fono1))
		{
		$valnf=1;
		}
	}
else
	{ 
	$valnf=1;
	}
	*/
//validar anexo
		
if ($anexo)
	{
	$campos=$campos."&anexo=$anexo";
	
	if(!is_numeric($anexo))
		{
		$valn=1;
		}
	}
else
	{ 
	$valn=1;
	}


/*
//validar horas de trabajo
		
if ($horas)
	{
	$campos=$campos."&horas=$horas";
	
	if(!is_numeric($horas))
		{
		$vali=1;
		}
	}
else
	{ 
	$vali=1;
	}

//validar dias de trabajo a la semana
		
if ($dias)
	{
	$campos=$campos."&dias=$dias";
	
	if(!is_numeric($dias))
		{
		$valt=1;
		}
	}
else
	{ 
	$valt=1;
	}

	*/
//validar campos de texto

if ($fono1)
	{
	$campos=$campos."&fono1=$fono1";
	}
if ($nombres)
	{
	$campos=$campos."&nombres=$nombres";
	}
	
if ($apellido1)
	{
	$campos=$campos."&apellido1=$apellido1";
	}
	
if ($apellido2)
	{
	$campos=$campos."&apellido2=$apellido2";
	}
	
if ($direccion)
	{
	$campos=$campos."&direccion=$direccion";
	}
	
if ($correo)
	{
	$campos=$campos."&correo=$correo";
	}
	
if ($departamento)
	{
	$campos=$campos."&departamento=$departamento";
	}
	
if ($contrato)
	{
	$campos=$campos."&contrato=$contrato";
	}
if ($horas)
	{
	$campos=$campos."&horas=$horas";
	}
if ($dias)
	{
	$campos=$campos."&dias=$dias";
	}

//Generar mensaje de warning
if($valapob==1)
	{
	$val="&$valapob=1";
	}
if($valapr==1)
	{
	$val=$val."&valapr=1";
	}
if($valf==1)
	{
	$val=$val."&valf=1";
	}
if($valfn==1)
	{
	$val=$val."&valfn=1";
	}
if($valfing==1)
	{
	$val=$val."&valfing=1";
	}
if($valnfter==1)
	{
	$val=$val."&valnfter=1";
	}
if($valn==1)
	{
	$val=$val."&valn=1";
	}
if($vali==1)
	{
	$val=$val."&vali=1";
	}
if($valt==1)
	{
	$val=$val."&valt=1";
	}

	if($val)
	{
	header("location: rrhh.php?op=it".$campos.$val);
	}
else
	{
	

	
	
	require("../conectar.php");

	
	
	$sql = "INSERT INTO personal (rut_personal, nombres, apellido1, apellido2, fechanaci, direccion, fono1, correo, departamento, anexo, contrato, fechaing, fechatermino, horas, dias) VALUES ('$rut',  '$nombres', '$apellido1', '$apellido2', '$fechanaci', '$descripcion', '$direccion', '$fono1', '$correo', '$departamento', '$contrato', '$fechaing', '$fechatermino', '$horas', '$dias')";
	
	//$sql = "UPDATE personal SET rut='$rut', dvrut='$crut', nombres='$nombres', apellido1='$apellido1', apellido2='$apellido2', fechanaci='$fechanaci', direccion='$direccion', fono1='$fono1', correo='$correo', departamento='$departamento', contrato='$contrato', fechaing='$fechaing', fechatermino='$fechatermino', horas='$horas', dias='$dias' WHERE rut='$rut'";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=1";
		header("location: rrhh.php?op=it".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: rrhh.php?op=it".$campos.$val);
		}
	}





}
else
{
header("location: index.php");
}
?>