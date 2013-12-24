<?php require_once('Connections/cmd_livres.php');  ?>
<?php // precision sur le jeu de caracteres :  ici on travaille en utf8
include('config_dmd_mission.php');
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
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_dmd_mission")) {
	$info_user=$info_validation;
	// @mail ($to_admin,$subject,$message);	NE MARCHE QUE POUR UN SERVEUR SMTP
	$pear_mail = @include('Mail.php');
	if ($pear_mail) { // la librairie PEAR est bien installee sur le serveur
		// liste des destinataire dest1@vjf.cnrs.fr,dest2@vjf.cnrs.fr ... : ici l'administrateur
		$recipients = $to_admin;
		// header du message
		$headers['From']    = 'intranet-lacito@vjf.cnrs.fr';
		$headers['To']      = $to_moderateur;
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
		$info_user .= "<br> ! l'envoi du mail automatique n'ayant pas fonctionné, veillez en informer <a href=\"mailto:".$to_moderateur."?subject=nouvelle demande de mission\">le(s) moderateur(s)</a> en charge des demandes.";
	}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_dmd_mission")) {
  $insertSQL = sprintf("INSERT INTO dmd_mission (date_demande, nom_demandeur, type_mission, details, pays_villes, nom_mission, date_depart, date_retour, date_debut, date_fin, frais_transport, infos_frais_tr, frais_sejour, infos_frais_se, frais_inscription, frais_total, communication) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
   GetSQLValueString($_POST['date_demande'], "date"),
   GetSQLValueString($_POST['nom_demandeur'], "text"),
   GetSQLValueString($_POST['type_mission'], "text"),
   GetSQLValueString($_POST['details'], "text"),
   GetSQLValueString($_POST['pays_villes'], "text"),
   GetSQLValueString($_POST['nom_mission'], "text"),
   GetSQLValueString(strftime("%Y-%d-%m",strtotime($_POST['date_depart'])), "date"),
   GetSQLValueString(strftime("%Y-%d-%m",strtotime($_POST['date_retour'])), "date"),
   GetSQLValueString( ($_POST['date_debut']!=0) ? strftime("%Y-%d-%m",strtotime($_POST['date_debut'])): "", "date"),
    GetSQLValueString( ($_POST['date_fin']!=0) ? strftime("%Y-%d-%m",strtotime($_POST['date_fin'])): "", "date"),								
   GetSQLValueString($_POST['frais_tr'], "double"),
   GetSQLValueString($_POST['infos_frais_tr'], "text"),
   GetSQLValueString($_POST['frais_se'], "double"),
   GetSQLValueString($_POST['infos_frais_se'], "text"),
   GetSQLValueString($_POST['frais_inscription'], "double"),
   GetSQLValueString($_POST['frais_se']+$_POST['frais_tr']+$_POST['frais_inscription'],"double"),
   GetSQLValueString($_POST['communication'], "text"));

  mysql_select_db($database_cmd_livres, $cmd_livres);
  $Result1 = mysql_query($insertSQL, $cmd_livres) or die(mysql_error());
  
  //echo '---------------------------->'.strftime("%Y-%d-%m",strtotime($_POST['date_depart']));
  //echo '>>>>>>'.$_POST['date_debut'].'>>>>>'.strtotime($_POST['date_debut']).'>>>>>>'.strftime("%Y-%m-%d",strtotime($_POST['date_debut']));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demande de mission</title>

<link href="styles/styles.css" rel="stylesheet" type="text/css" />
<link href="styles/intranet.css" rel="stylesheet" type="text/css" />
<script src="javascript/view_tools.js" type="text/javascript"></script>

