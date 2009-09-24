<?php




?>



        <table width="687" border="0" cellspacing="0" cellpadding="0">
        <form  id="aif" name="aif" action="atarifa.php" method="post">
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
                  <td width="401"><strong> Tarifas.</strong></td>
                </tr>
              </table>            </td>
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
            *
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
            *</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Normal</td>
            <td class="textoform">:</td>
            <td class="textoform"><label>
              <input name="normal" class="validate['required']" type="text" id="normal" size="10" />
            *</label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Urgente</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="urgente" type="text" id="urgente" size="10" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Retorno</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="retorno" type="text" id="retorno" size="10" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><strong>Valores Agregados</strong></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Sobredimensionado
            <label></label></td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="sobredimen" type="text" id="sobredimen" size="10" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Sobrepeso</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="sobrepeso" type="text" id="sobrepeso" size="10" /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Escolta</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="escolta" type="text" id="escolta" size="10" /></td>
            <td class="textoform">&nbsp;</td>
            <td colspan="2" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Desmovilización</td>
            <td class="textoform">:</td>
            <td class="textoform"><input name="desmov" type="text" id="desmov" size="10" /></td>
            <td class="textoform">&nbsp;</td>
            <td colspan="2" class="textoform"><input type="submit" name="Ingresar2" id="Ingresar2" value="Ingresar" class="botonlogin"  /></td>
            <td>&nbsp;</td>
          </tr>
          
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><strong>Sobreestadia</strong></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          </form>  
          <form  id="sic" name="sic2" action="ase.php" method="post">
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6" class="textoform">
              
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="35%"><select name="tvehiculo2" class="textoform" id="tvehiculo2">
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
    <label></label></td>
    <td width="17%"><label></label>      
      valor por día:</td>
    <td width="18%"><label>
      <input name="sobreestadia" type="text" id="sobreestadia" size="10" />
    *</label></td>
    <td width="30%"><input type="submit" name="Ingresar" id="Ingresar" value="Ingresar" class="botonlogin" /></td>
  </tr>
</table></td>
            <td>&nbsp;</td>
          </tr>
                    <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6"><label class="obligatorio">* campos obligatorios.</label>
            </td>
            <td>&nbsp;</td>
          </tr>
          </form>  
        </table>
