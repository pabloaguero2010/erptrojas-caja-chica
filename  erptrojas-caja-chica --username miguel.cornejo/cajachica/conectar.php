<?php
session_start();
if ($_SESSION[perfil]=="o" or $_SESSION[perfil]=="q" or $_SESSION[perfil]=="c" or $_SESSION[perfil]=="d" or $_SESSION[perfil]=="r" or $_SESSION[perfil]=="j" or $_SESSION[perfil]=="t" or $_SESSION[perfil]=="a"){

   /* ********************* */
   /* Conexion a PostgreSQL */
   /* ********************* */

   /* Conexion a la base de datos */
  	$connstr = "dbname=erptrojas user=postgres password=123456 host=localhost port=5432";
        $dbh = pg_connect($connstr);

	if (!$dbh) {
		echo "Ha ocurrido un error con la conexion a la base de datos";
		exit();
		}

}
else
{
header("location: index.php");
}
?>