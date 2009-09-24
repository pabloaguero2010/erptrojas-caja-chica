<?php
session_start();
$usuario = $_POST[usuario];
$pass = $_POST[pass];
$_SESSION[perfil]="d";
require("../conectar.php");

	
        $sql = "SELECT nombre_usuario, password, perfil FROM usuario WHERE nombre_usuario = '$usuario'";
        $stat = pg_exec($dbh,$sql);
		$datos = pg_fetch_assoc($stat);
		$rows = pg_numrows($stat);
		if ($rows==0)
		{
			pg_close($dbh);
			//header("location: index.php?msj=error1");
		}
		else
		{
			if ($datos["password"] == $pass)
			{
				if($datos["perfil"] == "q")
				{
				pg_close($dbh);
				$_SESSION[username]=$usuario;
				$_SESSION[perfil]="q";
				header("location: adquisiciones.php");
				}
				else
				{
				pg_close($dbh);
				header("location: index.php?msj=error2");
				}
			}
			else
			{
				pg_close($dbh);
				header("location: index.php?msj=error1");
			}
        
		}
?>