<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
//-->
</script>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="1">&nbsp;</td>
    <td colspan="2" bgcolor="#F0F0F0"><h2 align="center" class="titre_page">DEMANDE DE MISSION : colloque, ENQUETE LINGUISTIQUE, COLLABORATION</h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
   <?php if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_dmd_mission")) { 
   // cas ou le formulaire est validé ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center" class="info_user"><?php echo $info_user ?></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="2"><p>Voulez vous faire une nouvelle demande de mission ? <a href="dmd_mission_2009.php">OUI</a> &nbsp;/ &nbsp;<a href="index.htm">NON</a></p>
    </td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><hr width="100%" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td colspan="2">
    <h3>Recapitulatif de votre demande de mission du : <?php echo $_POST['date_demande'] ?></h3> 
    <table width="100%" border="0" cellpadding="5" cellspacing="0" class="table-avec-bordures">
      <tr>
        <td valign="top"><strong>Nature&nbsp;de&nbsp;la&nbsp;mission</strong></td>
        <td valign="top"><?php echo $_POST['type_mission'] ?>&nbsp;</td>
        <td align="right" valign="top"><strong>dates&nbsp;départ-retour</strong></td>
        <td valign="top"><?php echo $_POST['date_depart'] ?>&nbsp;-&nbsp;<?php echo $_POST['date_retour'] ?></td>
      </tr>
      <tr>
        <td valign="top"><strong>Nom&nbsp;du missionnaire</strong></td>
        <td valign="top"><?php echo $_POST['nom_demandeur'] ?></td>
        <td align="right" valign="top"><strong>Frais&nbsp;de&nbsp; transport</strong></td>
        <td valign="top"><?php echo $_POST['frais_tr'] ?>&nbsp;&euro;</td>
      </tr>
      <tr>
        <td valign="top"><strong>Nom&nbsp;du&nbsp;Colloque&nbsp;/ Objet&nbsp;du&nbsp;séjour</strong></td>
        <td valign="top"><?php echo $_POST['nom_mission'] ?></td>
        <td align="right" valign="top"><strong> détails des frais de transport</strong></td>
        <td valign="top"><?php echo $_POST['infos_frais_tr'] ?></td>
      </tr>
      <tr>
        <td valign="top"><strong>Pays/Ville&nbsp;de&nbsp;destination</strong></td>
        <td valign="top"><?php echo $_POST['pays_villes'] ?></td>
        <td align="right" valign="top"><strong>Frais&nbsp;de&nbsp;séjour</strong></td>
        <td valign="top"><?php echo $_POST['frais_se'] ?>&nbsp;&euro;</td>
      </tr>
      <tr>
        <td valign="top"><strong>précisions et détails éventuels</strong></td>
        <td valign="top"><?php echo $_POST['details'] ?></td>
        <td align="right" valign="top"><strong> détails des frais de séjour</strong></td>
        <td valign="top"><?php echo $_POST['infos_frais_se'] ?></td>
      </tr>
      <tr>
        <td valign="top"><strong>
          <?php if($_GET['type_mission']=='COLLOQUE') echo("communication"); ?>
        </strong></td>
        <td valign="top"><?php if($_GET['type_mission']=='COLLOQUE') echo($_POST['communication']); ?></td>
        <td align="right" valign="top"><strong><?php if($_GET['type_mission']=='COLLOQUE') echo("Frais d'inscription"); ?></strong></td>
        <td valign="top"><?php if($_GET['type_mission']=='COLLOQUE') echo($_POST['frais_inscription']); ?></td>
      </tr>
      <tr>
        <td valign="top"></td>
        <td valign="top"></td>
        <td align="right" valign="top"><strong><?php if($_GET['type_mission']=='COLLOQUE') echo("dates de début-fin"); ?></strong></td>
        <td valign="top"><?php if($_GET['type_mission']=='COLLOQUE') echo($_POST['date_debut'].' - '.$_POST['date_fin']); ?></td>
      </tr>
    </table></td>
  </tr>
  <?php } else { // affichage du formulaire ?>
  <tr>
    <td>&nbsp;</td>
    <td width="205" align="center" valign="middle"><h3>1) Préciser votre demande :</h3></td>
    <td width="714" align="center" valign="middle">
      <form id="form_mission" name="form_mission" method="get" action="">
        <h3>
          <select name="type_mission" id="type_mission" onchange="document.form_mission.submit();">
            <option value="-1">Nature de la mission</option>
            <option value="COLLOQUE">COLLOQUE</option>
            <option value="ENQUETE">ENQUETE LINGUISTIQUE</option>
            <option value="COLLABORATION">COLLABORATION</option>
          </select>
        &nbsp;
        <?php if(isset($_GET['type_mission'])) echo ('> <span class="orange"> '.$_GET['type_mission']);?></span></h3>
    </form>    </td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><hr width="100%" /></td>
  </tr>
  <?php if(isset($_GET['type_mission']) && $_GET['type_mission']=='COLLOQUE') {//form.COLLOQUE ?>
  <tr>
    <td></td>
    <td colspan="2">
     <h3>2) Formulaire &agrave; remplir et &agrave; valider</h3>
      <form id="form_dmd_mission" name="form_dmd_mission" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="table-avec-bordures">
          <tr>
            <td width="430" bgcolor="#F0F0F0"><b>
              Renseignements  généraux concernant la demande de COLLOQUE</b></td>
            <td width="430" valign="top" bgcolor="#F0F0F0"><b>autres renseignements (dates, frais, ...)</b></td>
          </tr>
          <tr>
            <td width="430" rowspan="2" valign="top" bordercolor="#000033"><p><strong>Nom du  missionnaire*</strong> (nom, prénom)<br />
              <span id="sprytextfield1">
              <input name="nom_demandeur" type="text" class="champ_text" id="nom_demandeur" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span><br />
              </p>
             <p><strong>Nom du colloque*</strong><br />
              <span id="sprytextfield2">
              <input name="nom_mission" type="text" class="champ_text" id="nom_mission" size="50" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
                           <p><strong>Pays / Ville de destination*</strong><br />
                <span id="sprytextfield4">
                <input name="pays_villes" type="text" class="champ_text" id="pays_villes" size="50" />
            <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span>                  </p>
             <p><strong>précisions et détails éventuels</strong><br />
                <span id="sprytextarea2">
                <textarea name="details" cols="77" rows="6" class="champ_text" id="details"></textarea>
                </span></p>			</td>
                
            <!-- autres rensseignements-->    
            <td width="430" valign="top">
              <p><strong>date départ - date retour*</strong><br />
                <span id="sprytextfield3">
                <input name="date_depart" type="text" id="date_depart" size="10" maxlength="10" />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> -<span id="sprytextfield9"><span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><span id="sprytextfield10">
                <input name="date_retour" type="text" id="date_retour" size="10" maxlength="10" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> (JJ/MM/AAAA)</p>

              <p><strong>Frais &amp; détails des frais de transport *</strong><br />
                <span id="sprytextfield5">
                <input name="frais_tr" type="text" id="frais_tr" onkeyup="reset_infos(this.id)"  size="8"  />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span><span class="textfieldMinCharsMsg">Nombre minimal de caractères non atteint.</span><span class="textfieldMaxCharsMsg">Le nombre maximum de caractères a été dépassé.</span></span> prix en &euro; &nbsp;(ex. 12.34)
              - cf.  le site <a href="http://www.simbad.cnrs.fr/" target="_blank">FRAM-CNRS</a>
              <p><span id="sprytextarea1">
        <textarea name="infos_frais_tr" cols="77" rows="3" class="champ_text_area" id="infos_frais_tr">merci de fournir le plus de détails possible. ex. : 
