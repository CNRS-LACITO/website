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


$query_liste_pub = sprintf("SELECT * FROM bdd WHERE Annee LIKE '2012' or Annee LIKE '2013'  ORDER BY Annee DESC, Auteurs ASC, Titre ASC", $colname_liste_pub);


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
<html><!-- InstanceBegin template="/Templates/seconde-navgauche.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Productions scientifiques du Lacito</title>
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

  <!--<div class="bandeau-liens" id="divbandeau-lienCNRS"> <a href="http://www.cnrs.fr/fr/organisme/presentation.htm" target="_blank">Le CNRS</a> </div>
<div id="divbandeau-traitvert1"><img src="../z-outils/images/charte/trait-vertical.gif"></div>
  <div id="divbandeau-lienAccueil" class="bandeau-liens"> <a href="http://www.cnrs.fr/shs/" target="_blank">Accueil SHS</a> </div>
<div id="divbandeau-traitvert2"><img src="../z-outils/images/charte/trait-vertical.gif"></div>
  <div id="divbandeau-lienAutres" class="bandeau-liens"><a href="http://www.cnrs.fr/fr/une/sites-cnrs.htm" target="_blank">Autres sites CNRS</a></div> 
<div id="divbandeau-traitvert3"><img src="../z-outils/images/charte/trait-vertical.gif"></div>-->

<table height="100%" width="100%"  bgcolor="#CCCCCC">
<tr>
<td >


<table height="100%" width="1000"  border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr>
   
    <td background="../z-outils/images/charte/bandeau-haut-droit_ok.gif" align="left" ><table width="1000"><tr><td width="454" valign="top" class="Xnavhaut"><p> <a href="../index.htm"><img src="../images/logos/Logo_Lacito.png" alt="aa" width="141" height="59" hspace="10" border="0" align="left"></a></p> <span class="Style1">Langues et civilisations<br>
        à tradition orale <br>
        (UMR7107)</span></p></td><td width="534" class="bandeau-liens">&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.cnrs.fr/fr/organisme/presentation.htm" target="_blank">Le CNRS</a>
&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.cnrs.fr/shs/" target="_blank">Accueil SHS</a>&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.cnrs.fr/fr/une/sites-cnrs.htm" target="_blank">Autres sites CNRS</a>
&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">
&nbsp;&nbsp;&nbsp;&nbsp;
</td></tr></table>
        
     </td>
    <!--<img src="../z-outils/images/charte/bandeau-haut-droit.gif" alt="" width="100%" height="66" border="0"/></td>-->
    
  </tr>
  
  <tr>
   
    
    <td width="1000"  align="center" height="125" ><!-- InstanceBeginEditable name="Visuel" --><span class="Xchemin"><img src="../images/bandeaux/vient_de_paraitre.jpg"  width="100%" height="142" border="0"></span><!-- InstanceEndEditable --></td>
   
  </tr>
  <tr>
  <td>
  
  <table border="0" cellpadding="3" cellspacing="0"  width="100%">
      			<tr>
                <td colspan="7" align="center">
                <!--<table width="100%"><tr>
                <td height="55" align="left"><a href="http://www.cnrs.fr" target="_blank"><img src="../images/logos/logo-cnrs.jpg" alt="cnrs" width="88" height="36" border="0"/></a></td>
                <td align="center"><a href="http://www.univ-paris3.fr/1207750810633/0/fiche___defaultstructureksup/&RH=1235649944785" target="_blank"><img src="../images/logos/logo-paris-3.gif" alt="paris3" width="150" height="53" border="0"/></a></td>
                <td align="center"><a href="http://www.paris-sorbonne.fr/fr/spip.php?rubrique1096" target="_blank"><img src="../images/logos/logo-paris-4.gif" alt="paris4" width="150" height="53" border="0"/></a></td>
                 <td align="right"><a href="http://www.typologie.cnrs.fr/" target="_blank"><img src="../images/logos/logo-typo.gif" alt="tul" width="150" height="53" border="0"/></a></td>
                 </tr></table>-->
                </td>
                </tr>
                <tr>
       	 			<td width="11%" height="50" align="left" class="Xnavgauche"> <a href="http://www.cnrs.fr" target="_blank"><img src="../images/logos/cnrs.jpg" alt="cnrs" width="65" height="64"  border="0"/></a></td>
                    <td width="10%" height="50" align="left" class="Xnavgauche"> <a href="http://www.univ-paris3.fr/1207750810633/0/fiche___defaultstructureksup/&RH=1235649944785" target="_blank"><img src="../images/logos/paris3.jpg" alt="paris3" width="63" height="45"  border="0"/></a></td>
                    <td width="9%" height="50" align="left" class="Xnavgauche"><a href="http://www.paris-sorbonne.fr/fr/spip.php?rubrique1096" target="_blank"><img src="../images/logos/paris4.jpg" alt="paris4" width="57" height="48"  border="0"/></a></td>
                     <td width="9%" class="Xnavgauche" align="left"><a href="http://www.inalco.fr" target="_blank"><img src="../images/logos/inalco.jpg" alt="inalco" width="87" height="52" border="0"/></a></td>
                    <td width="41%" height="50" align="right" class="Xnavgauche"> <br/>
                    <form name="rechercher-spm"
