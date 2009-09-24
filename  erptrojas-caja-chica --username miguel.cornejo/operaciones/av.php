<?php

require("../conectar.php");
$sql = "SELECT cod_tipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo order by tipo_vehiculo ASC";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);

?>


<form  id="aif" name="aif" action="av2.php" method="post">
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
            <td class="textoform"><label>
              <input name="patente" class="validate['required','length[6,6]','alphanum']" type="text" id="patente" size="6" maxlength="6" <?php if($patente=$_GET["patente"]) echo "value=".$patente; ?> />
            </label></td>
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
              <input name="num" class="validate['digit']" type="text" id="num" size="6" maxlength="6" <?php if($num=$_GET["num"]) echo "value=".$num; ?> />
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
<?php
			while ($datos = pg_fetch_assoc($stat))
			{
            echo "<option value='".$datos[cod_tipo_vehiculo]."'>".$datos[tipo_vehiculo]."</option>";
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
              <input name="anio" class="validate['digit']" type="text" id="anio" size="4" maxlength="4" />
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
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Ingresar Datos" />
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  