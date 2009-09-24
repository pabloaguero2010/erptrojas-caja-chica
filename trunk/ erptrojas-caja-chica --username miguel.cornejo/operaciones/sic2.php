<?php

$cliente=$_POST[cliente];
$fecha=$_POST[calen];
$tv=$_POST[tvehiculo];
$ruta=$_POST[ruta];
$ts=$_POST[radio];
$sd=$_POST[sd];
$sp=$_POST[sp];
$es=$_POST[escolta];
$dm=$_POST[desmovilizacion];
$se=$_POST[se];
$dias=$_POST[dias];
$prov=$_POST[proveedor];
$desc=$_POST[descripcion];
$ot=$_POST[ot];
$gd=$_POST[guiadespacho];
$oc=$_POST[oc];





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
else
	{
	if ($sd) $sd=1; else $sd=0;
	if ($sp) $sp=1; else $sp=0;
	if ($es) $es=1; else $es=0;
	if ($dm) $dm=1; else $dm=0;
	if ($se) $se=1; else $se=0;
	$oc=(int)$oc;
	}

//echo $cliente."<br>".$fecha."<br>".$tv."<br>".$ruta."<br>".$ts."<br>".$sd."<br>".$sp."<br>".$es."<br>".$dm."<br>".$se."<br>".$dias."<br>".$prov."<br>".$desc."<br>".$ot."<br>".$gd."<br>".$oc;

require("../conectar.php");
$sql = "SELECT * FROM tarifa WHERE cod_tipo_vehiculo = '$tv' AND cod_ruta = '$ruta'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
	
if($stat)
{
	$subtotal=-1;
	$auxt=1;
	$aux = pg_fetch_assoc($stat);
	if ($ts=="normal" and $aux[normal] > 0)
	{
		$subtotal = $aux[normal];
	}
	if ($ts=="urgente" and $aux[urgente] > 0)
	{
		$subtotal = $aux[urgente];
	}
	if ($ts=="retorno" and $aux[retorno] > 0)
	{
		$subtotal = $aux[retorno];
	}
	
	if ($subtotal > 0)
	{
	
		if ($sd==1)
		{
			if($aux[sobredimen] > 0){
				$subtotal = $subtotal + $aux[sobredimen];
			}
			else{
				$auxt=-1;
			}
		}
		if ($sp==1)
		{
			if($aux[sobrepeso] > 0){	
				$subtotal = $subtotal + $aux[sobrepeso];
			}
			else{
				$auxt=-1;
			}
		}
		if ($es==1)
		{
			if($aux[escolta] > 0){
				$subtotal = $subtotal + $aux[escolta];
			}
			else{
				$auxt=-1;
			}
		}
		if ($dm==1)
		{
			if($aux[desmov] > 0){
				$subtotal = $subtotal + $aux[desmov];
			}
			else{
				$auxt=-1;
			}
		}
		if ($se==1)
		{
			require("../conectar.php");
			$sql2 = "SELECT * FROM sobreestadia WHERE cod_tipo_vehiculo = $tv";
			$stat2 = pg_exec($dbh,$sql2);
			pg_close($dbh);
			if($stat2)
			{
				$aux2 = pg_fetch_assoc($stat2);
				$subtotal = $subtotal + ($dias * $aux2[valor]);
			}
			else
			{
				$subtotal="no existe la tarifa de la sobreestadía en la Base de Datos";	
			}
		}
	}
	else
	{
		$subtotal="no existe la tarifa en la Base de Datos";
	}
}

else
{
	$subtotal="no existe la tarifa en la Base de Datos";
}


if ($auxt < 0)
{
	$subtotal="no existe la tarifa en la Base de Datos";
}

$factor=1.13;
$total=$subtotal*$factor;

?>


<form  id="aif" name="aif" action="sic3.php?<?php echo "cliente=".$cliente."&fecha=".$fecha."&tv=".$tv."&ruta=".$ruta."&ts=".$ts."&sd=".$sd."&sp=".$sp."&es=".$es."&dm=".$dm."&se=".$se."&dias=".$dias."&prov=".$prov."&desc=".$desc."&ot=".$ot."&gd=".$gd."&oc=".$oc."&subtotal=".$subtotal."&factor=".$factor."&total=".$total; ?>" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13">&nbsp;</td>
            <td width="169">&nbsp;</td>
            <td width="12">&nbsp;</td>
            <td width="202">&nbsp;</td>
            <td width="73">&nbsp;</td>
            <td width="11">&nbsp;</td>
            <td width="186">&nbsp;</td>
            <td width="21">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoservicioss.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Prestación de Servicios con Estado de Pago.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Vehículo</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <select name="vehiculo" class="textoform" id="vehiculo">
              <option value="sinvehiculo">Escoger Vehículo</option>
              <?php
			  
			require("../conectar.php");
			$sql = "SELECT patente_vehiculo FROM vehiculo WHERE cod_tipo_vehiculo = '$tv' AND estado_vehiculo = 'OK' order by patente_vehiculo ASC";
			$stat = pg_exec($dbh,$sql);
			pg_close($dbh);
			while ($datos = pg_fetch_assoc($stat))
			{
            echo "<option value='".$datos[patente_vehiculo]."'>".$datos[patente_vehiculo]."</option>";
			}
?>
              </select>
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Conductor</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <select name="conductor" class="textoform" id="conductor">
              <option value="sinconductor">Escoger Conductor</option>
             <?php
			  
			require("../conectar.php");
			$sql = "SELECT conductor.rut_conductor, personal.nombres, personal.apellido1, personal.apellido2 FROM conductor INNER JOIN personal  ON conductor.rut_conductor = personal.rut_personal order by personal.apellido1 ASC";
			$stat = pg_exec($dbh,$sql);
			pg_close($dbh);
			while ($datos = pg_fetch_assoc($stat))
			{
            echo "<option value='".$datos[rut_conductor]."'>".$datos[nombres]." ".$datos[apellido1]." ".$datos[apellido2]."</option>";
			}
			
			?>
              </select>
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td colspan="3" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Valores</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td colspan="3" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">SubTotal</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label><?php echo $subtotal; ?> </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Factor Polinomio</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label><?php echo $factor; ?> </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Total</td>
            <td class="textoform">:</td>
            <td class="textoform"><label><?php echo $total; ?> </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="40">&nbsp;</td>
            <td valign="middle">
              <div align="right">
                <input name="anterior" type="button" class="botonlogin" id="anterior" value="Anterior" onclick='gotoLink("operaciones.php?op=sic")' />
              </div></td>
            <td valign="middle"><div align="center"></div></td>
            <td valign="middle"><div align="left">
              <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Finalizar" />
            </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  
