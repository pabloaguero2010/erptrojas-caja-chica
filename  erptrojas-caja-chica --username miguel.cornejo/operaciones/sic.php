<?php


/*$usuario=$_SESSION[username];
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
*/


?>


<form  id="aif" name="aif" action="operaciones.php?op=sic2" method="post">
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
                  <td width="55" height="61"><div align="center"><img src="../images/iconoservicioss.png" width="45" height="52" /></div></td>
                  <td width="401"><strong> Prestación de Servicios con Estado de Pago.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><span class="textoform">Cliente</span></td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
            <select name="cliente" class="textoform" id="cliente">
            <?php
			  
			require("../conectar.php");
			$sql = "SELECT rut_cliente, nombre_cliente FROM cliente order by nombre_cliente ASC";
			$stat = pg_exec($dbh,$sql);
			pg_close($dbh);
			while ($datos = pg_fetch_assoc($stat))
			{
            echo "<option value='".$datos[rut_cliente]."'>".$datos[nombre_cliente]."</option>";
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
            <td class="textoform">Tipo Vehículo</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <select name="tvehiculo" class="textoform" id="tvehiculo">
              <?php
			  
			require("../conectar.php");
			$sql = "SELECT cod_tipo_vehiculo, tipo_vehiculo FROM tipo_vehiculo order by tipo_vehiculo ASC";
			$stat = pg_exec($dbh,$sql);
			pg_close($dbh);
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
            <td class="textoform">Ruta:</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <select name="ruta" class="textoform" id="ruta">
             <?php
			  
			require("../conectar.php");
			$sql = "SELECT cod_ruta, origen, destino FROM ruta order by origen ASC";
			$stat = pg_exec($dbh,$sql);
			pg_close($dbh);
			while ($datos = pg_fetch_assoc($stat))
			{
            echo "<option value='".$datos[cod_ruta]."'>".$datos[origen]." - ".$datos[destino]."</option>";
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
            <td class="textoform"><label>
              <input name="radio" type="radio" id="normal" value="normal" checked="checked" />
            </label>
              Normal</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label>
              <input type="radio" name="radio" id="urgente" value="urgente" />
            Urgente</label></td>
            <td colspan="3" class="textoform"><label>
              <input type="radio" name="radio" id="Retorno" value="Retorno" />
            Retorno</label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="3" class="textoform">Opciones Adicionales:</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="3" class="textoform"><label>
              <input type="checkbox" name="sd" id="sd" />
            </label>
              Sobredimensionado
              <label></label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="3" class="textoform"><label>
              <input type="checkbox" name="sp" id="sp" />
            Sobrepeso</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="2" class="textoform"><label>
              <input type="checkbox" name="escolta" id="escolta" />
            </label>
              Escolta</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="2" class="textoform"><label>
              <input type="checkbox" name="desmovilizacion" id="desmovilizacion" />
            </label>
              Desmovilización</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>
              <input type="checkbox" name="se" id="se" />
            Sobreestadía</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label>
              <input name="dias" type="text" id="dias" class="validate['required','digit']" value="1" size="3" />
            días</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>
              <input name="checkall" type="checkbox" id="checkall" value="checkall" onclick="checkAll();" />
            </label>
              Todos</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><label></label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Proveedor</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input type="text" name="proveedor" class="validate['required','alphanum']" id="proveedor" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="55">&nbsp;</td>
            <td class="textoform">Descripción de la Mercancía</td>
            <td class="textoform">:</td>
            <td colspan="2" class="textoform"><label>
              <input name="descripcion" class="validate['required','alphanum']" type="text" id="descripcion" size="45" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">N° OT</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="ot" id="ot" class="validate['required','digit']" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">N° Guía de Despacho</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="guiadespacho" id="guiadespacho" class="validate['required','digit']" />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">N° O/C</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input type="text" name="oc" id="oc" class="validate['digit']" />
            </label></td>
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
            <td valign="middle"><div align="left">
              <input name="ingresar" type="submit" class="botonlogin" id="ingresar" value="Siguiente" />
            </div></td>
            <td colspan="3" valign="middle">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
</form>  