action="http://lacito.vjf.cnrs.fr/moteur/engine.php" method="GET">
				<b>Rechercher </b><input type="hidden" name="action"  value="go">
	<input name ="blork" maxLength="50" size="10" class="text"/><input
name="submit2" type="image" src="../z-outils/images/charte/ok.gif"
align="texttop"
                            border="0" width="20" height="20"/></form></td>
                    <td width="10%" height="50" align="right" class="Xnavgauche"><a href="../INTRANET/index.htm"><b style="text-decoration : none">Intranet</b> <img border="0" src="../z-outils/images/boite-outils/icones/intranet.gif" width="18" height="12" alt="Lacito"/></a></td>
                    <td width="10%" class="Xnavgauche" align="right"><a href="Javascript:version()"><img src="../images/logos/eng.gif" alt="English" width="47" height="47"  border="0"></a></td>
      			</tr>
       		</table>
  
  </td>
  </tr>
 
  <tr>
 
    
    <td class="Xchemin" height="60"> 
    <br/><br/><br/><br/>
    &nbsp;<!-- InstanceBeginEditable name="Chemin" --><a href="../index.htm">Accueil</a> &gt; Acc&egrave;s aux productions scientifiques <!-- InstanceEndEditable --></td>
   
  </tr>
  
  <tr>
  
    
    <td width="1056" class="Xtextcourant" valign="top" ><div id="ZonePrint">
      <!-- InstanceBeginEditable name="Contenu" -->
      <table width="100%"  border="0" cellspacing="0" cellpadding="10">
        <tr>
          <td><h1 align="center"><a name="up"></a>Productions scientifiques des membres du Lacito</h1>
            <p align="center">&nbsp;</p>
          <p align="center" class="intertitre">Acc&egrave;s &agrave; la liste de<strong class="Style3"> toutes les productions scientifiques du Lacito</strong> (<a href="publications_liste.php?NomAuteur=&NomPrenomAuteur=TOUT LE LACITO">ici</a><strong>) –– </strong><strong class="Style3">Articles et chapitres d'ouvrages récents</strong> (<a href="#articles">ici</a>)<br>
          </p>
          <p>L'ensemble des <strong>publications d&eacute;pos&eacute;es sur HAL</strong> par les membres du Lacito est consultable <a href="http://hal.archives-ouvertes.fr/lab/lacito/" target="_blank">ici</a>.          </p>
          <p><img src="../images/icones-CNRS/derneirespubli.gif" width="15" height="16" alt="publi">Le fonds documentaire du <strong>centre de documentation AGH</strong> est consultable <a href="http://www.vjf.cnrs.fr/clt/html/doc/catalogue.htm" target="_blank">ici</a>.<br>
