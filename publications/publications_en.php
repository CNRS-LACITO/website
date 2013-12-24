<?php
require_once('Connections/connect_publiCNRS.php');

$currentPage = $_SERVER["PHP_SELF"];

$pageNum_liste_pub = 0;
if (isset($_GET['pageNum_liste_pub'])) {
	$pageNum_liste_pub = $_GET['pageNum_liste_pub'];
	
  
}
$startRow_liste_pub = $pageNum_liste_pub * 
$colname_liste_pub = "Auteurs";
if (isset($_GET['NomAuteur'])) {
  $colname_liste_pub = (get_magic_quotes_gpc()) ? $_GET['NomAuteur'] : addslashes($_GET['NomAuteur']);
}
mysql_select_db($database_connect_publiCNRS, $connect_publiCNRS);


$query_liste_pub = sprintf("SELECT * FROM bdd WHERE Annee LIKE '2011' or Annee LIKE '2012'  ORDER BY Annee DESC, Auteurs ASC, Titre ASC", $colname_liste_pub);


$liste_pub = mysql_query($query_liste_pub, $connect_publiCNRS) or die(mysql_error());
$row_liste_pub = mysql_fetch_assoc($liste_pub);
if (isset($_GET['totalRows_liste_pub'])) {
  $totalRows_liste_pub = $_GET['totalRows_liste_pub'];
} else {
  $all_liste_pub = mysql_query($query_liste_pub);
  $totalRows_liste_pub = mysql_num_rows($all_liste_pub);
}
$totalPages_liste_pub = ceil($totalRows_liste_pub/$maxRows_liste_pub)-1;
$queryString_liste_pub = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_liste_pub") == false && stristr($param, "totalRows_liste_pub") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_liste_pub = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_liste_pub = sprintf("&totalRows_liste_pub=%d%s", $totalRows_liste_pub, $queryString_liste_pub);

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
                      "http://www.w3.org/TR/html4/strict.dtd">
