<?php
session_start();
if ($_SESSION[perfil]=="o"){

$cliente=$_GET[cliente];
$fecha=$_GET[fecha];
$tv=$_GET[tv];
$ruta=$_GET[ruta];
$ts=$_GET[ts];
$sd=$_GET[sd];
$sp=$_GET[sp];
$es=$_GET[es];
$dm=$_GET[dm];
$se=$_GET[se];
$dias=$_GET[dias];
$prov=$_GET[prov];
$desc=$_GET[desc];
$ot=$_GET[ot];
$gd=$_GET[gd];
$oc=$_GET[oc];
$subtotal=$_GET[subtotal];
$factor=$_GET[factor];
$total=$_GET[total];
$vehiculo=$_POST[vehiculo];
$conductor=$_POST[conductor];

if($vehiculo == "sinvehiculo")
{
$vehiculo = "sv";
}

if($conductor == "sinconductor")
{
$conductor = "sc";
}



if($se==1)
{
$se=$dias;
}


if( (!($fecha)) or ($fecha=="click acá") )
	{
	$valf=1;
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


if($valf==1)
	{
	$val=$val."&valf=1";
	}
	
	
if($val)
	{
	header("location: operaciones.php?op=sic".$campos.$val);
	}


//echo $cliente."<br>".$fecha."<br>".$tv."<br>".$ruta."<br>".$ts."<br>".$sd."<br>".$sp."<br>".$es."<br>".$dm."<br>".$se."<br>".$dias."<br>".$prov."<br>".$desc."<br>".$ot."<br>".$gd."<br>".$oc."<br>".$vehiculo."<br>".$conductor;


	require("../conectar.php");
	$sql = "INSERT INTO servicio_cep (rut_cliente, fecha, cod_ruta, tipo_servicio, sobredimen, sobrepeso, escolta, desmov, sobreest, proveedor, ot, gd, oc, cod_tipo_vehiculo, patente_vehiculo, rut_conductor, descripcion, valor_sp, factor_polinomio, valor_total) VALUES ('$cliente', '$fecha', '$ruta', '$ts', '$sd', '$sp', '$es', '$dm', '$se', '$prov', $ot, $gd, $oc, $tv, '$vehiculo', '$conductor', '$desc', $subtotal, $factor, $total)";

	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	
	if($stat)
		{
		$val="&ok=1";
		header("location: operaciones.php?op=sic".$val);
		}
	else
		{
		$val="&bd=1";
		header("location: operaciones.php?op=sic".$campos.$val);
		}
	



}
else
{
header("location: index.php");
}
?>