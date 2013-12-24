<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*
$hostname_cmd_livres = "localhost";
$database_cmd_livres = "lacito_siteweb";
$username_cmd_livres = "root";
$password_cmd_livres = "";
*/
 $hostname_cmd_livres = "newhttpd";
 $database_cmd_livres = "lacito_publi";
 $username_cmd_livres = "lacito";
 $password_cmd_livres = "28lct117";
$cmd_livres = mysql_pconnect($hostname_cmd_livres, $username_cmd_livres, $password_cmd_livres) or trigger_error(mysql_error(),E_USER_ERROR); 
?>