<?php
$usuario=$_SESSION[username];
require("../conectar.php");
$sql = "SELECT personal.nombres, personal.apellido1, personal.apellido2 FROM usuario INNER JOIN personal ON usuario.rut_personal=personal.rut_personal WHERE usuario.nombre_usuario = '$usuario'";
$stat = pg_exec($dbh,$sql);
$datos = pg_fetch_assoc($stat);
$rows = pg_numrows($stat);
		if ($rows==0)
		{
			
			$nombreusuario= "";
		}
		else
		{
		    $nombreusuario= "Sr(a) ".$datos[nombres]." ".$datos[apellido1]." ".$datos[apellido2];
		}
pg_close($dbh);



?>


<form  id="sic" name="sic" action="" method="post">
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13">&nbsp;</td>
            <td width="169">&nbsp;</td>
            <td width="12">&nbsp;</td>
            <td width="200">&nbsp;</td>
            <td width="75">&nbsp;</td>
            <td width="11">&nbsp;</td>
            <td width="186">&nbsp;</td>
            <td width="21">&nbsp;</td>
          </tr>
          <tr>
            <td height="35">&nbsp;</td>
            <td colspan="6"><strong> </strong>
              <table width="456" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="55" height="61"><div align="center"><img src="../images/iconofacturass.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Ingresar Factura de Compra.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Proveedor</td>
            <td class="textoform">:</td>
            <td class="textoform">
            	
				<div id="demoDer">
					<input type="text" id="input_2" class="input"
					onfocus="if(document.getElementById('lista').childNodes[0]!=null && this.value!='') { filtraLista(this.value); formateaLista(this.value); 
						reiniciaSeleccion(); document.getElementById('lista').style.display='block'; }" 
					onblur="if(v==1) document.getElementById('lista').style.display='none';" 
					onkeyup="if(navegaTeclado(event)==1) {
						clearTimeout(ultimoIdentificador); 
						ultimoIdentificador=setTimeout('rellenaLista()', 1000); }">
					<div id="lista" onmouseout="v=1;" onmouseover="v=0;"></div>
				</div>
				<div class="mensaje" id="error"></div>            </td>
            <td colspan="3" class="textoform"> <label class="botonlogin">&nbsp; agregar nuevo proveedor &nbsp; </label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut :</td>
            <td class="textoform">&nbsp;</td>
            <td colspan="3" class="textoform">Dirección :</td>
            <td class="textoform">Giro : </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input class="ncalendar" name="calen" maxlength="20" id="calen" type="text" value="Seleccione una fecha" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">N° Factura</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="nfactura" id="nfactura" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Valor Neto</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="neto" id="neto" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label></td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">I.V.A</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="iva" id="iva" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>Total</label></td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="total" id="total" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Descripción</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="descripcion" type="text" id="descripcion" size="45" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">N° Guía de Despacho</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="gd" id="gd" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">N° Orden de Compra</td>
            <td class="textoform">:</td>
            <td class="textoform"><input type="text" name="oc" id="oc" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Cond. de Venta</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="cdv" id="cdv" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>
              <input type="checkbox" name="entregado" id="entregado" />
            </label>
              Entregado</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>
              <input type="checkbox" name="pagado" id="pagado" />
            Pagado</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label></td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="40">&nbsp;</td>
            <td valign="middle">
              <div align="center">
                <input name="limpiar" type="reset" class="botonlogin" id="limpiar" value="Limpiar" />
              </div>            </td>
            <td valign="middle"><div align="center"></div></td>
            <td valign="middle">
              <div align="center">
                <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Ingresar" />
            </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  