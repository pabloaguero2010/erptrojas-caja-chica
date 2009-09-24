<?php
session_start();
if ($_SESSION[perfil]=="r"){

$rut=$_POST[rutprov];
$crub=$_POST[crutprov];
$rut= $rut."-".$crub;

require("../conectar.php");
$sql = "SELECT nombre_proveedor, direccion_proveedor, giro_proveedor FROM proveedor WHERE rut_proveedor = '$rut'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);

if($datos = pg_fetch_assoc($stat))
	{
	$nombre=$datos[nombre_proveedor];
	$direccion=$datos[direccion_proveedor];
	$giro=$datos[giro_proveedor];
	echo "
	<table width='657' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='67'>Nombre :</td>
                  <td width='150'>".$nombre."</td>
                  <td width='75'>Dirección :</td>
                  <td width='224'>".$direccion."</td>
                  <td width='42'>Giro :</td>
                  <td width='99'>".$giro."</td>
                </tr>
    </table>";


	}
	else
	{
	echo "rut invalido o el Proveedor no está ingresado al Sistema.";
	}



}
else
{
header("location: index.php");
}
?>