<html><!-- InstanceBegin template="/Templates/seconde-navgauche_en.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Scientific productions of Lacito</title>
<!-- InstanceEndEditable --><link rel="stylesheet" type="text/css" href="../styles/xcharte.css">
<link rel="stylesheet" type="text/css" href="../styles/styles.css">
<script src="../Scripts/Change_Version.js" type="text/javascript"></script>
<script language="JavaScript" src="../z-outils/init.js"></script>
<script language="JavaScript" src="../z-outils/outils.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
.Style3 {color: #FF0000; font-weight: bold; }
</style>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.Style1 {color: #820E12}
-->
</style>
</head>
<body marginwidth="0" marginheight="0" >
<div class="bandeau-liens" id="divbandeau-lienCNRS"> <a href="http://www.cnrs.fr/index.php" target="_blank">CNRS</a></div>
<div id="divbandeau-traitvert1"><img src="../z-outils/images/charte/trait-vertical.gif"></div>
<div id="divbandeau-lienAccueil" class="bandeau-liens"> <a href="http://www.cnrs.fr/shs/" target="_blank">INSHS home</a></div>
<div id="divbandeau-traitvert2"><img src="../z-outils/images/charte/trait-vertical.gif"></div>
<div id="divbandeau-lienAutres" class="bandeau-liens"><a href="http://www2.cnrs.fr/band/5.htm" target="_blank">Other web sites</a></div>
<div id="divbandeau-traitvert3"><img src="../z-outils/images/charte/trait-vertical.gif"></div>

<table height="900" width="751"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="65" alt=""></td>
    <td colspan="2"><img src="../z-outils/images/charte/bandeau-haut-droit.gif" alt="" width="100%" border="0"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td colspan="2" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="62"></td>
    <td width="599" height="1"><!-- InstanceBeginEditable name="Visuel" --><span class="Xchemin"><img src="../images/bandeaux/vient_de_paraitre.jpg" width="100%"><!-- InstanceEndEditable --></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="62"></td>
  </tr>
  <tr>
    <td width="150"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="599" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td class="Xchemin"> &nbsp;<!-- InstanceBeginEditable name="Chemin" --><a href="../index_en.htm">Home</a> &gt; Scientific productions <!-- InstanceEndEditable --></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="30"></td>
  </tr>
  <tr>
    <td height="1"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td height="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td height="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="599" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="599" rowspan="2" class="Xtextcourant" valign="top"><div id="ZonePrint">
      <!-- InstanceBeginEditable name="Contenu" -->
     <table width="100%"  border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td><h1 align="center">Scientific productions of Lacito members</h1>
            <p align="center">&nbsp;</p>
          <p align="center" class="intertitre">Access to the list of <span class="Style3">all Lacito scientific productions</span> (<a href="publications_liste_en.php?NomAuteur=&NomPrenomAuteur=ALL LACITO SCIENTIFIC PRODUCTIONS">here</a>) <strong><br>
              <span class="Style3">Latest articles and books' chapters</span></strong> (<a href="#articles">here</a>)</p>
          <p>All the <strong>publications deposited on HAL</strong> by Lacito members (<a href="http://hal.archives-ouvertes.fr/lab/lacito/" target="_blank">here</a>).          </p>
          <p>The  catalog of <strong>the A.-G. Haudricourt Documentation Cente</strong>r can be found <a href="http://www.vjf.cnrs.fr/clt/html/doc/catalogue.htm" target="_blank">here</a>, where you can find  the <strong>Lacito library</strong> with 12,000 documents (8,389 without periodicals) </p>
          <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table-avec-bordures">
            <tr>
                <td><ul class="liste-liens">
                  <li><a href="publications_liste_en.php?NomAuteur=adamou&NomPrenomAuteur=Evangelia ADAMOU">Evangelia ADAMOU</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=anakesa&NomPrenomAuteur=Apollinaire ANAKESA">Apollinaire ANAKESA</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=behaghel&NomPrenomAuteur=Anne BEHAGHEL-DINDORF">Anne BEHAGHEL-DINDORF</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=bellahsene&NomPrenomAuteur=Linda BELLAHSENE">Linda BELLAHSENE</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=bouquiaux&NomPrenomAuteur=Luc BOUQUIAUX">Luc BOUQUIAUX</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=bril&NomPrenomAuteur=Isabelle BRIL">Isabelle BRIL</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=charpentier jean-michel&NomPrenomAuteur=Jean-Michel CHARPENTIER">Jean-Michel CHARPENTIER</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=injoo&NomPrenomAuteur=Injoo CHOI-JONIN">Injoo CHOI-JONIN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=colombel&NomPrenomAuteur=Veronique de COLOMBEL">V&eacute;ronique de COLOMBEL</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=coyaud&NomPrenomAuteur=Maurice COYAUD">Maurice COYAUD</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=daladier&NomPrenomAuteur=Anne DALADIER">Anne DALADIER</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=dunham&NomPrenomAuteur=Margaret DUNHAM">Margaret DUNHAM</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=fernandez&NomPrenomAuteur=M.M. Jocelyne Fernandez-Vest">M.M. Jocelyne FERNANDEZ-VEST</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=fontaine laurent&NomPrenomAuteur=Laurent FONTAINE">Laurent FONTAINE</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=francois alexandre&NomPrenomAuteur=Alexandre FRANCOIS">Alexandre FRAN&Ccedil;OIS</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=guarisma&NomPrenomAuteur=Gladys GUARISMA">Gladys GUARISMA</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=guentcheva&NomPrenomAuteur=Zlatka GUENTCHEVA">Zlatka GUENTCHEVA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=guerin&NomPrenomAuteur=Francoise GUERIN">Fran</a><a href="publications_liste_en.php?NomAuteur=jacquesson&NomPrenomAuteur=Francois JACQUESSON">&ccedil;</a><a href="publications_liste_en.php?NomAuteur=guerin&NomPrenomAuteur=Francoise GUÉRIN">oise GUÉRIN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=guezennec&NomPrenomAuteur=Nathalie GUÉZENNEC">Nathalie GUÉZENNEC</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=henri agnes&NomPrenomAuteur=Agnès HENRI">Agnès HENRI</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=tun&NomPrenomAuteur=San San HNI TUN">San San HNIN TUN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=iwasa&NomPrenomAuteur=Kazue IWASA">Kazue IWASA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=jacquesson&NomPrenomAuteur=Francois JACQUESSON">Fran&ccedil;ois JACQUESSON</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=kabore&NomPrenomAuteur=Su-toog-nooma Kukka KABORE (alias Raphael KABORE)">S&ucirc;-t&ocirc;&ocirc;g-nooma Kukka KABORE</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=karangwa&NomPrenomAuteur=Jean-de-Dieu KARANGWA">Jean-de-Dieu KARANGWA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=kirtchuk&NomPrenomAuteur=Pablo I. KIRTCHUK-HALEVI">Pablo I. KIRTCHUK-HALEVI</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=kozareva&NomPrenomAuteur=Yordanka KOZAREVA">Yordanka KOZAREVA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=lacroix&NomPrenomAuteur=René LACROIX">René LACROIX</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=lahaussois&NomPrenomAuteur=Aimee LAHAUSSOIS">Aim&eacute;e LAHAUSSOIS</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=lebarbier&NomPrenomAuteur=Micheline LEBARBIER">Micheline LEBARBIER</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=leblic&NomPrenomAuteur=Isabelle LEBLIC">Isabelle LEBLIC</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=le guennec&NomPrenomAuteur=Francoise LE GUENNEC-COPPENS">Fran&ccedil;oise LE GUENNEC-COPPENS</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=lemarechal&NomPrenomAuteur=Alain LEMARECHAL">Alain LEMARECHAL</a></li>
                </ul>                </td>
                <td valign="top"><ul class="liste-liens">
                  <li><a href="publications_liste_en.php?NomAuteur=leroy jacqueline&NomPrenomAuteur=Jacqueline LEROY">Jacqueline LEROY</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=lux&NomPrenomAuteur=Cécile LUX">Cécile LUX</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=mahieu&NomPrenomAuteur=Marc-Antoine MAHIEU">Marc-Antoine MAHIEU</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=masquelier&NomPrenomAuteur=Bertrand MASQUELIER">Bertrand MASQUELIER</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=mazaudon&NomPrenomAuteur=Martine MAZAUDON">Martine MAZAUDON</a></li>
                    <li><a href="publications_liste_en.php?NomAuteur=michailovsky&NomPrenomAuteur=Boyd MICHAILOVSKY">Boyd MICHAILOVSKY</a></li>
                    <li><a href="publications_liste_en.php?NomAuteur=michaud&NomPrenomAuteur=Alexis MICHAUD">Alexis MICHAUD</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=mougin&NomPrenomAuteur=Sylvie MOUGIN">Sylvie MOUGIN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=moyse&NomPrenomAuteur=Claire MOYSE-FAURIE">Claire MOYSE-FAURIE</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=mtavangu&NomPrenomAuteur=Norbert MTAVANGU">Norbert MTAVANGU</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=mukherjee&NomPrenomAuteur=Pritwindra MUKHERJEE">Prithwindra MUKHERJEE</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=appasamy&NomPrenomAuteur=Appasamy MURUGAIYAN">Appasamy MURUGAIYAN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=naim&NomPrenomAuteur=Samia NAIM">Samia NAIM</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=ogier&NomPrenomAuteur=Julia OGIER-GUINDO">Julia OGIER-GUINDO</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=oisel&NomPrenomAuteur=Guillaume OISEL">Guillaume OISEL</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=ergin&NomPrenomAuteur=Ergin ÖPENGIN">Ergin ÖPENGIN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=pain&NomPrenomAuteur=Frédéric PAIN">Frédéric PAIN</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=paulian&NomPrenomAuteur=Christiane PAULIAN">Christiane PAULIAN</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=petrovic&NomPrenomAuteur=Marijana PETROVIC">Marijana PETROVIC</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=pilot&NomPrenomAuteur=Christiane PILOT-RAICHOOR">Christiane PILOT-RAICHOOR</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=popova&NomPrenomAuteur=Assia POPOVA">Assia POPOVA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=issa&NomPrenomAuteur=Odile RACINE-ISSA">Odile RACINE-ISSA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=randa&NomPrenomAuteur=Vladimir RANDA">Vladimir RANDA</a> </li>
                  <li><a href="publications_liste_en.php?NomAuteur=rebuschi&NomPrenomAuteur=Georges REBUSCHI">Georges REBUSCHI</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=rivierre jean-claude&NomPrenomAuteur=Jean-Claude RIVIERRE">Jean-Claude RIVIERRE</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=sauvageot&NomPrenomAuteur=Serge SAUVAGEOT">Serge SAUVAGEOT</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=sethupathy&NomPrenomAuteur=Elisabeth SETHUPATHY">Elisabeth SETHUPATHY</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=taine-cheikh&NomPrenomAuteur=Catherine TAINE-CHEIKH">Catherine TAINE-CHEIKH</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=thomas&NomPrenomAuteur=Jacqueline M.C. THOMAS">Jacqueline M.C. THOMAS</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=tournadre&NomPrenomAuteur=Nicolas TOURNADRE">Nicolas TOURNADRE</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=valma&NomPrenomAuteur=Eleni VALMA">Eleni VALMA</a></li>
                  <li><a href="publications_liste_en.php?NomAuteur=vittrant&NomPrenomAuteur=Alice VITTRANT">Alice VITTRANT</a></li>
                </ul>                </td>
              </tr>
          </table>
          <p class="intertitre">N.B. The publications with a shelf mark  (i.e.. <strong>P355 LAC</strong>) can be consulted in the AGH Documentation Center.<br>
            Verifications and supplements (A. Behaghel-Dindorf, last upd. 30.01.2012).</p>
<p>&nbsp;</p>
          <p><strong><a name="articles"></a>Latest articles and book's chapters</strong> (from this year and from last year)</p></td>
        </tr>
      </table>
      
      
      
    <b><?php echo $_GET['NomPrenomAuteur'];?></b></br>

	<?php if ($totalRows_liste_pub > 0) { ?>
              <table width="100%"  border="0" cellspacing="0" cellpadding="1">
                <tr valign="top">
                 
                
                <?php do { 
				$row_liste_pub['Identifiant']= utf8_encode($row_liste_pub['Identifiant']);
					$row_liste_pub['Titre']= utf8_encode($row_liste_pub['Titre']);
					 $row_liste_pub['s']= utf8_encode($row_liste_pub['s']); 
					 $row_liste_pub['u']= utf8_encode($row_liste_pub['u']);
					 $row_liste_pub['t']= utf8_encode($row_liste_pub['t']); 
					 $row_liste_pub['o']= utf8_encode($row_liste_pub['o']);
					 $row_liste_pub['Auteurs']= utf8_encode($row_liste_pub['Auteurs']); 
					 $row_liste_pub['Collation']= utf8_encode($row_liste_pub['Collation']); 
					 $row_liste_pub['Annee']= utf8_encode($row_liste_pub['Annee']); 
					 $row_liste_pub['URL']= utf8_encode($row_liste_pub['URL']); 
					 // 07/06/11 P.Grison zone_libre
					 $row_liste_pub['zone_libre']= utf8_encode($row_liste_pub['zone_libre']); 
					 $row_liste_pub['cote']= utf8_encode($row_liste_pub['cote']); 
				
				?>
                </tr>
                
                  <?php 
					if(($row_liste_pub['Type']=="COV") or ($row_liste_pub['Type']=="ART")){ ?>
                    <tr valign="top">
                  <td>&nbsp;</td>
                    <td>
                  	<b>
                    <?php
					if($row_liste_pub['Annee'] != '') {echo $row_liste_pub['Annee'].'&nbsp;</b><br>';} ?>
				  	<?php if(trim($row_liste_pub['URL'])!=""){echo "<a href=\"";echo trim($row_liste_pub['URL']);echo"\" target=\"_blank\"><img src='/icons/text.gif' border='0'/></a>";} ?>
				  </td>
                  <td>
					  <?php  if($row_liste_pub['Type']=="COV"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; 					  							 
					  echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; if($row_liste_pub['u']!="") {echo "&nbsp;/&nbsp;"; echo $row_liste_pub['u'];} echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];  
					   // 07/06/11 P.Grison
					   if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					   if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Cote&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
					  } ?>
				  <?php  if($row_liste_pub['Type']=="ART"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];
						  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
						  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Cote&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  ?>
                          
						</td>
                </tr>
               
                
                
						<?php } ?> 
                        <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
				<?php } ?>
					 
				  
                
                <?php } while ($row_liste_pub = mysql_fetch_assoc($liste_pub)); ?>
				  
              </table>
              <?php } // Show if recordset not empty
              if ($totalRows_liste_pub == 0) { // Show if recordset empty ?>
					<p align="left" class="intertitre">&nbsp;</p>
					<p align="left" class="intertitre"><b>r&eacute;sultats :</b> <b>
					<?php echo $totalRows_liste_pub ?></b> </p>
					<p align="left">&gt; aucune  publication n'a &eacute;t&eacute; trouv&eacute;e </p>
					<div align="left">
              <?php } // Show if recordset empty ?>


      
      <!-- InstanceEndEditable --></div>
    </td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="500"></td>
  </tr>
  <tr>
    <td width="150" class="XnavgaucheIcones"><img src="../z-outils/images/charte/icones-01.gif" alt="" width="150" height="55" border="0" usemap="#Map2"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="599" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
