<?php require_once('../Connections/cmd_livres.php');  ?>
<?php // precision sur le jeu de caracteres :  ici on travaille en utf8
include('config_cmd_livres.php');
$SQL="SET NAMES '".$charset_mysql."'";
mysql_query($SQL);
// cas PHP 5 >=  :  mysql_set_charset('utf8',$cmd_livres);
?>
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

// Actions en cas de validation 
$info_user="";
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_cmd_livres")) {
	$info_user=$info_validation;
	// @mail ($to_admin,$subject,$message);	NE MARCHE QUE POUR UN SERVEUR SMTP
	$pear_mail = @include('../Mail.php');
	if ($pear_mail) {
		// liste des destinataire dest1@vjf.cnrs.fr,dest2@vjf.cnrs.fr ... : ici l'administrateur
		$recipients = $to_admin;
		// header du message
		$headers['From']    = 'intranet-lacito@vjf.cnrs.fr';
		$headers['To']      = $to_admin;
		$headers['Subject'] = $subject;
		$headers["Content-Type"] = "text/plain; charset=UTF-8";
		$body = $message;
		// Create the mail object using the Mail::factory method
		// methode 1 : via le serveur smtp
		$smtpinfo["host"] = "smtp.vjf.cnrs.fr";
		$smtpinfo["port"] = "25";
		$smtpinfo["auth"] = false; 
		$mail_object =& Mail::factory("smtp", $smtpinfo); 
		// send mail
		$mail_object->send($recipients, $headers, $body);	 
	}	else  {
		$info_user .= "<br> ! l'envoi du mail automatique n'ayant pas fonctionné, veillez en informer <a href=\"mailto:".$to_admin."?subject=nouvelle commande de livre\">l'administrateur</a>.";
	}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_cmd_livres")) {
  $insertSQL = sprintf("INSERT INTO cmd_livres (auteur, titre, lieu_edition, date_publication, editeur, isbn, prix_ht, nom_demandeur, noms_autre, justification, priorite, date_demande, source_information) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['auteur'], "text"),
                       GetSQLValueString($_POST['titre'], "text"),
                       GetSQLValueString($_POST['lieu_edition'], "text"),
                       GetSQLValueString($_POST['date_publication'], "int"),
                       GetSQLValueString($_POST['editeur'], "text"),
                       GetSQLValueString($_POST['isbn'], "text"),
                       GetSQLValueString($_POST['prix_ht'], "double"),
                       GetSQLValueString($_POST['nom_demandeur'], "text"),
                       GetSQLValueString($_POST['noms_autre'], "text"),
                       GetSQLValueString($_POST['justification'], "text"),
                       GetSQLValueString($_POST['priorite'], "int"),
                       GetSQLValueString($_POST['date_demande'], "text"),
                       GetSQLValueString($_POST['source_information'], "text"));

  mysql_select_db($database_cmd_livres, $cmd_livres);
  $Result1 = mysql_query($insertSQL, $cmd_livres) or die(mysql_error());
}
mysql_select_db($database_cmd_livres, $cmd_livres);
$query_livre_commande = "SELECT * FROM cmd_livres WHERE archivage = 0 ORDER BY id_auto DESC";
$livre_commande = mysql_query($query_livre_commande, $cmd_livres) or die(mysql_error());
$row_livre_commande = mysql_fetch_assoc($livre_commande);
$totalRows_livre_commande = mysql_num_rows($livre_commande);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo($charset_html);?>" />
<title>Demande d'achat d'ouvrage</title>

<link href="../styles/styles.css" rel="stylesheet" type="text/css" />

