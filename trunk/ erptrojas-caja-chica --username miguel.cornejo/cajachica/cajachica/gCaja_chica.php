
<script src="../validacion/livevalidation_standalone.js" type="text/javascript"></script>

<form  id="aif" name="aif" action="gCaja_chica2.php" method="post">
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
                  <td width="401"><strong> Ingresos / Egresos Caja Chica. </strong></td>
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
            <td class="textoform"><label><strong><?php echo " ".date("j/n/Y")?></strong></label></td>
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
               <input class="validate['required']" type="text" name="proveedor" id="proveedor" />
            </label> <span id="spinner" style="display: none"> <img src="ajax.gif" alt="Consultando…" /> </span>
                      <div id="lista_opciones" class="autorelleno"> </div>
                      <script>
new Ajax.Autocompleter("proveedor", "lista_opciones", "lista2.php", {method: "post", paramName: "proveedor", minChars: 1, indicator: "spinner"});
                  </script>  
			</td>
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
              <input class="validate['required']" type="text" name="concepto" id="concepto" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Documentos</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="doctos" id="doctos" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>Gastos Generales </label></td>
            <td class="textoform">:</td>
            <td class="textoform"><label>$
                <input class="validate['digit']" type="text" name="gastos" id="gastos" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Gastos Trabajador</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>$
                <input name="anticipos" class="validate['digit']" type="text" id="anticipos"  maxlength="60" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Combustible</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>$
                <input class="validate['digit']" type="text" name="comb" id="comb" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Reint. Comb.</td>
            <td class="textoform">:</td>
            <td class="textoform">$
              <input class="validate['digit']" type="text" name="recomb" id="recomb" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Cheques</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>$
                <input name="cheq" class="validate['digit']" type="text" id="cheq" maxlength="20" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>Otros ingresos </label></td>
            <td class="textoform">:</td>
            <td class="textoform">$
              <input name="otros" class="validate['digit']" type="text" id="otros" maxlength="20" /></td>
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
                </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  