<?php

$cod=$_GET["cod"];

require("../conectar.php");
$sql = "SELECT *  FROM rendicion_tesoreria WHERE cod='$cod'";
$stat = pg_exec($dbh,$sql);
pg_close($dbh);
$aux = pg_fetch_assoc($stat);




if(isset($_GET[fecha]))
$fecha=$_GET[fecha];
else
$fecha=$aux["fecha"];

if(isset($_GET[proveedor]))
$proveedor=$_GET[proveedor];
else
$proveedor=$aux["responsable"];

if(isset($_GET[concepto]))
$concepto=$_GET[concepto];
else
$concepto=$aux["concepto"];


if(isset($_GET[total]))
$saldo=$_GET[total];
else
$total=$aux["total"];



?>
<form  id="aif" name="aif" action="edit_IR3.php" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14">&nbsp;</td>
            <td width="166">&nbsp;</td>
            <td width="9">&nbsp;</td>
            <td width="224">&nbsp;</td>
            <td width="55">&nbsp;</td>
            <td width="6">&nbsp;</td>
            <td width="193">&nbsp;</td>
            <td width="20">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconofacturass.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ingresos / Egresos Caja Chica. </strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6" class="textoform"><div id="datosprov"></div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
            <input class="ncalendar" name="calen" maxlength="20" id="calen" type="text" <?php if($fecha) echo "value=".$fecha; else echo "value='click ac&aacute;'"; ?> />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Proveedor</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>

               <input name="proveedor" type="text" class="validate['required']" id="proveedor" size="35" <?php if($proveedor) echo "value='".$proveedor."'"; ?> />
            </label>			</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            
            <td class="textoform">Concepto</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="concepto" type="text" class="validate['required']" id="concepto" size="35" <?php if($concepto) echo "value='".$concepto."'"; ?> />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>Total</label></td>
            <td class="textoform">:</td>
            <td class="textoform">$
              <input name="total" class="validate['digit']" type="text" id="total" maxlength="20" <?php if($total) echo "value='".$total."'"; ?> />			  </td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
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
                <input name="limpiar" type="reset" class="botonlogin" id="limpiar" value="Limpiar" />
              </div></td>
            <td valign="middle"><div align="center"></div></td>
            <td valign="middle">              
              <div align="left">
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Ingresar" />
				 <input type="hidden" name="flag" <?php  echo "value='".$cod."'"; ?> />
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  