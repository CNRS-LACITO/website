<?php require_once('../Connections/cmd_livres_connect.php'); ?>
<!--compte mail de l'administrateur-->
<?php  $to_admin="behaghel@vjf.cnrs.fr"; ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysql_select_db($database_cmd_livres, $cmd_livres);
$query_livre_commande = "SELECT * FROM cmd_livres  ORDER BY id_auto ASC";
$livre_commande = mysql_query($query_livre_commande, $cmd_livres) or die(mysql_error());
$row_livre_commande = mysql_fetch_assoc($livre_commande);
$totalRows_livre_commande = mysql_num_rows($livre_commande);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Demande d'achat d'ouvrage</title>
<link href="../styles/charte.css" rel="stylesheet" type="text/css" />
<link href="../styles/styles.css" rel="stylesheet" type="text/css" />
<link href="../styles/xcharte.css" rel="stylesheet" type="text/css" /></head>
<body>
<table width="700" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td><h2>Achat d'ouvrages &agrave; destination du centre de documentation AGH </h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><p>Liste des livres dont la demande est en cours de traitement : <a href="#liste">voir ci-dessous</a> </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h3><b>Demande d'achat d'ouvrage : </b>formulaire &agrave; remplir et &agrave; envoyer </h3>
      <form id="form_cmd_livres" name="form_cmd_livres" method="get" action="cmd_livres.php">
        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="table-avec-bordures">
          <tr>
            <td><b>
              <?php 
			  $flag_form=0;
			  $info_form="Liste de(s) champ(s) vide(s) :<br/>";
			  ?>
              Renseignements concernant la demande </b></td>
            <td valign="top"><b>Renseignements concernant l'ouvrage </b></td>
          </tr>
          <tr>
            <td valign="top"><p>Nom du demandeur<br />
            <?php 
			$info='<input name="nom_demandeur" type="text" id="nom_demandeur" size="47"';
			if (isset($_GET['nom_demandeur']) ? strlen($_GET['nom_demandeur']) : 0) {
				$info=$info.'value="'.$_GET['nom_demandeur'].'"/>'; 	
			} else {
				$info=$info.'/>';		  
				$flag_form=$flag_form+1;
				$info_form=$info_form.'- Nom du demandeur<br/>';
			}
			echo $info;
			?>
              </p>
              <p> Nom des personnes int&eacute;ress&eacute;es par cet ouvrage <br />
                <?php 
				$info='<textarea name="noms_autre" cols="37" rows="3" id="noms_autre" class="texte_gauche">';
				if ( isset($_GET['noms_autre']) ? strlen($_GET['noms_autre']) : 0  > 0 ) {
				$info=$info.$_GET['noms_autre'].'</textarea>'; 
				 } else {
				$info=$info.'</textarea>';	
				$flag_form=$flag_form+1;
				$info_form=$info_form.'- Nom des personnes int&eacute;ress&eacute;es par cet ouvrage <br/>';
				 }
				echo $info;
				?>
                <br />
                El&eacute;ments de justification de l'achat<br />
                <?php 
				$info='<textarea name="justification" cols="37" rows="3" id="justif" class="texte_gauche">';
				if (isset($_GET['justification']) ? strlen($_GET['justification']) : 0 > 0 ) {
				$info=$info.$_GET['justification'].'</textarea>';
				 } else {
				$info=$info.'</textarea>';	
				$flag_form=$flag_form+1;
				$info_form=$info_form.'- El&eacute;ments de justification de l\'achat <br/>';
				}
				echo $info;
				?>
                <br />
                degr&eacute; de priorit&eacute; <br />
                <?php 
				$info='<select name="priorite" id="priorite">';
				if (isset($_GET['priorite']) ? strlen($_GET['priorite']) : 0 > 0 ) {
				$info_priorite=$_GET['priorite'] ? "prioritaire" : "non prioritaire";
				$info=$info.'<option value="'.$_GET['priorite'].'">'.$info_priorite.'</option>';
				   } else {
				  $info=$info.'<option value=""></option>';
				  $flag_form=$flag_form+1;
				  $info_form=$info_form.'- degr&eacute; de priorit&eacute; <br/>';
				  }
				 $info=$info.'<option value="0">non prioritaire</option>
							<option value="1">prioritaire</option>
							</select>';
				 echo $info;
				?>
              </p>
              <p>Source de l'information ( biblioth&egrave;que, site web, revues, ...) <br />
                <?php 
				$info='<textarea name="source_information" cols="37" rows="3" id="SI" class="texte_gauche">';
				if ( isset($_GET['source_information']) ? strlen($_GET['source_information']) : 0  > 0 ) {
				$info=$info.$_GET['source_information'].'</textarea>'; 
				 } else {
				$info=$info.'</textarea>';	
				$flag_form=$flag_form+1;
				$info_form=$info_form.'- Source de l\'information <br/>';
				 }
				echo $info;
				?>
              </p></td>
            <td valign="top"><p>Auteur<br />
                <?php 
				$info='<input name="auteur" type="text" id="auteur" size="47"';
				if (isset($_GET['auteur']) ? strlen($_GET['auteur']) : 0 > 0 ) {
					$info=$info.'value="'.$_GET['auteur'].'"/>'; 	
				} else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Auteur <br/>';
				}
				echo $info;
				?>
                <br />
                Titre<br />
                <?php 
				$info='<input name="titre" type="text" id="titre" size="47"';
				if ( isset($_GET['titre']) ? strlen($_GET['titre']) : 0 > 0) {
				  $info=$info.'value="'.$_GET['titre'].'"/>'; 
				   } else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Titre <br/>';
				  }
				echo $info;
				?>
                <br />
                Lieu d'&eacute;dition <br />
                <?php 
				$info='<input name="lieu_edition" type="text" id="lieu_edition" size="47"';
				if ( isset($_GET['lieu_edition']) ? strlen($_GET['lieu_edition']) : 0 > 0) {
				  $info=$info.'value="'.$_GET['lieu_edition'].'"/>'; 
				   } else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Lieu d\'&eacute;dition <br/>';
				  }
				echo $info;
				?>
                <br />
                Ann&eacute;e de publication (4 chiffres) <br />
                <?php 
				$info='<input name="dp_annee" type="text" id="dp_annee" maxlength="4" size="3"';
				if ( isset($_GET['dp_annee']) ? strlen($_GET['dp_annee']) : 0 > 0) {
				  $info=$info.'value="'.$_GET['dp_annee'].'"/>'; 
				   } else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Ann&eacute;e de publication  <br/>';
				  }
				echo $info;
				 ?>
              </p>
              <p>Editeur<br />
                <?php 
				$info='<input name="editeur" type="text" id="editeur" size="47"';
				if ( isset($_GET['editeur']) ? strlen($_GET['editeur']) : 0 > 0) {
				  $info=$info.'value="'.$_GET['editeur'].'"/>'; 
				   } else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Editeur <br/>';
				  }
				echo $info;
				?>
                <br />
                Num&eacute;ro ISBN <br />
                <?php 
				$info='<input name="isbn" type="text" id="isbn" size="25"';
				if ( isset($_GET['isbn']) ? strlen($_GET['isbn']) : 0 > 0) {
				  $info=$info.'value="'.$_GET['isbn'].'"/>'; 
				   } else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Num&eacute;ro ISBN <br/>';
				  }
				echo $info;
				?>
                <br />
                Prix HT (prix en euros sans le symbole)<br />
                <?php 
				$info='<input name="prix_ht" type="text" id="prix_ht" size="25"';
				if ( isset($_GET['prix_ht']) ? strlen($_GET['prix_ht']) : 0 > 0) {
				  $info=$info.'value="'.$_GET['prix_ht'].'"/>'; 
				   } else {
					$info=$info.'/>';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Prix HT <br/>';
				  }
				echo $info;
				?>
              </p>
              <p>
                <?php 
				$info='<input type="checkbox" name="checkbox"';
				if ( isset($_GET['checkbox']) ? 1 : 0 ) {
				  $info=$info.'value="'.$_GET['checkbox'].'" checked="checked"/>'; 
				   } else {
					$info=$info.'value="" />';		  
					$flag_form=$flag_form+1;
					$info_form=$info_form.'- Case &agrave; cocher <br/>';
				  }
				echo $info;
				?>
                J'ai v&eacute;rifi&eacute; que cet ouvrage n'&eacute;tait pas d&eacute;ja au catalogue du centre de documentation A.-G. Haudricourt</p></td>
          </tr>
          <tr>
            <td valign="top">
			<?php 
			if ($flag_form==0) { 
			$date_demande= date("d")."-".date("m")."-".date("Y");
			$date_publication= $_GET['dp_annee'];	
			$insertSQL = sprintf("INSERT INTO cmd_livres (auteur, titre, lieu_edition, date_publication, editeur, isbn, prix_ht, nom_demandeur, noms_autre, justification, priorite, date_demande, source_information ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			   GetSQLValueString($_GET['auteur'], "text"),
			   GetSQLValueString($_GET['titre'], "text"),
			   GetSQLValueString($_GET['lieu_edition'], "text"),
			   GetSQLValueString($date_publication, "text"),
			   GetSQLValueString($_GET['editeur'], "text"),
			   GetSQLValueString($_GET['isbn'], "text"),
			   GetSQLValueString($_GET['prix_ht'], "text"),
			   GetSQLValueString($_GET['nom_demandeur'], "text"),
			   GetSQLValueString($_GET['noms_autre'], "text"),
			   GetSQLValueString($_GET['justification'], "text"),
			   GetSQLValueString($_GET['priorite'], "binary"),
			   GetSQLValueString($date_demande, "int"),
			   GetSQLValueString($_GET['source_information'], "text"));
			  mysql_select_db($database_cmd_livres, $cmd_livres);
			  $Result1 = mysql_query($insertSQL, $cmd_livres) or die(mysql_error());
			  echo '<font color="#FF3300"><b>LA DEMANDE A ETE ENREGISTREE</b></font>';
			  // envoi d'un mail aux administrateurs
			  $subject="LACITO - commande de livre";
			  $message="une demande d'ouvrage à été effectué par :".$_GET['nom_demandeur'];
			  @mail ($to_admin,$subject,$message);
			   } else {		   
			  echo '<font color="#FF3300"><b>ATTENTION : TOUS LES CHAMPS SONT OBLIGATOIRES</b><br/></font>';
			  if ($flag_form<13) {echo '<font color="#FF3300">'.$info_form.'</font>';}
			  }
			?>
            </td>
            <td valign="top">
			<?php 
			  if ($flag_form>0) {
			  echo '<input type="submit" name="Envoyer" value="Envoyer" />';
			  /*echo ' <input type="reset" name="Effacer" value="Effacer" />';*/
			  } else {
			  echo '<b><a href="cmd_livres.php">Effectuer une nouvelle demande d\'achat d\'ouvrage</a></b>';
			  }
			 ?>
            </td>
          </tr>
        </table>
      </form>
      <p></p></td>
  </tr>
  <tr>
    <td><a name="liste" id="liste"></a></td>
    <td><h3><b>Liste des livres dont la demande est en cours de traitement </b></h3>
      <?php if ($totalRows_livre_commande > 0) { // Show if recordset not empty ?>
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="table-sans-bordures">
          <tr>
            <td><b>Auteur</b></td>
            <td><b>Titre</b></td>
            <td><b>Ann&eacute;e</b></td>
            <td><b>Nom du demandeur</b></td>
            <td><strong>Prix </strong></td>
            <td valign="top"><b>Conseil&nbsp;de Laboratoire</b></td>
            <td><b> Etat&nbsp;de&nbsp;la commande </b></td>
          </tr>
          <?php do { ?>
            <tr>
              <td class="table-sans-bordures"><?php echo $row_livre_commande['auteur']; ?></td>
              <td><?php echo $row_livre_commande['titre']; ?></td>
              <td><?php echo $row_livre_commande['date_publication']; ?></td>
              <td><?php echo $row_livre_commande['nom_demandeur']; ?></td>
              <td><?php echo $row_livre_commande['prix_ht']; ?></td>
              <td>
			  <?php 
			  	$infoCL="";
				if ($row_livre_commande['conseil_labo']==1 ) {$infoCL="Accepté"; }
				if ($row_livre_commande['conseil_labo']==0 ) {$infoCL="Refusé"; }
				if ($row_livre_commande['conseil_labo']== NULL ) {$infoCL="En&nbsp;attente"; }
				echo $infoCL;
			  ?>              </td>
              <td>
			  <?php 
			 if ($row_livre_commande['conseil_labo']==1)
			 {echo $row_livre_commande['etat_commande']; }
			 if ($row_livre_commande['conseil_labo']==1 and $row_livre_commande['etat_commande']==NULL)
			 { echo "En attente"; }
			  ?>              </td>
            </tr>
            <?php } while ($row_livre_commande = mysql_fetch_assoc($livre_commande)); ?>
        </table>
        <?php } // Show if recordset not empty ?>
      	<?php if ($totalRows_livre_commande == 0) { // Show if recordset empty ?>
        Il n'y a aucune demande de livre  en cours
        <?php } // Show if recordset empty ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php mysql_free_result($livre_commande); ?>