<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
    <td bgcolor="#F0F0F0"><h2 align="center" class="titre_page">DEMANDE d'ouvrages POUR LE centre de documentation AGH </h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" class="info_user"><?php echo $info_user ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h3><b>Demande d'achat d'ouvrage : </b>formulaire &agrave; remplir et &agrave; valider ( cf. <a href="#liste">liste des livres dont la demande est en cours de traitement</a> )</h3>
      <form id="form_cmd_livres" name="form_cmd_livres" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="table-avec-bordures">
          <tr>
            <td width="430" bgcolor="#F0F0F0"><b>
              Renseignements concernant la demande </b></td>
            <td width="430" valign="top" bgcolor="#F0F0F0"><b>Renseignements concernant l'ouvrage </b></td>
          </tr>
          <tr>
            <td width="430" valign="top" bordercolor="#000033"><p><strong>Nom du demandeur *</strong> (nom, prénom)<br />
              <span id="sprytextfield1">
              <input name="nom_demandeur" type="text" class="champ_text" id="nom_demandeur" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p> <strong>Nom des personnes int&eacute;ress&eacute;es par cet ouvrage</strong> * (nom, nom, ...)<br />
                <span id="sprytextarea1">
                <textarea name="noms_autre" cols="80" rows="2" class="champ_text" id="noms_autre"></textarea>
                <span class="textareaRequiredMsg">Le champ est obligatoire</span>                </span></p>
              <p><strong>El&eacute;ments de justification de l'achat *</strong><br />
                <span id="sprytextarea2">
                <textarea name="justification" cols="80" rows="3" class="champ_text" id="justification"></textarea>
                <span class="textareaRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>degr&eacute; de priorit&eacute; *</strong><br />
                <span id="spryselect1">
                <select name="priorite" class="champ_text" id="priorite">
                  <option value="-1" selected="selected"></option>
                  <option value="0">non prioritaire</option>
                  <option value="1">prioritaire</option>
                                                </select>
                <span class="selectInvalidMsg">Sélectionnez un élément valide.</span>                <span class="selectRequiredMsg">Sélectionnez un élément.</span></span></p>
              <p><strong>Source de l'information </strong>( biblioth&egrave;que, site web, revues, ...)<strong> *</strong><br />
                <span id="sprytextarea3">
                <textarea name="source_information" cols="80" rows="3" class="champ_text" id="source_information"></textarea>
                <span class="textareaRequiredMsg">Le champ est obligatoire</span></span><br />
            </p>            </td>
            <td width="430" valign="top"><p><strong>Auteur *</strong> (nom, prénom)<br />
              <span id="sprytextfield2">
              <input name="auteur" type="text" class="champ_text" id="auteur" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>Titre *</strong><br />
                <span id="sprytextfield3">
                <input name="titre" type="text" class="champ_text" id="titre" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>Lieu d'&eacute;dition *</strong><br />
                <span id="sprytextfield4">
                <input name="lieu_edition" type="text" class="champ_text" id="lieu_edition" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>Ann&eacute;e de publication</strong> (4 chiffres)<strong> *</strong><br />
                <span id="sprytextfield5">
                <input name="date_publication" type="text" class="champ_text" id="date_publication" size="4" maxlength="4" />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span><span class="textfieldMinCharsMsg">Nombre minimal de caractères non atteint.</span><span class="textfieldMaxCharsMsg">Le nombre maximum de caractères a été dépassé.</span><span class="textfieldMinValueMsg">La valeur entrée est inférieure au minimum requis.</span><span class="textfieldMaxValueMsg">La valeur entrée est supérieure au maximum autorisé.</span></span></p>
              <p><strong>Editeur *</strong><br />
                <span id="sprytextfield6">
                <input name="editeur" type="text" class="champ_text" id="editeur" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>Num&eacute;ro ISBN *</strong><br />
                <span id="sprytextfield7">
                <input name="isbn" type="text" class="champ_text" id="isbn" size="25" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>Prix HT </strong>(prix en euros sans le symbole - ex. 12.34)<strong> *</strong><br />
                <span id="sprytextfield8">
                <input name="prix_ht" type="text" class="champ_text" id="prix_ht" />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span></p>
              <p>
