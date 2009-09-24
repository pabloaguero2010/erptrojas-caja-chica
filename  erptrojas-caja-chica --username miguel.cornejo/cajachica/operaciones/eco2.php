<?php

$rut=$_GET[cod];
require("../conectar.php");
$sql = "SELECT v_licencia FROM conductor WHERE rut_conductor = '$rut'";
$stat = pg_exec($dbh,$sql);
$sql2 = "SELECT nombres, apellido1, apellido2 FROM personal WHERE rut_personal = '$rut'";
$stat2 = pg_exec($dbh,$sql2);
pg_close($dbh);
$aux = pg_fetch_assoc($stat);
$aux2 = pg_fetch_assoc($stat2);
$fecha = $aux[v_licencia];
$nombre = "Nombre : ".$aux2[nombres]." ".$aux2[apellido1]." ".$aux2[apellido2];

?>

<form  id="aif" name="aif" action="eco3.php?cod=<?php echo $rut; ?>" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14">&nbsp;</td>
            <td width="192">&nbsp;</td>
            <td width="14">&nbsp;</td>
            <td width="180">&nbsp;</td>
            <td width="68">&nbsp;</td>
            <td width="6">&nbsp;</td>
            <td width="193">&nbsp;</td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoconductors.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Actualizar Licencia Conductor</strong></td>
                </tr>
              </table>            </td>
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
            <td colspan="6" class="textoform"><div id="datosprov"><?php echo $nombre; ?></div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha Vencimiento Licencia</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input class="ncalendar" name="calen" maxlength="20" id="calen" type="text" <?php if($fecha) echo "value=".$fecha; else echo "value='click acá'"; ?> />
            </label></td>
            <td class="textoform">&nbsp;</td>
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
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Ingresar" />
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  