</table>
<p>&nbsp;</p>
 <p>&nbsp;</p>
 <div id="divpartenaires" >
   <table width="150"  border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td><a href="http://www.cnrs.fr/index.php" target="_blank"><img src="../images/logos/logo-cnrs.jpg" alt="cnrs" width="150" height="62" border="0"></a></td>
     </tr>
     <tr>
       <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" alt="aa" width="150" height="1"></td>
     </tr>
     <tr>
       <td><a href="http://www.univ-paris3.fr/1207750810633/0/fiche___defaultstructureksup/&RH=1235649944785" target="_blank"><img src="../images/logos/logo-paris-3.gif" alt="paris3" width="150" height="53" border="0"></a></td>
     </tr>
     <tr>
       <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" alt="aa" width="150" height="1"></td>
     </tr>
     <tr>
       <td><a href="http://www.paris-sorbonne.fr/fr/spip.php?rubrique1096" target="_blank"><img src="../images/logos/logo-paris-4.gif" alt="paris4" width="150" height="53" border="0"></a></td>
     </tr>
     <tr>
       <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" alt="aa" width="150" height="1"></td>
     </tr>
     <tr>
       <td><a href="http://www.typologie.cnrs.fr/" target="_blank"><img src="../images/logos/logo-typo.gif" alt="tul" width="150" height="53" border="0"></a></td>
     </tr>
   </table>
 </div>
