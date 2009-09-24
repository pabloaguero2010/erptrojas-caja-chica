<?php
session_start();
if ($_SESSION[perfil]=="r"){


$menu=$_GET["op"];

//construccion del warning de it.php
if ($valapr=$_GET["valapr"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Rut no válido";
	}
	
if ($valf=$_GET["valf"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese una Fecha válida";
	}
if ($valnf=$_GET["valnf"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese un N° de Telefono válido";
	}
	
if ($valnf=$_GET["valn"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese un Anexo válido";
	}
/*	
if ($valnf=$_GET["vali"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese una Jornada válida";
	}
	
if ($valnt=$_GET["valt"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese el Tipo válido";
	}*/
	
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

//construccion del warning de ap.php
if ($valnt=$_GET["valapob"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese todos los datos que son obligatorios";
	}
/* if ($valnt=$_GET["valapr"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Rut no válido o ya fue ingresado al Sistema <br> Si desea editar un Proveedor haga <a href='#'>click acá</a>";
	} */	





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

<!-- css de módulo de rrhh -->
<link rel="stylesheet" href="rrhh.css" type="text/css" />

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
      <td height="39" colspan="2"><img src="../images/titulo rrhh.png" width="955" height="39" /></td>
     </tr>
     <tr valign="top">
      <td width="268" height="100%" background="../images/bglogin.png" align="center"><p><br />
          <span class="MP">Menú Principal        </span></p>
        <div id="container" >
   		    
		<!-- BEGIN Menu -->
	    <ul id="nav">

			<li><a href="#">Trabajador</a>
					<ul>
						<li><a href="rrhh.php?op=it">Ingresar Trabajador</a>						</li>
						<li><a href="rrhh.php?op=et">Ver/Actualizar Trabajador</a>						</li>
					</ul>
			</li>
		    <li><a href="#">Licencias Médicas</a>
                <ul>
                <li><a href="rrhh.php?op=il">Ingresar Licencias Médicas</a></li>
                  <li><a href="rrhh.php?op=el">Ver/Actualizar Licencias Médicas</a></li>
                </ul>
	      </li>
          
          <li><a href="#">Permisos y Feriados  </a>
                <ul>
                <li><a href="rrhh.php?op=ip">Ingresar Permiso</a></li>
                  <li><a href="rrhh.php?op=ep">Ver/Actualizar Permiso</a></li>
                </ul>
	      </li>
          
          <li><a href="#">Sueldo</a>
                <ul>
                <li><a href="rrhh.php?op=is">Ingresar sueldo</a></li>
                  <li><a href="rrhh.php?op=es">Ver/Actualizar sueldo</a></li>
                </ul>
	      </li>
          
	     <li><a href="logout.php">Cerrar sesión</a> </li>
	      </ul>
		</div>      </td>
      <td width="687" bgcolor="#FFFFFF"> <div id="advertencia" class="msjerror" align="center"><?php echo $warning; ?></div>
        <p>
          <?php
		  if ($menu=="it")
		  	{
			include("it.php");
			}
		  elseif ($menu=="et")
		  	{
			include("et.php");
			}
		  elseif ($menu=="et2")
		  	{
			include("et2.php");
			}
		  elseif ($menu=="il")
		  	{
			include("il.php");
			}
		  elseif ($menu=="el")
		  	{
			include("el.php");
			}
		  elseif ($menu=="el2")
		  	{
			include("el2.php");
			}
			elseif ($menu=="ip")
		  	{
			include("ip.php");
			}
			elseif ($menu=="ep")
		  	{
			include("ep.php");
			}
			elseif ($menu=="ep2")
		  	{
			include("ep2.php");
			}
			elseif ($menu=="is")
		  	{
			include("is.php");
			}
			elseif ($menu=="es")
		  	{
			include("es.php");
			}
			elseif ($menu=="es2")
		  	{
			include("es2.php");
			}
			else
		  	{  
			include("homerrhh.php");
			}
		?>
        </p>
              
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

