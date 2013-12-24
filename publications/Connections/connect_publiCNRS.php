<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
 $hostname_connect_publiCNRS = "lacito.vjf.cnrs.fr";
 $database_connect_publiCNRS = "lacito_publi";
 $username_connect_publiCNRS = "lacito";
 $password_connect_publiCNRS = "28lct117";
$connect_publiCNRS = mysql_pconnect($hostname_connect_publiCNRS, $username_connect_publiCNRS, $password_connect_publiCNRS) or trigger_error(mysql_error(),E_USER_ERROR);
?>