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
            <td width="58"><img src="../images/balanceca6.png" width="45" height="52" /></td>
            <td width="4">&nbsp;</td>
			 <form name="formulario" method="post" action="tesoreria.php">
            <td width="314">Tipo de informe
              <select name="informe" id="informe" accesskey="i">
                <option value="I"> Ingresos</option>
                <option value="R"> Rendicion</option>
              </select></td>
            <td width="105">&nbsp;</td>
           	
            <td width="192"><label></label></td>
            
                        
          
          
          <tr>
            <td height="19">&nbsp;</td>
            
            <td class="textoform"><?php
			require("../conectar.php");
			
			$meses = array("Seleccione Mes","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

//Ver de donde saco el saldo anterior
if($_POST[flag]!='2'){

$mesa=(date('n'))-1;
$mes_actual=$meses[date('n')];
$mes_sel=date('n');
$ano=date('Y');
}
else
{
$mesa=($_POST[mes])-1;
$mes_actual=$meses[$_POST[mes]];
$mes_sel=$_POST[mes];
$ano=$_POST[ano];
}


// si es enero
if ($mesa==0)
	$mesa=12;
			

$i=0;
echo"<select  name=mes id=mes>"; 

while ($i<=12)
{
echo "<option value=".$i.">".$meses[$i]."</option>\n";
$i++;
}
echo "</select>"; 
?></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><?php
			
			
			$ssql2 =  "select distinct on (date_part('Year',fecha)) date_part('Year',fecha) as ano from rendicion_tesoreria;";

			$sstat3 = pg_exec($dbh,$ssql2);
			
			
			echo"<select  name=ano id=ano>"; 
		 			  
			  while($aux = pg_fetch_assoc($sstat3))
			  {
				echo "<option value='".$aux[ano]."'>".$aux[ano]."</option>\n";
			  }
		echo "</select>"; 
		?>
            <input name="enviar" type="submit" class="letras" id="form_mes" value="Mostrar"  /></td>
            <td class="textoform">&nbsp;</td>
            <td class="textoform"><input type="hidden" name="flag" value="2" />
              <input type="hidden" name="flag2" value="1" /></td>
            </form>   
          </tr>
          
          <tr>
            <td height="40">&nbsp;</td>
            <td colspan="6" nowrap="nowrap" class="textoform">
			<?php if($_POST[flag]=='2'){
	
	include("informes_IR2.php");
	

 }?></td>
          </tr>
        </table>
        
       
        
