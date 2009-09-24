<?php
$patente=$_GET[cod];
require("../conectar.php");
$sql = "SELECT cod_tipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo order by tipo_vehiculo ASC";
$sql2 = "SELECT num_vehiculo, cod_tipo_vehiculo, ano_vehiculo FROM vehiculo WHERE patente_vehiculo = '$patente'";

$stat = pg_exec($dbh,$sql);
$stat2 = pg_exec($dbh,$sql2);



$aux2 = pg_fetch_assoc($stat2);
$num=$aux2[num_vehiculo];
$tipo=$aux2[cod_tipo_vehiculo];
$anio=$aux2[ano_vehiculo];

$sql3 = "SELECT tipo_vehiculo FROM tipo_vehiculo WHERE cod_tipo_vehiculo = $tipo";
$stat3 = pg_exec($dbh,$sql3);
$aux3 = pg_fetch_assoc($stat3);
$tipodv = $aux3[tipo_vehiculo];




pg_close($dbh);

?>


<form  id="aif" name="aif" action="ev3.php?cod=<?php echo $patente; ?>" method="post">
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
                  <td width="55" height="61"><div align="center"><img src="../images/iconovehiculos.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Agregar Vehículo.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Patente</td>
            <td class="textoform">:</td>
            <td class="textoform"><label><?php echo $patente; ?></label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Número</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="num" class="validate['required','digit']" type="text" id="num" size="6" maxlength="6" <?php if($num) echo "value=".$num; ?> />
            </label></td>
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
              <select name="tvehiculo" class="textoform" id="tvehiculo">
              <option value='<?php echo $tipo; ?>'><?php echo $tipodv; ?></option>
<?php
			while ($datos = pg_fetch_assoc($stat))
			{
			if($datos[cod_tipo_vehiculo] != $tipo)
				{
            	echo "<option value='".$datos[cod_tipo_vehiculo]."'>".$datos[tipo_vehiculo]."</option>";
				}
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
            <td class="textoform">Año</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="anio" class="validate['digit']" type="text" id="anio" size="4" maxlength="4" <?php if($anio) echo "value=".$anio; ?>  />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="19">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td colspan="2" class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="40">&nbsp;</td>
            <td valign="middle">
              
              <div align="right">
                <input name="limpiar" type="reset" class="botonlogin" id="limpiar" value="Limpiar" />
                </div></td>
            <td valign="middle"><div align="center"></div></td>
            <td valign="middle">
              
              <div align="left">
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Actualizar Datos" />
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  