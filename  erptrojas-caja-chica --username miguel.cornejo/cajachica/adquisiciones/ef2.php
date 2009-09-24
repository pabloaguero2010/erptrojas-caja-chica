<?php

$cod=$_GET["cod"];

require("../conectar.php");
$sql = "SELECT *  FROM facturas_compra WHERE cod_factura_compra='$cod'";
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

if(isset($_GET[fecha]))
$fecha=$_GET[fecha];
else 
	{
	$fecha=$aux["fecha_factura_compra"];
	list($anio,$mes,$dia)=explode("-",$fecha);
	if(is_numeric($dia) and is_numeric($mes) and is_numeric($anio))
		{
		$fecha=$dia."/".$mes."/".$anio;
		}
	}	


if(isset($_GET[nfactura]))
$nfactura=$_GET[nfactura];
else
$nfactura=$aux["n_factura_compra"];

if(isset($_GET[neto]))
$neto=$_GET[neto];
else
$neto=$aux["neto_factura_compra"];

if(isset($_GET[iva]))
$iva=$_GET[iva];
else
$iva=$aux["iva_factura_compra"];

if(isset($_GET[total]))
$total=$_GET[total];
else
$total=$aux["total_factura_compra"];

if(isset($_GET[descripcion]))
$descripcion=$_GET[descripcion];
else
$descripcion=$aux["descripcion_factura_compra"];

if(isset($_GET[gd]))
$gd=$_GET[gd];
else
$gd=$aux["ngd_factura_compra"];

if(isset($_GET[oc]))
$oc=$_GET[oc];
else
$oc=$aux["noc_factura_compra"];

if(isset($_GET[cdv]))
$cdv=$_GET[cdv];
else
$cdv=$aux["cdv_factura_compra"];

if(isset($_GET[entregado]))
$entregado=$_GET[entregado];
else
$entregado=$aux["entregado_factura_compra"];

if(isset($_GET[pagado]))
$pagado=$_GET[pagado];
else
$pagado=$aux["pagado_factura_compra"];





?>
<form  id="aif" name="aif" action="ef3.php?cod=<?php echo $cod; ?>" method="post">
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
                  <td width="401"><strong>Ver/Editar Facturas de Compra.</strong></td>
                </tr>
              </table>            </td>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform">Rut Proveedor</td>
            <td class="textoform">:</td>
            <td class="textoform"><div id="rutprov">
            <input class="validate['required','length[7,8]','digit']" name="rut" type="text" id="rut" size="8" maxlength="8" <?php if($rut) echo "value=".$rut; ?> />
            -
            <label> 
            <input class="validate['required','alphanum']" name="crut" type="text" id="crut" size="1" maxlength="1" <?php if($crut) echo "value=".$crut; ?> onChange="datosproveedor(); return false" />
            </label>
            </div></td>
            <td colspan="3" class="textoform"> <label class="botonlogin">&nbsp; agregar nuevo proveedor &nbsp; </label></td>
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
              <input class="ncalendar" name="calen" maxlength="20" id="calen" type="text" <?php if($fecha) echo "value=".$fecha; else echo "value='click acá'"; ?> />
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
              <input class="validate['required','digit']" type="text" name="nfactura" id="nfactura" <?php if($nfactura) echo "value=".$nfactura; ?> />
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
              <input class="validate['required','digit']" type="text" name="neto" id="neto" <?php if($neto) echo "value=".$neto; ?> onChange="calcularconneto(); return false"/>
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
              <input class="validate['required','digit']" type="text" name="iva" id="iva" <?php if($iva) echo "value=".$iva; ?> onChange="calcularconiva(); return false"/>
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
              <input class="validate['required','digit']" type="text" name="total" id="total" <?php if($total) echo "value=".$total; ?> onChange="calcularcontotal(); return false"/>
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
              <input name="descripcion" type="text" id="descripcion" size="45" maxlength="60" <?php if($descripcion) echo "value='".$descripcion."'"; ?> />
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
              <input class="validate['digit']" type="text" name="gd" id="gd" <?php if($gd) echo "value=".$gd; ?> />
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
            <td class="textoform"><input class="validate['digit']" type="text" name="oc" id="oc" <?php if($oc) echo "value=".$oc; ?> /></td>
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
              <input name="cdv" type="text" id="cdv" maxlength="20" <?php if($cdv) echo "value='".$cdv."'"; ?> />
            </label></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
            <td class="textoform"><label>
              <input name="entregado" type="checkbox" id="entregado" <?php if($entregado=="on") echo "checked='checked'"; ?> />
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
              <input type="checkbox" name="pagado" id="pagado" <?php if($pagado=="on") echo "checked='checked'"; ?> />
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
              <div align="right">
                <input name="atras" type="button" class="botonlogin" id="atras" value="Atras" onclick='gotoLink("adquisiciones.php?op=ef")' />
              </div></td>
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