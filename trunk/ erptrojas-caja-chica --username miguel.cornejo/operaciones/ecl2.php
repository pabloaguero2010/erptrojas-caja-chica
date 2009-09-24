<?php

$rut=$_GET[cod];
require("../conectar.php");
$sql = "SELECT * FROM cliente WHERE rut_cliente = '$rut'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);

$aux = pg_fetch_assoc($stat);
$nombre=$aux[nombre_cliente];
$giro=$aux[giro_cliente];
$direccion=$aux[direccion_cliente];
$fono1=$aux[telefono_cliente];
$fono2=$aux[telefono2_cliente];
$fono3=$aux[telefono3_cliente];
$mail=$aux[mail_cliente];
$web=$aux[web_cliente];


?>
<form  id="aif" name="aif" action="ecl3.php?cod=<?php echo $rut; ?>" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14">&nbsp;</td>
            <td width="114">&nbsp;</td>
            <td width="8">&nbsp;</td>
            <td width="226">&nbsp;</td>
            <td width="106">&nbsp;</td>
            <td width="6">&nbsp;</td>
            <td width="193">&nbsp;</td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconoclientes.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Editar un Cliente.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut </td>
            <td class="textoform">:</td>
            <td class="textoform"><?php echo $rut; ?></td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Nombre </td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="nombre" type="text" class="validate['required']" id="nombre" size="30" maxlength="30" <?php if($nombre) echo "value='".$nombre."'"; ?> />
            *</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Giro</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="giro" type="text" class="validate['required']" id="giro" size="30" maxlength="30" <?php if($giro) echo "value='".$giro."'"; ?> />
            *</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            
            <td class="textoform">Dirección</td>
            <td class="textoform">:</td>
            <td colspan="4" class="textoform"><label>
              <input name="direccion" type="text" class="validate['required']" id="direccion" size="50" maxlength="50" <?php if($direccion) echo "value='".$direccion."'"; ?>/>
            </label>              <label>*</label></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Teléfono</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="fono1" type="text" class="validate['phone']" id="fono1" size="16" maxlength="16" <?php if($fono1) echo "value='".$fono1."'"; ?>/>
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>Teléfono 2</label></td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="fono2" type="text" class="validate['phone']" id="fono2" size="16" maxlength="16" <?php if($fono2) echo "value='".$fono2."'"; ?>/>
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Teléfono 3</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="fono3" type="text" class="validate['phone']" id="fono3" size="16" maxlength="16" <?php if($fono3) echo "value='".$fono3."'"; ?> />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">E-Mail</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="mail" type="text" class="validate['email']" id="mail" size="40" maxlength="50" <?php if($mail) echo "value='".$mail."'"; ?> />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Sitio Web</td>
            <td class="textoform">:</td>
            <td colspan="4" class="textoform"><label>
              <input name="web" type="text" id="web" size="50" maxlength="60" class="validate['url']"  <?php if($web) echo "value='".$web."'"; ?> />
            </label></td>
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
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Actualizar" />
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  