<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>

<?php
require_once('MySql_Connect.php');

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database, $connexion);

// lancement de la requete
$sql = 'SELECT * FROM catalog WHERE num_res < 10';  
 
// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$res = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
 
// on recupere le resultat sous forme d'un tableau
/*$data = mysql_fetch_array($sql);  */
$nombre_de_reponse=mysql_num_rows($res); 
// on libère l'espace mémoire alloué pour cette interrogation de la base


echo "Nombre de lignes : $nombre_de_reponse".'<br/>';

while($ligne = mysql_fetch_array($res))
{
 echo $ligne['id_oai'].'<br/>'; 
} 

mysql_close();  
?>


</body>
</html>