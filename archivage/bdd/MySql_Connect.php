<?php


 $hostname = "www.vjf.cnrs.fr";
 $database = "pangloss";
 $login = "lacito";
 $password = "28lct117";


$connexion =mysql_connect ($hostname,$login,$password) or trigger_error(mysql_error(),E_USER_ERROR);

?>
