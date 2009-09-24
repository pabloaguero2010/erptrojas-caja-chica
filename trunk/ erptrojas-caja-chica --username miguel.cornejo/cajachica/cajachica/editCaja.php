<?php

$cod=$_GET["cod"];

require("../conectar.php");
$sql = "SELECT *  FROM caja_chica WHERE id_caja='$cod'";
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
$proveedor=$aux["proveedor"];

if(isset($_GET[concepto]))
$concepto=$_GET[concepto];
else
$concepto=$aux["concepto"];

if(isset($_GET[dctos]))
$dctos=$_GET[dctos];
else
$dctos=$aux["dctos"];

if(isset($_GET[gtosgrles]))
$gtosgrles=$_GET[gtosgrles];
else
$gtosgrles=$aux["gtosgrles"];

if(isset($_GET[combust]))
$combust=$_GET[combust];
else
$combust=$aux["combust"];

if(isset($_GET[anticipos]))
$anticipos=$_GET[anticipos];
else
$anticipos=$aux["anticipos"];


if(isset($_GET[reintcomb]))
$reintcomb=$_GET[reintcomb];
else
$reintcomb=$aux["reintcomb"];

if(isset($_GET[reintcomb]))
$reintcomb=$_GET[reintcomb];
else
$reintcomb=$aux["reintcomb"];

if(isset($_GET[cheques]))
$cheques=$_GET[cheques];
else
$cheques=$aux["cheques"];

if(isset($_GET[otros]))
$otros=$_GET[otros];
else
$otros=$aux["otros"];

if(isset($_GET[saldo]))
$saldo=$_GET[saldo];
else
$saldo=$aux["saldo"];



?>
<form  id="aif" name="aif" action="editCaja3.php" method="post">
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

               <input class="validate['required']" type="text" name="proveedor" id="proveedor" <?php if($proveedor) echo "value='".$proveedor."'"; ?> />
            </label>
			
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
              <input class="validate['required']" type="text" name="concepto" id="concepto" <?php if($concepto) echo "value='".$concepto."'"; ?> />
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
              <input type="text" name="doctos" id="doctos" <?php if($dctos) echo "value='".$dctos."'"; ?> />
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
                <input class="validate['digit']" type="text" name="gastos" id="gastos" <?php if($gtosgrles) echo "value='".$gtosgrles."'"; ?> />
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
                <input name="anticipos" class="validate['digit']" type="text" id="anticipos"  maxlength="60" <?php if($anticipos) echo "value='".$anticipos."'"; ?> />
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
                <input class="validate['digit']" type="text" name="comb" id="comb" <?php if($combust) echo "value='".$combust."'"; ?> />
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
              <input class="validate['digit']" type="text" name="recomb" id="recomb" <?php if($reintcomb) echo "value='".$reintcomb."'"; ?> />			  </td>
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
                <input name="cheq" class="validate['digit']" type="text" id="cheq" maxlength="20" <?php if($cheques) echo "value='".$cheques."'"; ?> />
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
              <input name="otros" class="validate['digit']" type="text" id="otros" maxlength="20" <?php if($otros) echo "value='".$otros."'"; ?> />			  </td>
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