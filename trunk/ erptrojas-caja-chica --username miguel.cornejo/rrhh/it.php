<form  id="aif" name="aif" action="it2.php" method="post">
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
                  <td width="401"><strong> Ingresar Trabajador.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut Trabajador</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="rutprov">
            <input class="validate['required','length[7,8]','digit']" name="rut" type="text" id="rut" size="8" maxlength="8" <?php if($rut=$_GET["rut"]) echo "value=".$rut; ?> />
            -
            <label> 
            <input class="validate['required','alphanum']" name="crut" type="text" id="crut" size="1" maxlength="1" <?php if($crut=$_GET["crut"]) echo "value=".$crut; ?> onChange="datosproveedor(); return false" />
            </label>
            </div></td>
            <td colspan="3" class="textoform"><label></label></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td colspan="6" class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Nombre</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="nombret">
            
              <input class="validate['required','alphanum']" name="nombre" type="text" id="nombre" size="45" maxlength="60" <?php if($nombres=$_GET["nombres"]) echo "value=".$nombres; ?> />
            
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Apellido Paterno</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="appat">
              <input class="validate['required','alphanum']" name="apellido paterno" type="text" id="apellido1" size="45" maxlength="60" <?php if($apellido1=$_GET["apellido1"]) echo "value=".$apellido1; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Apellido Materno</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="apmat">
              <input class="validate['required','alphanum']" name="apellido materno" type="text" id="apellido2" size="45" maxlength="60" <?php if($apellido2=$_GET["apellido2"]) echo "value=".$apellido2; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha Nacimiento</td>
            <td class="textoform">:</td> 
            <td class="textoform"><div id="fecnac">
            <input class="ncalendar" name="calen2" maxlength="20" id="calen2" type="text" <?php if($fechanaci=$_GET["fechanaci"]) echo "value=".$fechanaci; else echo "value='click acá'"; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Dirección Particular</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="direcc">
              <input class="validate['required','alphanum']" name="direccion" type="text" id="direccion" maxlength="60" <?php if($direccion=$_GET["direccion"]) echo "value=".$direccion; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Telefono Particular</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="fono">
              <input class="validate['phone']" name="telefono" type="text" id="telefono" maxlength="7" <?php if($fono1=$_GET["fono1"]) echo "value=".$fono1; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Correo Electronico</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="mail">
              <input class="validate['email']" name="correo" type="text" id="correo" size="45" maxlength="60" <?php if($correo=$_GET["correo"]) echo "value=".$correo; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Departamento</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="depto">
              <input class="validate['required','alphanum']" name="departamento" type="text" id="departamento" size="45" maxlength="60" <?php if($departamento=$_GET["departamento"]) echo "value=".$departamento; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Anexo</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="anex">
              <input class="validate['required','phone']" name="anexo" type="text" id="anexo" maxlength="7" <?php if($anexo=$_GET["anexo"]) echo "value=".$anexo; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label></label>
              Contrato</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><div id="contrat">
              <input type="radio" name="contrato" value="definido" id="tipo_contrato_0" <?php if($contrato=$_GET["contrato"]) echo "value=".$contrato; ?>/>
              Definido<input type="radio" name="contrato" value="indefinido" id="tipo_contrato_1" <?php if($contrato=$_GET["contrato"]) echo "value=".$contrato; ?>/>
              Indefinido
        
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha de Ingreso</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="fecing">
            <input class="ncalendar" name="calen3" maxlength="20" id="calen3" type="text" <?php if($fechaing=$_GET["fechaing"]) echo "value=".$fechaing; else echo "value='click acá'"; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Fecha de Termino</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="fecter">
            <input class="ncalendar" name="calen4" maxlength="20" id="calen4" type="text" <?php if($fechatermino=$_GET["fechatermino"]) echo "value=".$fechatermino; else echo "value='click acá'"; ?> />
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Tipo </td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="tip">
            <select class="validate['required','select']" name="tipo" id="tipo" <?php if($dias=$_GET["dias"]) echo "value=".$dias; ?> >
              <option>SELECCIONAR</option>
              <option value="corridos">DIAS CORRIDOS</option>
              <option value="habiles">DIAS HABILES</option>
            </select>
            </div></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Jornada</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="jornad">
            <select class="validate['required','select']" name="jornada" id="jornada" <?php if($horas=$_GET["horas"]) echo "value=".$horas; ?>>
              <option>SELECCIONAR</option>
              <option value="11">11 horas</option>
              <option value="17">17 horas</option>
              <option value="22">22 horas</option>
              <option value="28">28 horas</option>
              <option value="33">33 horas</option>
              <option value="44">44 horas</option>
              <option value="45">45 horas</option>
              <option value="turnos">Turnos</option>
              <option value="24">24 </option>
            </select>
            </div></td>
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
