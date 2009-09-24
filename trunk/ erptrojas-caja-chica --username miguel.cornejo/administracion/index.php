<?php
$error = $_GET[msj];
if ($error == "error1")
	{
	$mensaje="nombre de usuario y/o contraseña incorrecta";
	}
elseif ($error == "error2")
	{
	$mensaje="el usuario ingresado no pertenece a este módulo";
	}
else
	{
	$mensaje="";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ERP - Transportes Rojas</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="../mootools/core.js"></script> 
<script type="text/javascript" src="../mootools/more.js"></script>
<script type="text/javascript" src="../formcheck/lang/es.js"> </script>
<script type="text/javascript" src="../formcheck/formcheck.js"> </script>
<link rel="stylesheet" href="../formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />
<script type="text/javascript">
    window.addEvent('domready', function(){
        new FormCheck('login');
    });
</script>


<link rel="stylesheet" href="../trojas.css" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>


<form  id="login" action="login.php" method="post">
  <table width="955" height="450" border="0" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td height="39" colspan="2"><img src="../images/titulo administracion.png" width="955" height="39" /></td>
     </tr>
     <tr valign="top">
      <td width="477" height="100%" background="../images/bglogin.png">
      	<table width="477" height="100%" border="0" cellpadding="0" cellspacing="0">
       	 <tr>
         	<td width="189" height="35%">&nbsp;</td>
         	<td width="261">&nbsp;</td>
         	<td width="9">&nbsp;</td>
         	<td width="18">&nbsp;</td>
        	</tr>
         <tr>
         	<td height="10%">&nbsp;</td>
          	<td><div align="right" class="textologin">nombre de usuario</div></td>
          	<td>&nbsp;</td>
          	<td><div align="left" class="textologin">:</div></td>
         </tr>
         <tr>
          	<td height="10%">&nbsp;</td>
          	<td><div align="right" class="textologin">contraseña</div></td>
          	<td>&nbsp;</td>
          	<td><div align="left" class="textologin">:</div></td>
         </tr>
         <tr>
         	<td height="45%">&nbsp;</td>
          	<td>&nbsp;</td>
          	<td>&nbsp;</td>
          	<td>&nbsp;</td>
         </tr>
      	</table>
       </td>
      <td width="478" bgcolor="#FFFFFF">
        
      <table width="478" height="100%" border="0" cellpadding="0" cellspacing="0">
       	 <tr>
         	<td width="10" height="35%">&nbsp;</td>
         	<td width="207">&nbsp;</td>
         	<td width="202">&nbsp;</td>
         	<td width="59">&nbsp;</td>
        	</tr>
         <tr>
         	<td height="10%">&nbsp;</td>
          	<td><label>
          	  <input class="validate['required']" name="usuario" type="text" id="usuario" />
          	</label></td>
          	<td>&nbsp;</td>
          	<td></td>
         </tr>
         <tr>
          	<td height="10%">&nbsp;</td>
          	<td><label>
          	  <input class="validate['required']" name="pass" type="password" id="pass" />
          	</label></td>
          	<td>&nbsp;</td>
          	<td></td>
         </tr>
         <tr>
         	<td height="45%">&nbsp;</td>
          	<td colspan="2" valign="top"><label>
          	  <input name="login" type="submit" class="botonlogin" id="login" value="login" />
          	  <br />
          	  <br />
          	  <span class="msjerror"><?php echo $mensaje; ?></span></label></td>
          	<td>&nbsp;</td>
         </tr>
      	</table>
      
      </td>
     </tr>
       
  </table>
  
  </form>
<?php
	include("footer.php");
?>
</body>
</html>