Il comprend la <strong>Bibliothèque du Lacito</strong> réunissant environ 12 000 documents (8 389 sans les périodiques) </p>
          <table width="100%" border="0" cellpadding="8" cellspacing="0" class="table-avec-bordures">
            <tr>
                <td><ul class="liste-liens">
                  <li><a href="publications_liste.php?NomAuteur=adamou&NomPrenomAuteur=Evangelia ADAMOU">Evangelia ADAMOU</a></li>
                  <li><a href="publications_liste.php?NomAuteur=behaghel&NomPrenomAuteur=Anne BEHAGHEL-DINDORF">Anne BEHAGHEL-DINDORF</a></li>
                  <li><a href="publications_liste.php?NomAuteur=bellahsene&NomPrenomAuteur=Linda BELLAHSENE">Linda BELLAHSENE</a> </li>
                  <li><a href="publications_liste.php?NomAuteur=bouquiaux&NomPrenomAuteur=Luc BOUQUIAUX">Luc BOUQUIAUX</a></li>
                  <li><a href="publications_liste.php?NomAuteur=bril&NomPrenomAuteur=Isabelle BRIL">Isabelle BRIL</a></li>
                  <li><a href="publications_liste.php?NomAuteur=capo&NomPrenomAuteur=Manon CAPO">Manon CAPO</a></li>
                  <li><a href="publications_liste.php?NomAuteur=charpentier jean-michel&NomPrenomAuteur=Jean-Michel CHARPENTIER">Jean-Michel CHARPENTIER</a> </li>
                  <li><a href="publications_liste.php?NomAuteur=injoo&NomPrenomAuteur=Injoo CHOI-JONIN">Injoo CHOI-JONIN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=colombel&NomPrenomAuteur=Veronique de COLOMBEL">Véronique de COLOMBEL</a></li>
                  <li><a href="publications_liste.php?NomAuteur=coyaud&NomPrenomAuteur=Maurice COYAUD">Maurice COYAUD</a> </li>
                  <li><a href="publications_liste.php?NomAuteur=daladier&NomPrenomAuteur=Anne DALADIER">Anne DALADIER</a></li>
                  <li><a href="publications_liste.php?NomAuteur=dunham&NomPrenomAuteur=Margaret DUNHAM">Margaret DUNHAM</a></li>
                  <li><a href="publications_liste.php?NomAuteur=fernandez&NomPrenomAuteur=M.M. Jocelyne Fernandez-Vest">M.M. Jocelyne FERNANDEZ-VEST</a> </li>
                  <li><a href="publications_liste.php?NomAuteur=fontaine laurent&NomPrenomAuteur=Laurent FONTAINE">Laurent FONTAINE</a> </li>
                  <li><a href="publications_liste.php?NomAuteur=FRANÇOIS alexandre&NomPrenomAuteur=Alexandre FRANÇOIS">Alexandre FRANÇOIS</a></li>
                  <li><a href="publications_liste.php?NomAuteur=guarisma&NomPrenomAuteur=Gladys GUARISMA">Gladys GUARISMA</a></li>
                </ul>                </td>
                <td valign="top"><ul class="liste-liens">
                  <li><a href="publications_liste.php?NomAuteur=guentcheva&NomPrenomAuteur=Zlatka GUENTCHEVA">Zlatka GUENTCHEVA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=GUÉRIN&NomPrenomAuteur=Françoise GUÉRIN">Françoise GUÉRIN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=GUÉZENNEC&NomPrenomAuteur=Nathalie GUÉZENNEC">Nathalie GUÉZENNEC</a></li>
                  <li><a href="publications_liste.php?NomAuteur=HENRI Agnès&NomPrenomAuteur=Agnès HENRI">Agnès HENRI</a></li>
                  <li><a href="publications_liste.php?NomAuteur=tun&NomPrenomAuteur=San San HNI TUN">San San HNIN TUN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=iwasa&NomPrenomAuteur=Kazue IWASA">Kazue IWASA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=jacquesson&NomPrenomAuteur=Francois JACQUESSON">François JACQUESSON</a></li>
                  <li><a href="publications_liste.php?NomAuteur=kabore&NomPrenomAuteur=Su-toog-nooma Kukka KABORE (alias Raphael KABORE)">Su-toog-nooma Kukka KABORE</a></li>
                  <li><a href="publications_liste.php?NomAuteur=karangwa&NomPrenomAuteur=Jean-de-Dieu KARANGWA">Jean-de-Dieu KARANGWA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=kirtchuk&NomPrenomAuteur=Pablo I. KIRTCHUK-HALEVI">Pablo I. KIRTCHUK-HALEVI</a></li>
                  <li><a href="publications_liste.php?NomAuteur=kozareva&NomPrenomAuteur=Yordanka KOZAREVA">Yordanka KOZAREVA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=lacroix&NomPrenomAuteur=René LACROIX">René LACROIX</a></li>
                  <li><a href="publications_liste.php?NomAuteur=lahaussois&NomPrenomAuteur=Aimee LAHAUSSOIS">Aimée LAHAUSSOIS</a></li>
                  <li><a href="publications_liste.php?NomAuteur=lebarbier&NomPrenomAuteur=Micheline LEBARBIER">Micheline LEBARBIER</a></li>
                  <li><a href="publications_liste.php?NomAuteur=leblic&NomPrenomAuteur=Isabelle LEBLIC">Isabelle LEBLIC</a></li>
                  <li><a href="publications_liste.php?NomAuteur=le guennec&NomPrenomAuteur=Francoise LE GUENNEC-COPPENS">Françoise LE GUENNEC-COPPENS</a></li>
                </ul>                </td>
                <td valign="top"><ul class="liste-liens">
                  <li><a href="publications_liste.php?NomAuteur=LEMARÉCHAL&NomPrenomAuteur=Alain LEMARÉCHAL">Alain LEMARÉCHAL</a></li>
                  <li><a href="publications_liste.php?NomAuteur=leroy jacqueline&NomPrenomAuteur=Jacqueline LEROY">Jacqueline LEROY</a></li>
                  <li><a href="publications_liste.php?NomAuteur=lux&NomPrenomAuteur=Cécile LUX">Cécile LUX</a></li>
                  <li><a href="publications_liste.php?NomAuteur=mahieu&NomPrenomAuteur=Marc-Antoine MAHIEU">Marc-Antoine MAHIEU</a></li>
                  <li><a href="publications_liste.php?NomAuteur=masquelier&NomPrenomAuteur=Bertrand MASQUELIER">Bertrand MASQUELIER</a></li>
                  <li><a href="publications_liste.php?NomAuteur=mazaudon&NomPrenomAuteur=Martine MAZAUDON">Martine MAZAUDON</a></li>
                  <li><a href="publications_liste.php?NomAuteur=michailovsky&NomPrenomAuteur=Boyd MICHAILOVSKY">Boyd MICHAILOVSKY</a></li>
                  <li><a href="publications_liste.php?NomAuteur=michaud&NomPrenomAuteur=Alexis MICHAUD">Alexis MICHAUD</a></li>
                  <li><a href="publications_liste.php?NomAuteur=mougin&NomPrenomAuteur=Sylvie MOUGIN">Sylvie MOUGIN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=moyse&NomPrenomAuteur=Claire MOYSE-FAURIE">Claire MOYSE-FAURIE</a></li>
                  <li><a href="publications_liste.php?NomAuteur=mtavangu&NomPrenomAuteur=Norbert MTAVANGU">Norbert MTAVANGU</a></li>
                  <li><a href="publications_liste.php?NomAuteur=mukherjee&NomPrenomAuteur=Pritwindra MUKHERJEE">Prithwindra MUKHERJEE</a></li>
                  <li><a href="publications_liste.php?NomAuteur=appasamy&NomPrenomAuteur=Appasamy MURUGAIYAN">Appasamy MURUGAIYAN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=NAÏM&NomPrenomAuteur=Samia NAÏM">Samia NAÏM</a></li>
                  <li><a href="publications_liste.php?NomAuteur=ogier&NomPrenomAuteur=Julia OGIER-GUINDO">Julia OGIER-GUINDO</a></li>
                  <li><a href="publications_liste.php?NomAuteur=oisel&NomPrenomAuteur=Guillaume OISEL">Guillaume OISEL</a></li>
                </ul></td>
                <td valign="top"><ul class="liste-liens">
                  <li><a href="publications_liste.php?NomAuteur=ergin&NomPrenomAuteur=Ergin ÖPENGIN">Ergin ÖPENGIN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=pain&NomPrenomAuteur=Frédéric PAIN">Frédéric PAIN</a></li>
                  <li><a href="publications_liste.php?NomAuteur=petrovic&NomPrenomAuteur=Marijana PETROVIC">Marijana PETROVIC</a></li>
                  <li><a href="publications_liste.php?NomAuteur=pilot&NomPrenomAuteur=Christiane PILOT-RAICHOOR">Christiane PILOT-RAICHOOR</a></li>
                  <li><a href="publications_liste.php?NomAuteur=popova&NomPrenomAuteur=Assia POPOVA">Assia POPOVA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=issa&NomPrenomAuteur=Odile RACINE-ISSA">Odile RACINE-ISSA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=randa&NomPrenomAuteur=Vladimir RANDA">Vladimir RANDA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=rebuschi&NomPrenomAuteur=Georges REBUSCHI">Georges REBUSCHI</a></li>
                  <li><a href="publications_liste.php?NomAuteur=rivierre jean-claude&NomPrenomAuteur=Jean-Claude RIVIERRE">Jean-Claude RIVIERRE</a></li>
                  <li><a href="publications_liste.php?NomAuteur=sethupathy&NomPrenomAuteur=Elisabeth SETHUPATHY">Elisabeth SETHUPATHY</a></li>
                  <li><a href="publications_liste.php?NomAuteur=souag&NomPrenomAuteur=Lameen SOUAG">Lameen SOUAG</a></li>
                  <li><a href="publications_liste.php?NomAuteur=taine-cheikh&NomPrenomAuteur=Catherine TAINE-CHEIKH">Catherine TAINE-CHEIKH</a></li>
                  <li><a href="publications_liste.php?NomAuteur=thomas&NomPrenomAuteur=Jacqueline M.C. THOMAS">Jacqueline M.C. THOMAS</a></li>
                  <li><a href="publications_liste.php?NomAuteur=tournadre&NomPrenomAuteur=Nicolas TOURNADRE">Nicolas TOURNADRE</a></li>
                  <li><a href="publications_liste.php?NomAuteur=valma&NomPrenomAuteur=Eleni VALMA">Eleni VALMA</a></li>
                  <li><a href="publications_liste.php?NomAuteur=vittrant&NomPrenomAuteur=Alice VITTRANT">Alice VITTRANT</a></li>
                </ul></td>
              </tr>
          </table>
          <p>N.B. La base bibliographique consultée au travers de cette page a été créée grâce au centre de documentation A.-G. Haudricourt (Céline Lemasson puis Élodie Chacon). Elle ne comprenait au départ que les documents consultables au centre AGH, indiqués par une cote <span class="intertitre"> (ex. <strong>P355 LAC</strong>)</span>. -- Vérification et compléments (A. Behaghel-Dindorf)</p>
          <p>&nbsp;</p>
          <p><strong><a name="articles"></a>Articles et chapitres d'ouvrages récents</strong> (année en cours et année précédente) <a href="#up"><img src="../images/icones/fleche-haut.gif" alt="toup" width="10" height="9" border="0"></a></p></td>
        </tr>
      </table>
      
      
      
   <b><?php echo $_GET['NomPrenomAuteur'];?></b></br>

	<?php if ($totalRows_liste_pub > 0) { ?>
              <table width="100%"  border="0" cellspacing="0" cellpadding="1">
                <tr valign="top">
                 
                
                <?php do { 
				$row_liste_pub['Identifiant']= $row_liste_pub['Identifiant'];
					$row_liste_pub['Titre']= $row_liste_pub['Titre'];
					 $row_liste_pub['s']= $row_liste_pub['s']; 
					 $row_liste_pub['u']= $row_liste_pub['u'];
					 $row_liste_pub['t']= $row_liste_pub['t']; 
					 $row_liste_pub['o']= $row_liste_pub['o'];
					 $row_liste_pub['Auteurs']= $row_liste_pub['Auteurs']; 
					 $row_liste_pub['Collation']= $row_liste_pub['Collation']; 
					 $row_liste_pub['Annee']= $row_liste_pub['Annee']; 
					 $row_liste_pub['URL']= $row_liste_pub['URL']; 
					 // 07/06/11 P.Grison zone_libre
					 $row_liste_pub['zone_libre']= $row_liste_pub['zone_libre']; 
					 $row_liste_pub['cote']= $row_liste_pub['cote']; 
				
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
 </tr>
 <tr>
        <td>
        <table border="0">
        <tr>
    <td width="1000" class="XnavgaucheIcones" align="center"><img src="../z-outils/images/charte/icones-01.gif" alt="" width="150" height="55" border="0" usemap="#Map2"></td>
   
  </tr>
  </table>
  </td>
  </tr> 
</table>

<p>
  <script type='text/javascript'>function Go(){return}</script>
  <script type='text/javascript' src='../z-outils/deroulants/top_pos_var.js'></script>
  <script type='text/javascript' src='../z-outils/deroulants/menu_var.js'></script>
  <script type='text/javascript' src='../z-outils/deroulants/menu9_com.js'></script>
</p>
<noscript>
 <p>Your browser does not support script</p>
</noscript>



<!--<div id="divnavgauche-spec">
   <table border="0" cellpadding="0" cellspacing="0"  width="150">
     <tr>
       <td height="2"></td>
     </tr>
     <tr>
       	<td width="100%"  class="Xnavgauche" >
        	<table border="0" cellpadding="10" cellspacing="0"  width="100%">
      			<tr>
       	 			<td width="100%" class="Xnavgauche"> <a href="../INTRANET/index.htm"><b style="color:#A80924;text-decoration : none">Intranet</b> <img border="0" src="../z-outils/images/boite-outils/icones/intranet.gif" width="18" height="12" alt="Lacito"/></a></td>
      			</tr>
       		</table>
       </td>
     </tr>
   
  </table>
  
  
</div>-->
 

 
<!--<div id="divnavgauche-searchLabo">
  <b style="color:#A80924">Rechercher </b>
  <input type="hidden" name="action"  value="go"/>
	<input name ="blork" maxLength="50" size="10" class="text"/><input name="submit2" type="image" src="../z-outils/images/charte/ok.gif" align="texttop" 
                             border="0" width="20" height="20"/>
   
</div>-->
 
 
 
 
 
 <!-- <div id="divnavgauche-language">
 <p class="intertitre" align="center"><a href="Javascript:version()"><img src="../images/logos/eng.gif" alt="English" width="37" height="33" border="0"></a></p>
</div>-->
 




<map name="Map2">
  <area shape="rect" coords="28,23,46,43" href="javascript:impression()" alt="Imprimer">
  <area shape="rect" coords="49,22,66,42" href="javascript:writemail('vjf.cnrs.fr','behaghel','',1);" alt="Contacter le webmestre">
  <area shape="rect" coords="68,23,85,43" href="../pratique/index.htm" alt="Plan du site">
  <area shape="rect" coords="87,23,105,43" href="../pratique/credits.htm" alt="Crédits">
  <area shape="rect" coords="9,24,25,43" href="../index.htm" alt="Accueil">
</map>


<!--<div id="divnavhaut-nom-labo">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top" class="Xnavhaut"><p> <a href="../index.htm"><img src="../images/logos/Logo_Lacito.jpg" alt="aa" width="141" height="59" hspace="10" border="0" align="left"></a></p> <span class="Style1">Langues et civilisations<br>
        à tradition orale <br>
        (UMR7107)</span></p></td>
    </tr>
  </table>
  </div>-->
  </td>
  </tr>
</table>






</body>
<!-- InstanceEnd --></html>