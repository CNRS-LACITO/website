<?php 
/*Fichier de configuration du formulaire cmd_livres_2009.php
la connexion à la BDD s'effectue via le fichier de connexion /Connections/cmd_livres.php
le formulaire "dmd_mission_2009" comprends 14 champs dont les valeurs sont :
*/ 
$nom_demandeur=''; if (isset($_POST['nom_demandeur'])) $nom_demandeur=$_POST['nom_demandeur'];
$type_mission=''; if (isset($_POST['type_mission'])) $type_mission=$_POST['type_mission'];
$details=''; if (isset($_POST['details'])) $details=$_POST['details'];
$pays_villes=''; if (isset($_POST['pays_villes'])) $pays_villes=$_POST['pays_villes'];
$nom_mission=''; if (isset($_POST['nom_mission'])) $nom_mission=$_POST['nom_mission'];
$date_depart=''; if (isset($_POST['date_depart'])) $date_depart=$_POST['date_depart'];
$date_retour=''; if (isset($_POST['date_retour'])) $date_retour=$_POST['date_retour'];
$date_debut=''; if (isset($_POST['date_debut'])) $date_debut=$_POST['date_debut'];
$date_fin=''; if (isset($_POST['date_fin'])) $date_fin=$_POST['date_fin'];
$frais_t=0 ; if (isset($_POST['frais_tr'])) $frais_t=$_POST['frais_tr'];
$infos_frais_t='' ; if (isset($_POST['infos_frais_tr'])) $infos_frais_t=$_POST['infos_frais_tr'];
$frais_i=0 ; if (isset($_POST['frais_inscription'])) $frais_i=$_POST['frais_inscription'];
$frais_s=0 ; if (isset($_POST['frais_se'])) $frais_s=$_POST['frais_se'];
$infos_frais_s='' ; if (isset($_POST['infos_frais_se'])) $infos_frais_s=$_POST['infos_frais_se'];
$frais_tot = $frais_t+$frais_i+$frais_s;
/* choix du codage : charset MySQL | charset HTML
latin1   | iso-8859-1 
utf8	 | utf-8
*/
$charset_mysql = 'utf8';
$charset_html = 'utf-8';
// compte mail de l'administrateur
$to_admin="behaghel@vjf.cnrs.fr"; 
//$to_admin="pgrison@vjf.cnrs.fr"; 
// compte mail du membre moderateur chargé de superviser la demande
$to_moderateur="adamou@vjf.cnrs.fr,cath.tainecheikh@gmail.com,alexis.michaud@vjf.cnrs.fr,behaghel@vjf.cnrs.fr";
//$to_moderateur="pgrison@vjf.cnrs.fr";  
// sujet & message du mail
$subject="demande de mission";
$message="Demande de mission de : ".$nom_demandeur;
$message.="
nature de la mission : ".$type_mission;
$message.="
détails sur la mission : ".$details;
$message.="
destination : ".$pays_villes;
$message.="
nom de la mission : ".$nom_mission;
$message.="
dates depart-retour : ".$date_depart."-".$date_retour;
$message.="
dates debut-fin: ".$date_debut."-".$date_fin;
$message.="
infos frais de transport : ".$infos_frais_t;
$message.="
infos frais de séjour : ".$infos_frais_s;
$message.="
frais de transport, sejour, (inscription): ".$frais_t."+".$frais_s."+".$frais_i." = ".$frais_tot." euros";
// affichage du message qui confirme la validation du formulaire
$info_validation="Votre demande de mission a bien été enregistrée.<br>Pour toutes modifications des informations fournies, veillez vous adresser à l'<a href=\"mailto:".$to_admin."?subject=modification demande mission\">administrateur</a> de la base de données.";
//
?>

