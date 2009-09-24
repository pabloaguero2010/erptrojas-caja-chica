<?php

function elvehiculoes($num)
{
	require("../conectar.php");
	$sqleve = "SELECT tipo_vehiculo FROM tipo_vehiculo WHERE cod_tipo_vehiculo = $num";
	$stateve = pg_exec($dbh,$sqleve);
	$datoeve = pg_fetch_assoc($stateve);
	$tv = $datoeve[tipo_vehiculo];
	return $tv;
}

function larutaes($cod)
{
	require("../conectar.php");
	$sqleve = "SELECT origen, destino FROM ruta WHERE cod_ruta = $cod";
	$stateve = pg_exec($dbh,$sqleve);
	$datoeve = pg_fetch_assoc($stateve);
	$tv = $datoeve[origen]." - ".$datoeve[destino];
	return $tv;
}

$cod=$_GET[cod];

require("../conectar.php");
$sql = "SELECT * FROM tarifa WHERE cod_tarifa = '$cod'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$aux = pg_fetch_assoc($stat);


$ruta=$aux[cod_ruta];
$tvehiculo=$aux[cod_tipo_vehiculo];
$normal=$aux[normal];
if($normal==-1) $normal="";
$urgente=$aux[urgente];
if($urgente==-1) $urgente="";
$retorno=$aux[retorno];
if($retorno==-1) $retorno="";
$sobredimen=$aux[sobredimen];
if($sobredimen==-1) $sobredimen="";
$escolta=$aux[escolta];
if($escolta==-1) $escolta="";
$sobrepeso=$aux[sobrepeso];
if($sobrepeso==-1) $sobrepeso="";
$desmov=$aux[desmov];
if($desmov==-1) $desmov="";

?>


  <form  id="aif" name="aif" action="etarifas3.php?cod=<?php echo $cod; ?>" method="post">
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
                  <td width="401"><strong> Tarifas.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Tipo Vehículo</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
			<?php echo elvehiculoes($tvehiculo);  ?>

            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Ruta:</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
     
             <?php
            echo larutaes($ruta);
			?>
         
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Normal</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="normal" class="validate['required']" type="text" id="normal" size="10" value="<?php echo $normal; ?>" />
            *</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Urgente</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="urgente" type="text" id="urgente" size="10" value="<?php echo $urgente; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Retorno</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="retorno" type="text" id="retorno" size="10" value="<?php echo $retorno; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><strong>Valores Agregados</strong></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Sobredimensionado
            <label></label></td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="sobredimen" type="text" id="sobredimen" size="10" value="<?php echo $sobredimen; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Sobrepeso</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="sobrepeso" type="text" id="sobrepeso" size="10" value="<?php echo $sobrepeso; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Escolta</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="escolta" type="text" id="escolta" size="10" value="<?php echo $escolta; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td colspan="2" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Desmovilización</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="desmov" type="text" id="desmov" size="10" value="<?php echo $desmov; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td colspan="2" class="textoform"><input type="submit" name="Ingresar2" id="Ingresar2" value="Ingresar" class="botonlogin"  /></td>
            <td>&nbsp;</td>
          </tr>


        </table>
          </form>  