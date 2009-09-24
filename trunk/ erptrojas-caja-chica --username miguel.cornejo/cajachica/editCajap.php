<style type="text/css">
<!--
.Estilo1 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
        <table width="687" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="14" height="47">&nbsp;</td>
            <td width="55"><img src="../images/iconofacturass.png" width="45" height="52" /></td>
            <td width="4">&nbsp;</td>
            <td width="217"><span class="Estilo1">Seleccione el  proveedor</span></td>
            <td width="9"><strong>:</strong></td>
            <td width="340"><form name="formulario" method="post" action="cajachica.php">
             
			<?php
			require("../conectar.php");
			
			$ssql =  "select distinct on (proveedor) proveedor from caja_chica;";

			$sstat2 = pg_exec($dbh,$ssql);
			
			
			echo"<select name=proveedor id=proveedor class='textoform' >"; 
		 			  
			  while($aux = pg_fetch_assoc($sstat2))
			  {
				echo "<option value='".$aux[proveedor]."'>".$aux[proveedor]."</option>\n";
			  }
		echo "</select>"; 
		?>
			  
			  
			  
              <input name="enviar" type="submit" id="form_mes" value="Mostrar" class="botonlogin" />
              <input type="hidden" name="flag" value="2" />
            </form></td>
            <td width="32">	</td>
            <td width="16">&nbsp;</td>
          </tr>
          
          <tr>
            <td height="19">&nbsp;</td>
            
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
            <td colspan="6" class="textoform">
			<?php if($_POST[flag]=='2'){
	
	include("editCajap2.php");
	

 }?></td>
            <td>&nbsp;</td>
          </tr>
        </table>
        
       
        
