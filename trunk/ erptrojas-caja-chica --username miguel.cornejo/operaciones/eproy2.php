<?php

$cod=$_GET[cod];

function elclientees($rut)
{
	require("../conectar.php");
	$sqleve = "SELECT nombre_cliente FROM cliente WHERE rut_cliente = '$rut'";
	$stateve = pg_exec($dbh,$sqleve);
	pg_close($dbh);
	$datoeve = pg_fetch_assoc($stateve);
	$tv = $datoeve[nombre_cliente];
	return $tv;
}



require("../conectar.php");

$sqlp = "SELECT * FROM proyecto WHERE cod_proyecto = $cod";
$statp = pg_exec($dbh,$sqlp);
pg_close($dbh);
$datosp = pg_fetch_assoc($statp);
$rut=$datosp[rut_cliente];
$proyecto=$datosp[nombre_proyecto];
$cliente=elclientees($rut);

require("../conectar.php");
$sql = "SELECT rut_cliente, nombre_cliente FROM cliente";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);

?>
<form  id="aif" name="aif" action="eproy3.php?cod=<?php echo $cod; ?>" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14">&nbsp;</td>
            <td width="135">&nbsp;</td>
            <td width="7">&nbsp;</td>
            <td width="206">&nbsp;</td>
            <td width="176">&nbsp;</td>
            <td width="14">&nbsp;</td>
            <td width="115">&nbsp;</td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoclientes.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Editar un Proyecto.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Cliente</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <select name="cliente" id="cliente">
              <option value="<?php echo $rut; ?>"><?php echo $cliente; ?></option>
<?php
			while ($datos = pg_fetch_assoc($stat))
			{
			if ($datos[rut_cliente]!=$rut) echo "<option value='".$datos[rut_cliente]."'>".$datos[nombre_cliente]."</option>";
			}
?>
              </select>
            </label></td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Nombre Proyecto</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="nombre" type="text" class="validate['required']" id="nombre" size="50" maxlength="60" <?php if($proyecto) echo "value='".$proyecto."'"; ?> />
            *</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          
          <tr>
            <td height="26">&nbsp;</td>
            <td valign="middle">&nbsp;</td>
            <td valign="middle">&nbsp;</td>
            <td colspan="4" valign="middle"><label class="obligatorio">* campos obligatorios</label></td>
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
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Editar" />
              </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  