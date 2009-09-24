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


$cod=$_GET[cod];

require("../conectar.php");
$sql = "SELECT * FROM sobreestadia WHERE cod_sobreestadia = '$cod'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$aux = pg_fetch_assoc($stat);



$tvehiculo=$aux[cod_tipo_vehiculo];
$valor=$aux[valor];


?>


  <form  id="aif" name="aif" action="ese3.php?cod=<?php echo $cod; ?>" method="post">
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
                  <td width="401"><strong>Ver/Actualizar Tarifas de Sobreestadia.</strong></td>
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
            <td class="textoform">Valor por día</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="valor" type="text" id="valor" size="10" value="<?php echo $valor; ?>" /></td>
            <td class="textoform">&nbsp;</td>
            <td colspan="2" class="textoform"><input type="submit" name="Ingresar2" id="Ingresar2" value="Ingresar" class="botonlogin"  /></td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  