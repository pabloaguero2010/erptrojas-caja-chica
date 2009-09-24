<?php
session_start();
if ($_SESSION[perfil]=="c"){


$menu=$_GET["op"];

//construccion del warning para los diferentes archivos php de los include 

	
//Warning generales
if ($valnt=$_GET["bd"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ocurrió un error con la base de datos, intente nuevamente";
	}
if ($valnt=$_GET["ok"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Se ingresaron/actualizaron los datos correctamente";
	}
if ($valnt=$_GET["ok"]==2)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Se eliminaron los datos correctamente";
	}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ERP - Transportes Rojas</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- libreria mootools + validar formulario -->
<script type="text/javascript" src="../mootools/core.js"></script> 
<script type="text/javascript" src="../mootools/more.js"></script>
<script type="text/javascript" src="../formcheck/lang/es.js"> </script>
<script type="text/javascript" src="../formcheck/formcheck.js"> </script>
<link rel="stylesheet" href="../formcheck/theme/classic/formcheck.css" type="text/css" media="screen" />
<script type="text/javascript">
    window.addEvent('domready', function(){
        new FormCheck('aif');
    });
</script>


<!-- libreria jquery + tablas ordenadas + + estilo tablas -->
<script type="text/javascript" src="../tablesorter/js/jquery-latest.js"></script>
<script type="text/javascript" src="../tablesorter/js/jquery.tablesorter.js"></script>

	
	<script language="javascript">
	jQuery.noConflict();
	jQuery(document).ready(function() 
	    { 
	        jQuery("#tablasort").tablesorter(); 
	    } 
	); 
	</script>
    
<link rel="stylesheet" href="../tablesorter/tablas.css" type="text/css" media="screen" />


<!-- libreria para calendario -->
<link href="../calendario/calendario.css" rel="stylesheet" type ="text/css" media="screen" />
<script src="../calendario/calendario.js" type="text/javascript"></script>

<!-- css de módulo de adquisiciones -->
<link rel="stylesheet" href="administracion.css" type="text/css" />

<!-- librerias para menu -->
<link rel="stylesheet" href="../MenuMatic/examples/vertical/css/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
<!--[if lt IE 7]>
			<link rel="stylesheet" href="css/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
		<![endif]-->
        	<!-- Load the Mootools Framework -->
	<!-- <script src="js/mootools.js" type="text/javascript" charset="utf-8"></script>	 -->
	
	<!-- Load the MenuMatic Class -->
	<script src="../MenuMatic/examples/vertical/js/MenuMatic_0.68.3.js" type="text/javascript" charset="utf-8"></script>
	
	<!-- Create a MenuMatic Instance -->
	<script type="text/javascript" >
		window.addEvent('domready', function() {			
			var myMenu = new MenuMatic({ orientation:'vertical' });			
		});		
	</script>


<!-- funcion marcar todos los checkbox -->
<!-- 
<script language="JavaScript"> 
function checkAll() {
	var nodoCheck = document.getElementsByTagName("input");
	var varCheck = document.getElementById("checkall").checked;
	for (i=0; i<nodoCheck.length; i++){
		if (nodoCheck[i].type == "checkbox" && nodoCheck[i].name != "checkall" && nodoCheck[i].disabled == false) {
			nodoCheck[i].checked = varCheck;
		}
	}
}
</script>
-->


<!-- Autocompletar -->

<link rel="stylesheet" type="text/css" href="autocompletar.css">
<script type="text/javascript" src="autocompletar.js"></script>


<!-- libreria trojas -->

<script type="text/javascript" src="../trojas.js"></script>


</head>
<body onload="asignaVariables();">
<?php
include("header.php");
?>



  <table width="955" height="450" border="0" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td height="39" colspan="2"><img src="../images/titulo administracion.png" width="955" height="39" /></td>
     </tr>
     <tr valign="top">
      <td width="268" height="100%" background="../images/bglogin.png" align="center"><p><br />
          <span class="MP">Menú Principal        </span></p>
        <div id="container" >
   		    
		<!-- BEGIN Menu -->
	    <ul id="nav">

			<li><a href="#">Opción 1</a>
					<ul>
						<li><a href="#">Subopción 1.1</a>
						</li>
						<li><a href="#">Subopción 1.2</a>
						</li>
					</ul>
			</li>
		    <li><a href="#">Opción 2</a>
                <ul>
                  <li><a href="#">Subopción 2.1</a>
                      <ul>
                  		<li><a href="#">Subopción 2.1.1</a></li>
                  		<li><a href="#">Subopción 2.1.2</a></li>
                      </ul>
                  </li>
                  <li><a href="#">etc</a></li>
                </ul>
	      </li>
          
          <li><a href="logout.php">Cerrar Sesión</a>
          </li>
	    </ul>
	
		<!-- END Menu -->
      </div>  
      
      
      </td>
      <td width="687" bgcolor="#FFFFFF"> <div id="advertencia" class="msjerror" align="center"> <?php echo $warning; ?> </div>
        <p>
          <?php
		  
		  //includes
		  if ($menu=="archivo")
		  	{
			include("archivo.php");
			}
		  
		  else
		  	{  
			include("homeadministracion.php");
			}
		?></p>
              
        <p>&nbsp;</p></td>
     </tr>
       
  </table>
  
  
<?php
	include("footer.php");
?>
</body>
</html>

<?php
}
else
{
header("location: index.php");
}
?>