- vol AR : 150 euros
- transport intérieur : 150 euros
- etc.
        </textarea>
        <span class="textareaRequiredMsg">Le champ est obligatoire.</span></span></p>      
              <p><strong>Frais &amp; détails des frais de séjour *</strong><br />
              <span id="sprytextfield6">
              <input name="frais_se" type="text" id="frais_se" onkeyup="reset_infos(this.id)" size="8" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> prix en &euro;</p>
              <p><span id="sprytextarea3">
                <textarea name="infos_frais_se" cols="77" rows="3" class="champ_text_area" id="infos_frais_se">merci de fournir le plus de détails possible. ex. : 
- logement : 15 euros par jour x 20 jours
- consultants : 10 euros par séance x 20 séances
- nourriture : 180 euros
- etc.</textarea>
             <span class="textareaRequiredMsg">Le champ est obligatoire.</span></span></p>              </td>
              
          </tr>
          
          <tr>
            <td valign="top" ><span> <span>
<p><strong>Frais d'inscription *</strong><br />
                <span id="sprytextfield7">
                <input name="frais_inscription" type="text" id="frais_inscription" size="8" />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> prix en &euro;</p>
             <p><strong>
              [date de début] - [date de fin] du colloque*</strong></p>
             <p><span id="sprytextfield11">
               <input name="date_debut" type="text" id="date_debut" size="10" maxlength="10" />
               <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> -<span id="sprytextfield12">
                <input name="date_fin" type="text" id="date_fin" size="10" maxlength="10" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> (JJ/MM/AAAA)</p>
             <span id="spryselect2"><strong>communication *<br />
              </strong>
                  <select name="communication" id="communication">
                    <option value="-1"></option>
                    <option value="acceptée">acceptée</option>
                    <option value="en attente">en attente</option>
                  </select>
            <span class="selectInvalidMsg">Une selection est obligatoire.</span>                <span class="selectRequiredMsg">Une selection est obligatoire.</span></span>            </span> </td>
          </tr>
          <tr>
            <td colspan="2" valign="top"><input name="type_mission" type="hidden" id="type_mission" value="<?php echo $_GET['type_mission']; ?>" />
              <input name="date_demande" type="hidden" id="date_demande" value="<?php echo (date("Y")."-".date("m")."-".date("d")); ?>" />
            <input type="submit" name="envoyer" id="envoyer" value="VALIDER la demande" />
            <input type="hidden" name="MM_insert" value="form_dmd_mission" />
            &nbsp;<em>(*)    les champs  marqués par une astérisque sont obligatoires</em></td>
          </tr>
        </table>
      </form>    </td>
  </tr>
  <?php } // fin du formulaire ?>
  <?php if(isset($_GET['type_mission']) && $_GET['type_mission']=='ENQUETE') { //form. ENQUETE ?>
  <tr>
    <td></td>
    <td colspan="2">
    <h3>2) Formulaire &agrave; remplir et &agrave; valider</h3>
          <form id="form_dmd_mission" name="form_dmd_mission" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="100%" border="0" cellpadding="10" cellspacing="0" class="table-avec-bordures">
          <tr>
            <td width="430" bgcolor="#F0F0F0"><b> Renseignements  généraux concernant la demande d'ENQUETE</b></td>
            <td width="430" valign="top" bgcolor="#F0F0F0"><b>autres renseignements (dates, frais, ...)
              <input name="frais_inscription" type="hidden" id="frais_inscription" value="0" />
              <input name="date_debut" type="hidden" id="date_debut" value="0" />
              <input name="date_fin" type="hidden" id="date_fin" value="0" />
              <input type="hidden" name="communication" id="communication" />
