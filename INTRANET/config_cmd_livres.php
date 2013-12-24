<?php 
/*Fichier de configuration du formulaire cmd_livres_2009.php
la connexion à la BDD s'effectue via le fichier de connexion /Connections/cmd_livres.php
le formulaire "cmd_livres" comprends 12 champs dont  :
*/ 
$nom_demandeur=''; if (isset($_POST['nom_demandeur'])) $nom_demandeur=$_POST['nom_demandeur'];
$titre=''; if (isset($_POST['titre'])) $titre=$_POST['titre'];
$auteur=''; if (isset($_POST['auteur'])) $auteur=$_POST['auteur'];
$prix_ht =0 ; if (isset($_POST['prix_ht'])) $prix_ht=$_POST['prix_ht'];
/* choix du codage : charset MySQL | charset HTML
latin1   | iso-8859-1 
utf8	 | utf-8
*/
$charset_mysql = 'utf8';
$charset_html = 'utf-8';
// compte mail de l'administrateur
$to_admin="pgrison@vjf.cnrs.fr"; 
// sujet & message du mail
$subject="achat d'ouvrage";
$message="une demande d'achat d'ouvrage à été effectué par :".$nom_demandeur;
$message.="
titre de l'ouvrage : ".$titre;
$message.="
auteur de l'ouvrage : ".$auteur;
$message.="
prix de l'ouvrage : ".$prix_ht." euros";
// affichage du message qui confirme la validation du formulaire
$info_validation="Votre demande d'achat de l'ouvrage \" ". $titre." \" a bien été envoyée.<br>Pour toutes modifications des informations fournies, veillez vous adresser à l'<a href=\"mailto:".$to_admin."?subject=modification commande de livre\">administrateur</a> de la base de données.";
//
?>

