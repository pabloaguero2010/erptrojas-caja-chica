<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dreamweaver = "localhost";
$database_dreamweaver = "inventario";
$username_dreamweaver = "root";
$password_dreamweaver = "";
$dreamweaver = mysql_pconnect($hostname_dreamweaver, $username_dreamweaver, $password_dreamweaver) or trigger_error(mysql_error(),E_USER_ERROR); 
?>