</b></td>
          </tr>
          <tr>
            <td width="430" valign="top" bordercolor="#000033"><p><strong>Nom du  missionnaire*</strong> (nom, prénom)<br />
                    <span id="sprytextfield1">
                    <input name="nom_demandeur" type="text" class="champ_text" id="nom_demandeur" size="50" />
                    <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span><br />
              </p>
                <p><strong>Objet du séjour*</strong><br />
                    <span id="sprytextfield2">
                    <input name="nom_mission" type="text" class="champ_text" id="nom_mission" size="50" />
                    <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
              <p><strong>Pays / Ville de destination*</strong><br />
                    <span id="sprytextfield4">
                    <input name="pays_villes" type="text" class="champ_text" id="pays_villes" size="50" />
                    <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span> </p>
              <p><strong>précisions et détails éventuels</strong><br />
                <span id="sprytextarea2">
                <textarea name="details" cols="77" rows="6" class="champ_text" id="details"></textarea>
                </span></p></td>
            <!-- autres rensseignements--> 
                        <!-- autres rensseignements-->    
            <td width="430" valign="top">
              <p><strong>date départ - date retour*</strong><br />
                <span id="sprytextfield3">
                <input name="date_depart" type="text" id="date_depart" size="10" maxlength="10" />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> -<span id="sprytextfield9"><span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><span id="sprytextfield10">
                <input name="date_retour" type="text" id="date_retour" size="10" maxlength="10" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> (JJ/MM/AAAA)</p>
              <p><strong>Frais &amp; détails des frais de transport *</strong><br />
                <span id="sprytextfield5">
                <input name="frais_tr" type="text" id="frais_tr" onkeyup="reset_infos(this.id)"  size="8"  />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span><span class="textfieldMinCharsMsg">Nombre minimal de caractères non atteint.</span><span class="textfieldMaxCharsMsg">Le nombre maximum de caractères a été dépassé.</span></span> prix en &euro; &nbsp;(ex. 12.34)
              - cf.  le site <a href="http://www.simbad.cnrs.fr/" target="_blank">FRAM-CNRS</a>
              <p><span id="sprytextarea1">
        <textarea name="infos_frais_tr" cols="77" rows="3" class="champ_text_area" id="infos_frais_tr">merci de fournir le plus de détails possible. ex. : 
