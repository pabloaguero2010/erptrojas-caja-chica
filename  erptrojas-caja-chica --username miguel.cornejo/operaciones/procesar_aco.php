<?php
session_start();
if ($_SESSION[perfil]=="o"){

$rut=$_POST[rutprov];
$crub=$_POST[crutprov];
$rut= $rut."-".$crub;

require("../conectar.php");
$sql = "SELECT * FROM personal WHERE rut_personal = '$rut'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);

if($datos = pg_fetch_assoc($stat))
	{
	$nombre=$datos[nombres]." ".$datos[apellido1]." ".$datos[apellido2];

	echo "
	<table width='657' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='10%'>Nombre :</td>
                  <td width='90%'> ".$nombre."</td>
                </tr>
    </table>";


	}
	else
	{
	echo "rut invalido o el Conductor no está ingresado como personal en el Sistema.";
	}



}
else
{
header("location: index.php");
}
?>