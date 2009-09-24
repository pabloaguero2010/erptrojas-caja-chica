<form  id="aif" name="aif" action="aco2.php" method="post">
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
                  <td width="401"><strong> Agregar Conductor</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut Conductor</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="rutprov">
            <input class="validate['required','length[7,8]','digit']" name="rut" type="text" id="rut" size="8" maxlength="8" <?php if($rut=$_GET["rut"]) echo "value=".$rut; ?> />
            -
            <label> 
            <input class="validate['required','alphanum']" name="crut" type="text" id="crut" size="1" maxlength="1" <?php if($crut=$_GET["crut"]) echo "value=".$crut; ?> onChange="datosconductor(); return false" />
            </label>
            </div></td>
            <td colspan="3" class="textoform"><label></label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6" class="textoform"><div id="datosprov"></div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha Vencimiento Licencia</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input class="ncalendar" name="calen" maxlength="20" id="calen" type="text" <?php if($fecha=$_GET["fecha"]) echo "value=".$fecha; else echo "value='click acá'"; ?> />
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