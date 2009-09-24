
<script src="../validacion/livevalidation_standalone.js" type="text/javascript"></script>

<form  id="aif" name="aif" action="In_tesoreria2.php" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15">&nbsp;</td>
            <td width="167">&nbsp;</td>
            <td width="10">&nbsp;</td>
            <td width="174">&nbsp;</td>
            <td width="107">&nbsp;</td>
            <td width="7">&nbsp;</td>
            <td width="194">&nbsp;</td>
            <td width="15">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconofacturass.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ingreso de fondos a caja chica </strong></td>
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
            <td colspan="6" class="textoform"><div id="datosprov"></div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha</td>
            <td class="textoform">:</td>
            <td class="textoform"><label><strong><? echo " ".date("j/n/Y")?></strong></label></td>
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
              <input name="concepto" type="text" class="validate['required']" id="concepto" value="ingreso de fondos desde tesoreria" size="35" />
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
            <td class="textoform"><label>$
                <input class="validate['digit']" type="text" name="ingreso" id="ingreso" />
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
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  