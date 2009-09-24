<?php
session_start();
if ($_SESSION[perfil]=="j"){
$cod=$_GET[cod];
/*

//variables POST

$rut=$_POST["rut"]."-".$_POST["crut"];
$fecha=$_POST["calen"];
$nfactura=$_POST["nfactura"];
$neto=$_POST["neto"];
$iva=$_POST["iva"];
$total=$_POST["total"];
$descripcion=$_POST["descripcion"];
$gd=$_POST["gd"];
$oc=$_POST["oc"];
$cdv=$_POST["cdv"];
$entregado=$_POST["entregado"];
$pagado=$_POST["pagado"];
$empresa=$_POST["empresa"];


//Validar campos


//validar rut
if($rut)
{
	$campos="&rut=".$_POST["rut"]."&crut=".$_POST["crut"];
}

require("../conectar.php");
$sql = "SELECT nombre_proveedor, direccion_proveedor, giro_proveedor FROM proveedor WHERE rut_proveedor = '$rut'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
if(!($auxr = pg_fetch_assoc($stat)))
	{
	$valr=1;
	}

//validar fecha


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



//validar nfactura

if ($nfactura)
	{
	$campos=$campos."&nfactura=$nfactura";
	
	if(!is_numeric($nfactura))
		{
		$valnf=1;
		}
	}
else
	{ 
	$valnf=1;
	}
	
//validar neto
		
if ($neto)
	{
	$campos=$campos."&neto=$neto";
	
	if(!is_numeric($neto))
		{
		$valn=1;
		}
	}
else
	{ 
	$valn=1;
	}

//validar iva
		
if ($iva)
	{
	$campos=$campos."&iva=$iva";
	
	if(!is_numeric($iva))
		{
		$vali=1;
		}
	}
else
	{ 
	$vali=1;
	}

//validar total
		
if ($iva)
	{
	$campos=$campos."&total=$total";
	
	if(!is_numeric($total))
		{
		$valt=1;
		}
	}
else
	{ 
	$valt=1;
	}

//validar gd

if ($gd)
	{
	$campos=$campos."&gd=$gd";
	
	if(!is_numeric($gd))
		{
		$valg=1;
		}
	}

	
//validar oc

if ($oc)
	{
	$campos=$campos."&oc=$oc";
	
	if(!is_numeric($oc))
		{
		$valo=1;
		}
	}

	
//devolver otros campos

if ($descripcion)
	{
	$campos=$campos."&descripcion=$descripcion";
	}
	
if ($cdv)
	{
	$campos=$campos."&cdv=$cdv";
	}
	
if ($pagado)
	{
	$campos=$campos."&pagado=$pagado";
	}
	
if ($entregado)
	{
	$campos=$campos."&entregado=$entregado";
	}

//Generar mensaje de warning
if($valr==1)
	{
	$val="&valr=1";
	}
if($valf==1)
	{
	$val=$val."&valf=1";
	}
if($valnf==1)
	{
	$val=$val."&valnf=1";
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
if($valg==1)
	{
	$val=$val."&valg=1";
	}
if($valo==1)
	{
	$val=$val."&valo=1";
	}

	
	
if($val)
	{
	header("location: adquisiciones.php?op=ef2&cod=".$cod.$campos.$val);
	}
else
	{
	if ($entregado) $entregado=1; else $entregado=0;
	if ($pagado) $pagado=1; else $pagado=0;
	$gd=(int)$gd;
	$oc=(int)$oc;

*/	
	
	require("../conectar.php");
	//$sql = "INSERT INTO facturas_compra (n_factura_compra, fecha_factura_compra, rut_proveedor, neto_factura_compra, iva_factura_compra, total_factura_compra, descripcion_factura_compra, ngd_factura_compra, noc_factura_compra, cdv_factura_compra, entregado_factura_compra, pagado_factura_compra) VALUES ($nfactura, '$fecha', '$rut', $neto, $iva, $total, '$descripcion', $gd, $oc, '$cdv', '$entregado', '$pagado')";
	
	//$sql = "UPDATE facturas_compra SET n_factura_compra='$nfactura', fecha_factura_compra='$fecha', rut_proveedor='$rut', neto_factura_compra='$neto', iva_factura_compra='$iva', total_factura_compra='$total', descripcion_factura_compra='$descripcion', ngd_factura_compra='$gd', noc_factura_compra='$oc', cdv_factura_compra='$cdv', entregado_factura_compra='$entregado', pagado_factura_compra='$pagado', rut_empresa='$empresa' WHERE cod_factura_compra='$cod'";
	$sql = "DELETE FROM caja_chica WHERE id_caja='$cod'";
	$stat = pg_exec($dbh,$sql);
	pg_close($dbh);
	if($stat)
		{
		$val="&ok=2";
		header("location: cajachica.php?op=aie".$val);
		}
	else
		{
		$val="&bd=1";
	
		header("location: cajachica.php?op=aie".$val);
		}
	//}







}
else
{
header("location: index.php");
}
?>