- vol AR : 150 euros
- transport intérieur : 150 euros
- etc.
        </textarea>
        <span class="textareaRequiredMsg">Le champ est obligatoire.</span></span></p>      
              <p><strong>Frais &amp; détails des frais de séjour *</strong><br />
              <span id="sprytextfield6">
              <input name="frais_se" type="text" id="frais_se" onkeyup="reset_infos(this.id)" size="8" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> prix en &euro;</p>
              <p><span id="sprytextarea3">
                <textarea name="infos_frais_se" cols="77" rows="3" class="champ_text_area" id="infos_frais_se">merci de fournir le plus de détails possible. ex. : 
- logement : 15 euros par jour x 20 jours
- consultants : 10 euros par séance x 20 séances
- nourriture : 180 euros
- etc.</textarea>
              <span class="textareaRequiredMsg">Le champ est obligatoire.</span></span></p>              </td>
           <!-- fin autres renseignements-->
          </tr>
          <tr>
            <td colspan="2" valign="top"><input name="type_mission" type="hidden" id="type_mission" value="<?php echo $_GET['type_mission']; ?>" />
              <input name="date_demande" type="hidden" id="date_demande" value="<?php echo (date("Y")."-".date("m")."-".date("d")); ?>" />
                <input type="submit" name="envoyer" id="envoyer" value="VALIDER la demande" />
                <input type="hidden" name="MM_insert" value="form_dmd_mission" />
                <em>&nbsp;(*)    les champs  marqués par une astérisque sont obligatoires</em></td>
          </tr>
        </table>
      </form>       </td>
  </tr>
  <?php } // fin du formulaire ?> 
  <?php if(isset($_GET['type_mission']) && $_GET['type_mission']=='COLLABORATION') {//form. COLLABORATION ?>    
  <tr>
    <td></td>
    <td colspan="2">
    <h3>2) Formulaire &agrave; remplir et &agrave; valider</h3>
        <form id="form_dmd_mission3" name="form_dmd_mission" method="post" action="<?php echo $editFormAction; ?>">
          <table width="100%" border="0" cellpadding="10" cellspacing="0" class="table-avec-bordures">
            <tr>
              <td width="430" bgcolor="#F0F0F0"><b> Renseignements  généraux concernant la demande de COLLABORATION</b></td>
              <td width="430" valign="top" bgcolor="#F0F0F0"><b>autres renseignements (dates, frais, ...)
                <input name="frais_inscription" type="hidden" id="frais_inscription" value="0" />
                <input name="date_debut" type="hidden" id="date_debut" value="0" />
                <input name="date_fin" type="hidden" id="date_fin" value="0" />
                <input type="hidden" name="communication" id="communication" />
              </b></td>
            </tr>
            <tr>
              <td width="430" valign="top" bordercolor="#000033"><p><strong>Nom du  missionnaire*</strong> (nom, prénom)<br />
                      <span id="sprytextfield1">
                      <input name="nom_demandeur" type="text" class="champ_text" id="nom_demandeur" size="50" />
                      <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span><br />
                </p>
                  <p><strong>Objet du séjour*</strong><br />
                      <span id="sprytextfield2">
                      <input name="nom_mission" type="text" class="champ_text" id="nom_mission" size="50" />
                      <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span></p>
            <p><strong>Pays / Ville de destination*</strong><br />
                      <span id="sprytextfield4">
                      <input name="pays_villes" type="text" class="champ_text" id="pays_villes" size="50" />
                      <span class="textfieldRequiredMsg">Le champ est obligatoire</span></span> </p>
                <p><strong>précisions et détails éventuels</strong><br />
                      <span id="sprytextarea2">
                      <textarea name="details" cols="77" rows="6" class="champ_text" id="details"></textarea>
                  </span></p></td>
                  
               <!-- autres renseignements-->
                          <!-- autres rensseignements-->    
            <td width="430" valign="top">
              <p><strong>date départ - date retour*</strong><br />

                <span id="sprytextfield3">
                <input name="date_depart" type="text" id="date_depart" size="10" maxlength="10" />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> -<span id="sprytextfield9"><span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span><span id="sprytextfield10">
                <input name="date_retour" type="text" id="date_retour" size="10" maxlength="10" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> (JJ/MM/AAAA)</p>

              <p><strong>Frais &amp; détails des frais de transport *</strong><br />
                <span id="sprytextfield5">
                <input name="frais_tr" type="text" id="frais_tr" onkeyup="reset_infos(this.id)"  size="8"  />
                <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span><span class="textfieldMinCharsMsg">Nombre minimal de caractères non atteint.</span><span class="textfieldMaxCharsMsg">Le nombre maximum de caractères a été dépassé.</span></span> prix en &euro; &nbsp;(ex. 12.34)
              - cf.  le site <a href="http://www.simbad.cnrs.fr/" target="_blank">FRAM-CNRS</a>
              <p><span id="sprytextarea1">
            <textarea name="infos_frais_tr" cols="77" rows="3" class="champ_text_area" id="infos_frais_tr">merci de fournir le plus de détails possible. ex. : 