<p>
     <script type='text/javascript'>function Go(){return}</script>
     <script type='text/javascript' src='../z-outils/deroulants/top_pos_var.js'></script>
     <script type='text/javascript' src='../z-outils/deroulants/menu_var_en.js'></script>
     <script type='text/javascript' src='../z-outils/deroulants/menu9_com.js'></script>
</p>
 <noscript>
 <p>Your browser does not support script</p>
</noscript>
 <div id="divnavgauche-spec">
   <table border="0" cellpadding="0" cellspacing="0"  width="150">
     <tr>
       <td height="2"><img border="0" src="../z-outils/images/boite-outils/pointilles.gif" alt="" width="150" height="3"></td>
     </tr>
     <tr>
       	<td width="100%"  class="Xnavgauche" >
        	<table border="0" cellpadding="10" cellspacing="0"  width="100%">
      			<tr>
       	 			<td width="100%" class="Xnavgauche"><h2><a href="../INTRANET/index.htm">Intranet <img border="0" src="../z-outils/images/boite-outils/icones/intranet.gif" width="18" height="12"
							alt="aa"></a></h2></td>
      			</tr>
       		</table>
       </td>
     </tr>
     <tr>
       <td height="2"><img border="0" src="../z-outils/images/boite-outils/pointilles.gif" alt="" width="150" height="3"></td>
     </tr>
    </table>
 </div>
 <div id="divnavgauche-searchLabo">
   <table cellspacing="0" cellpadding="0" hspace="11" border="0">
     <tr>
     	<td width="100%" class="Xnavgauche"><h2 >Search</h2>
                 <p>On this website</p>
               <br>
      	 </td>
         </tr>
         <tr>
     	 <td>       
				<form name="rechercher-spm" action="http://lacito.vjf.cnrs.fr/moteur/engine_en.php" method="GET">
				<input type="hidden" name="action"  value="go">
				<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td><input name ="blork" maxLength="50" size="10" class="text"></td>
						<td><img border="0" src="../z-outils/images/boite-outils/espaceur.gif" width="10" height="8"
							alt="aa"></td>
						<td><input name="submit2" type="image" src="../z-outils/images/charte/ok.gif" 
                             border="0" width="20" height="20">
						</td>
					</tr>
				</table>
  				</form>
          </td>
        </tr>
       </table>
        <tr>
       <td height="2"><img border="0" src="../z-outils/images/boite-outils/pointilles.gif" alt="" width="150" height="3"></td>
		</tr>

 </div>
 
 <div id="divnavgauche-language">
 <p class="intertitre" align="center"><a href="Javascript:version()"><img src="../images/logos/fra.gif" alt="Fran&ccedil;ais" border="0"></a></p>
 </div>
 
<div id="divnavhaut-nom-labo">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" class="Xnavhaut"><p> <a href="../index_en.htm"><img src="../images/logos/Logo_Lacito.jpg" alt="aa" width="141" height="59" hspace="10" border="0" align="left"></a> <span class="Style1">Langues et civilisations<br>
        à tradition orale <br>
        (UMR7107)</span></p></td>
    </tr>
  </table>
</div>
<map name="Map2">
  <area shape="rect" coords="28,23,46,43" href="javascript:impression()" alt="Print">
  <area shape="rect" coords="49,22,66,42" href="javascript:writemail('vjf.cnrs.fr','behaghel','',1);" alt="Contact us">
  <area shape="rect" coords="68,23,85,43" href="../pratique/index_en.htm" alt="Site Map">
  <area shape="rect" coords="87,23,105,43" href="../pratique/credits_en.htm" alt="Credits">
  <area shape="rect" coords="9,24,25,43" href="../index_en.htm" alt="Home">
</map>
</body>
<!-- InstanceEnd --></html>