<span id="sprycheckbox1">
<input type="checkbox" name="checkbox" id="checkbox" />
<span class="checkboxRequiredMsg">Cochez pour Valider</span></span>                J'ai v&eacute;rifi&eacute; que cet ouvrage n'&eacute;tait pas d&eacute;ja au <a href="http://www.vjf.cnrs.fr/clt/html/doc/catalogue.htm" target="_blank">catalogue du centre de documentation A.-G. Haudricourt</a> *</p></td>
          </tr>
          <tr>
            <td colspan="2" valign="top"><input name="date_demande" type="hidden" id="date_demande" value="<?php echo (date("Y")."-".date("m")."-".date("d")); ?>" />
            <input type="submit" name="envoyer" id="envoyer" value="VALIDER la demande" />
            &nbsp;<em>(*) Tous   les champs sont obligatoires</em></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form_cmd_livres" />
      </form>
    <p></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><h3><b><a name="liste" id="liste"></a>Liste des livres dont la demande est en cours de traitement </b></h3>
      <?php if ($totalRows_livre_commande > 0) { // Show if recordset not empty ?>
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="table-avec-bordures">
        <tr>
          <td valign="top" bgcolor="#F0F0F0"><b>Auteur</b></td>
          <td valign="top" bgcolor="#F0F0F0"><b>Titre</b></td>
          <td valign="top" bgcolor="#F0F0F0"><b>Ann&eacute;e</b></td>
          <td valign="top" bgcolor="#F0F0F0"><strong>Prix<br />
          </strong>euros</td>
          <td valign="top" bgcolor="#F0F0F0"><b>Nom du demandeur<br />
                <em>personnes&nbsp;int&eacute;ress&eacute;es</em></b></td>
          <td valign="top" bgcolor="#F0F0F0"><b>Conseil&nbsp;du<br />
            laboratoire</b></td>
          <td width="100" valign="top" bgcolor="#F0F0F0"><b>Etat&nbsp;de&nbsp;</b><b>la&nbsp;<br />
            commande</b></td>
          <td valign="top" bgcolor="#F0F0F0"><strong>Date</strong></td>
        </tr>
        <?php do { ?>
        <tr>
          <td valign="top" class="table-sans-bordures"><?php echo $row_livre_commande['auteur']; ?></td>
          <td valign="top"><?php echo $row_livre_commande['titre']; ?></td>
          <td valign="top"><?php echo $row_livre_commande['date_publication']; ?></td>
          <td valign="top"><?php echo $row_livre_commande['prix_ht']; ?></td>
          <td valign="top"><?php echo $row_livre_commande['nom_demandeur']; ?><br />
              <it> <em><?php echo $row_livre_commande['noms_autre']; ?></em></it></td>
          <td valign="top"><?php 
			  	$infoCL="";
				if ($row_livre_commande['conseil_labo']==1 ) {$infoCL="Accept&eacute;"; }
				if ($row_livre_commande['conseil_labo']==0 ) {$infoCL="Refus&eacute;"; }
				if ($row_livre_commande['conseil_labo']== NULL ) {$infoCL="En&nbsp;attente"; }
				echo $infoCL;
			  ?>          </td>
          <td width="100" valign="top"><?php 
			 if ($row_livre_commande['conseil_labo']==1)
			 {echo $row_livre_commande['etat_commande']; }
			 if ($row_livre_commande['conseil_labo']==1 and $row_livre_commande['etat_commande']==NULL)
			 { echo "En attente"; }
			  ?>          </td>
          <td valign="top">
		  <?php if (substr($row_livre_commande['date_demande'],0,10)!= '0000-00-00') 
		  	echo substr($row_livre_commande['date_demande'],0,10); 
		  ?>          </td>
        </tr>
        <?php } while ($row_livre_commande = mysql_fetch_assoc($livre_commande)); ?>
      </table>
      <?php } // Show if recordset not empty ?>
      <?php if ($totalRows_livre_commande == 0) { // Show if recordset empty ?>
Il n'y a aucune demande de livre  en cours
<?php } // Show if recordset empty ?>    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"-1"});
var sprytextarea3 = new Spry.Widget.ValidationTextarea("sprytextarea3");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {minChars:4, maxChars:4, minValue:1500, maxValue:2100});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "real");
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($livre_commande);
 ?>