- vol AR : 150 euros
- transports intérieur : 150 euros
- etc.
            </textarea>
            <span class="textareaRequiredMsg">Le champ est obligatoire.</span></span></p>      
              <p><strong>Frais &amp; détails des frais de séjour *</strong><br />
              <span id="sprytextfield6">
              <input name="frais_se" type="text" id="frais_se" onkeyup="reset_infos(this.id)" size="8" />
              <span class="textfieldRequiredMsg">Le champ est obligatoire</span><span class="textfieldInvalidFormatMsg">Format non valide.</span></span> prix en &euro;</p>
              <p><span id="sprytextarea3">
                <textarea name="infos_frais_se" cols="77" rows="3" class="champ_text_area" id="infos_frais_se">merci de fournir le plus de détails possible. ex. : 
- logement : 15 euros par jour x 20 jours
- consultants : 10 euros par séance x 20 séances
- nourriture : 180 euros
- etc.</textarea>
              <span class="textareaRequiredMsg">Le champ est obligatoire.</span></span></p>              </td>
            <!-- fin autres renseignements-->
            </tr>
            
            <tr>
              <td colspan="2" valign="top"><input name="type_mission" type="hidden" id="type_mission" value="<?php echo $_GET['type_mission']; ?>" />
                <input name="date_demande" type="hidden" id="date_demande" value="<?php echo (date("Y")."-".date("m")."-".date("d")); ?>" />
                  <input type="submit" name="envoyer" id="envoyer" value="VALIDER la demande" />
                  <input type="hidden" name="MM_insert" value="form_dmd_mission" />
                &nbsp;<em>(*)    les champs  marqués par une astérisque sont obligatoires</em></td>
            </tr>
          </table>
        </form>    </td>
  </tr>
  <?php } // fin du formulaire ?>
  <?php } // fin du if  ?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "date", {format:"dd/mm/yyyy"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "real", {minValue:0});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "real", {minValue:0});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "real", {minValue:0});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "date", {format:"dd/mm/yyyy"});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "date", {format:"dd/mm/yyyy"});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "date", {format:"dd/mm/yyyy"});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {invalidValue:"-1"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea3 = new Spry.Widget.ValidationTextarea("sprytextarea3");
//-->
</script>
</body>
</html>

