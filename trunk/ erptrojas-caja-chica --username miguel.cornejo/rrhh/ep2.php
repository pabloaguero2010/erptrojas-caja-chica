<?php

$cod=$_GET["cod"];

require("../conectar.php");
$sql = "SELECT *  FROM proveedor WHERE rut_proveedor='$cod'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$aux = pg_fetch_assoc($stat);

if(isset($_GET[rut]) or isset($_GET[crut]))
	{
	$rut=$_GET[rut];
	$crut=$_GET[crut];
	}
else
list($rut,$crut)=explode("-",$aux[rut_proveedor]);


if(isset($_GET[nombre]))
$nfactura=$_GET[nombre];
else
$nombre=$aux["nombre_proveedor"];

if(isset($_GET[giro]))
$giro=$_GET[giro];
else
$giro=$aux["giro_proveedor"];

if(isset($_GET[direccion]))
$direccion=$_GET[direccion];
else
$direccion=$aux["direccion_proveedor"];

if(isset($_GET[fono1]))
$fono1=$_GET[fono1];
else
$fono1=$aux["telefono_proveedor"];

if(isset($_GET[fono2]))
$fono2=$_GET[fono2];
else
$fono2=$aux["telefono2_proveedor"];

if(isset($_GET[fono3]))
$fono3=$_GET[fono3];
else
$fono3=$aux["telefono3_proveedor"];

if(isset($_GET["mail"])) 
$mail=$_GET["mail"];
else
$mail=$aux["mail_proveedor"];

if(isset($_GET[web])) 
$web=$_GET[web];
else
$web=$aux["web_proveedor"];


if(isset($_GET[descripcion]))
$descripcion=$_GET[descripcion];
else
$descripcion=$aux["descripcion_proveedor"];



?>




<form  id="aif" name="aif" action="ep3.php" method="post">
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
                  <td width="55" height="61"><div align="center"><img src="../images/iconoproveedors.png" width="45" height="52" /></div></td>
                  <td width="401"><strong>Ver/Actualizar Proveedores.</strong></td>
                </tr>
            </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut </td>
            <td class="textoform">:</td>
            <td class="textoform">
            <input class="validate['required','length[7,8]','digit']" name="rut" type="text" id="rut" size="8" maxlength="8" <?php if($rut) echo "value=".$rut; ?> />
            -
            <label> 
            <input class="validate['required','alphanum']" name="crut" type="text" id="crut" size="1" maxlength="1" <?php if($crut) echo "value=".$crut; ?> />
            </label>            </td>
            <td colspan="3" class="textoform"></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Nombre </td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="nombre" type="text" class="validate['required']" id="nombre" size="30" maxlength="30" <?php if($nombre) echo "value='".$nombre."'"; ?> />
            </label></td>
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
            </label></td>
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
            </label>              <label></label></td>
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
            <td height="30">&nbsp;</td>
            <td class="textoform">Descripción</td>
            <td class="textoform">:</td>
            <td colspan="4" class="textoform"><input name="descripcion" type="text" id="descripcion" size="50" maxlength="60" <?php if($descripcion) echo "value='".$descripcion."'"; ?> /></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="40">&nbsp;</td>
            <td valign="middle">
              
              <div align="right">
                <input name="atras" type="button" class="botonlogin" id="atras" value="Atras" onclick='gotoLink("rrhh.php?op=ep")' />
            </div>            </td>
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