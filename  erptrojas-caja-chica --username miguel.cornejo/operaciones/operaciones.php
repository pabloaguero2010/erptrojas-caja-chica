<?php
session_start();
if ($_SESSION[perfil]=="o"){


$menu=$_GET[op];

//construccion del warning de acl.php
if ($valnt=$_GET["valapob"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ingrese todos los datos que son obligatorios";
	}
	
if ($valnt=$_GET["valapr"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Rut no válido o ya fue ingresado al Sistema <br> Si desea editar un Cliente haga <a href='operaciones.php?op=ecl'>click acá</a>";
	}



//construccion del warning de aco.php
if ($valv=$_GET["valr"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."No existe personal en la empresa con ese RUT";
	}

if ($valv=$_GET["valc"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Ya existe un Conductor con ese RUT en el Sistema";
	}

if ($valv=$_GET["valf"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."La fecha ingresada no es válida";
	}
	
	
	
//construccion del warning de av.php
if ($valv=$_GET["valv"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Patente y/o Número son campos obligatorios";
	}
	
if ($valvp=$_GET["valvp"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Un vehículo con esa Patente ya existe en el Sistema";
	}

if ($valvp=$_GET["valvn"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Un vehículo con ese número ya existe en el Sistema";
	}
	




//construccion del warning de ar.php
if ($valruta=$_GET["valruta"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Origen y/o Destino no válidos o ya existe Ruta en el Sistema";
	}
	
//construccion del warning de atv.php
if ($valruta=$_GET["valtv"]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Tipo de Vehículo no válido o ya existe en el Sistema";
	}
	
//Tarifas

if ($valtar=$_GET[valta]==1)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Faltan campos obligatorios.";
	}
	
if ($valtar=$_GET[valta]==2)
	{
	if($warning) $warning=$warning." <br> ";
	$warning=$warning."Los valores para esa ruta y tipo de vehículo ya existe en el sistema, si se desean editar hacer click acá.";
	}


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


<!-- libreria para calendario -->
<link href="../calendario/calendario.css" rel="stylesheet" type ="text/css" media="screen" />
<script src="../calendario/calendario.js" type="text/javascript"></script>

<!-- css de módulo operaciones -->
<link rel="stylesheet" href="operaciones.css" type="text/css" />



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


<!-- libreria trojas -->

<script type="text/javascript" src="../trojas.js"></script>


</head>
<body>
<?php
include("header.php");
?>



  <table width="955" height="450" border="0" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td height="39" colspan="2"><img src="../images/titulo operaciones.png" width="955" height="39" /></td>
     </tr>
     <tr valign="top">
      <td width="268" height="100%" background="../images/bglogin.png" align="center"><p><br />
          <span class="MP">Menú Principal        </span></p>
        <div id="container" >
   		    
		<!-- BEGIN Menu -->
	    <ul id="nav">

			<li><a href="#">Prestación de Servicios</a>
				<ul>
					<li><a href="#">Ingresar</a>
						<ul>
							<li><a href="operaciones.php?op=sic">con estado de pago</a></li>
							<li><a href="operaciones.php?op=sis">sin estado de pago</a></li>
						</ul>
                    </li>
                    <li><a href="#">Revisar/Actualizar</a>
						<ul>
							<li><a href="#">con estado de pago</a></li>
							<li><a href="#">sin estado de pago</a></li>
						</ul>
                    </li>
                    <li><a href="#">Cancelar</a>
						<ul>
							<li><a href="#">con estado de pago</a></li>
							<li><a href="#">sin estado de pago</a></li>
						</ul>
                    </li>
                    <li><a href="#">Gestión de Viáticos</a>
						<ul>
							<li><a href="#">Solicitar Viáticos</a></li>
							<li><a href="#">Ver/Actualizar Viáticos</a></li>
                            <li><a href="#">Rendición de Viáticos</a></li>
						</ul>
                    </li>
                </ul>
			</li>
		
			<li><a href="#">Estado de Pago</a>
					<ul>
						<li><a href="#">por mes</a>
						</li>
						<li><a href="#">por semana</a>
						</li>
					</ul>
			</li>
		    <li><a href="#">Gestión de Vehículos</a>
                <ul>
                  <li><a href="operaciones.php?op=ev">Ver/Editar/Eliminar Vehículos</a></li>
                  <li><a href="operaciones.php?op=av">Agregar un Vehículo</a></li>
                </ul>
	      </li>
          <li><a href="#">Gestión de Conductores</a>
                <ul>
                  <li><a href="operaciones.php?op=eco">Ver/Actualizar Licencias Conductores</a></li>
                  <!-- <li><a href="operaciones.php?op=aco">Agregar un Conductor</a></li> 
                  <li><a href="#">Gestión de Licencias</a>
                  	<ul>
                  		<li><a href="#">Informe de Licencias</a></li>
                  		<li><a href="#">Agregar Licencias</a></li>
                  		<li><a href="#">Actualizar Licencias</a></li>
                  	</ul>
                  </li> -->
                </ul>
	      </li>
          <li><a href="#">Gestión de Clientes</a>
                <ul>
                  <li><a href="operaciones.php?op=ecl">Ver/Editar Clientes</a></li>
                  <li><a href="operaciones.php?op=acl">Agregar un Cliente</a></li>
                  <!--<li><a href="#">Gestión de Proyectos</a>
                	<ul>
                  		<li><a href="operaciones.php?op=eproy">Ver/Editar Proyectos</a></li>
                  		<li><a href="operaciones.php?op=aproy">Agregar Proyectos</a></li>
                	</ul>
	      		  </li>-->
                </ul>
	      </li>
          
          			<li><a href="#">Configuración</a>
				<ul>
					<li><a href="operaciones.php?op=ruta">Rutas</a></li>
                    <li><a href="operaciones.php?op=tvehiculo">Tipos de Vehiculos</a></li>
                    <li><a href="#">Tarifas</a>
						<ul>
							<li><a href="operaciones.php?op=tarifas">Ingresar</a></li>
							<li><a href="operaciones.php?op=etarifas">Ver/Actualizar</a></li>
						</ul>
                    </li>
                </ul>
			</li>
          
          <li><a href="logout.php">Cerrar Sesión</a>
          </li>
	    </ul>
	
		<!-- END Menu -->
      </div>  
      
      
      </td>
      <td width="687" bgcolor="#FFFFFF"> <div id="advertencia" align="center" class="msjerror"> <?php echo $warning; ?> </div>
        <p>
          <?php
		  if ($menu=="sic")
		  	{
			include("sic.php");
			}
		  elseif ($menu=="sic2")
		  	{
			include("sic2.php");
			}
		  elseif ($menu=="sis")
		  	{
			include("sis.php");
			}
		  elseif ($menu=="sis2")
		  	{
			include("sis2.php");
			}
		  elseif ($menu=="ruta")
		  	{
			include("ruta.php");
			}
		  elseif ($menu=="tvehiculo")
		  	{
			include("tvehiculo.php");
			}
		  elseif ($menu=="av")
		  	{
			include("av.php");
			}
		  elseif ($menu=="ev")
		  	{
			include("ev.php");
			}
		  elseif ($menu=="ev2")
		  	{
			include("ev2.php");
			}
		  elseif ($menu=="aco")
		  	{
			include("aco.php");
			}
		  elseif ($menu=="eco")
		  	{
			include("eco.php");
			}
		  elseif ($menu=="eco2")
		  	{
			include("eco2.php");
			}
		  elseif ($menu=="acl")
		  	{
			include("acl.php");
			}
		  elseif ($menu=="ecl")
		  	{
			include("ecl.php");
			}
		  elseif ($menu=="ecl2")
		  	{
			include("ecl2.php");
			}
		  elseif ($menu=="aproy")
		  	{
			include("aproy.php");
			}
		  elseif ($menu=="eproy")
		  	{
			include("eproy.php");
			}
		  elseif ($menu=="eproy2")
		  	{
			include("eproy2.php");
			}
		  elseif ($menu=="tarifas")
		  	{
			include("tarifas.php");
			}
		  elseif ($menu=="etarifas")
		  	{
			include("etarifas.php");
			}
		  elseif ($menu=="etarifas2")
		  	{
			include("etarifas2.php");
			}
		  elseif ($menu=="ese")
		  	{
			include("ese.php");
			}
		  elseif ($menu=="ese2")
		  	{
			include("ese2.php");
			}
		  else
		  	{  
			include("homeoperador.php");
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

