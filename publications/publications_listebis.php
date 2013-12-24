<?php
require_once('Connections/connect_publiCNRS.php');

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_liste_pub = 10;
$pageNum_liste_pub = 0;
$Type = "Type";
if (isset($_GET['Type'])) { $Type = $_GET['Type'];}
if (isset($_GET['pageNum_liste_pub'])) {
  $pageNum_liste_pub = $_GET['pageNum_liste_pub'];
}
$startRow_liste_pub = $pageNum_liste_pub * $maxRows_liste_pub;
$colname_liste_pub = "Auteurs";
if (isset($_GET['NomAuteur'])) {
  $colname_liste_pub = (get_magic_quotes_gpc()) ? $_GET['NomAuteur'] : addslashes($_GET['NomAuteur']);
}
mysql_select_db($database_connect_publiCNRS, $connect_publiCNRS);
$query_liste_pub = sprintf("SELECT * FROM bdd WHERE Auteurs LIKE '%%%s%%' AND `Type` = '$Type' ORDER BY Annee DESC", $colname_liste_pub);
$query_limit_liste_pub = sprintf("%s LIMIT %d, %d", $query_liste_pub, $startRow_liste_pub, $maxRows_liste_pub);
$liste_pub = mysql_query($query_limit_liste_pub, $connect_publiCNRS) or die(mysql_error());
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
<html><!-- InstanceBegin template="/Templates/seconde-navgauche-navdroite.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Productions scientifiques du Lacito</title>
<!-- InstanceEndEditable --><link rel="stylesheet" type="text/css" href="../styles/xcharte.css">
<link rel="stylesheet" type="text/css" href="../styles/styles.css">
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
//-->
</script>
<script language="JavaScript" type="text/JavaScript">
<!--
function flvFPW1(){//v1.44
// Copyright 2002-2004, Marja Ribbers-de Vroed, FlevOOware (www.flevooware.nl/dreamweaver/)
var v1=arguments,v2=v1[2].split(","),v3=(v1.length>3)?v1[3]:false,v4=(v1.length>4)?parseInt(v1[4]):0,v5=(v1.length>5)?parseInt(v1[5]):0,v6,v7=0,v8,v9,v10,v11,v12,v13,v14,v15,v16;
v11=new Array("width,left,"+v4,"height,top,"+v5);for (i=0;i<v11.length;i++){v12=v11[i].split(",");
l_iTarget=parseInt(v12[2]);if (l_iTarget>1||v1[2].indexOf("%")>-1){v13=eval("screen."+v12[0]);
for (v6=0;
v6<v2.length;v6++){v10=v2[v6].split("=");if (v10[0]==v12[0]){v14=parseInt(v10[1]);
if (v10[1].indexOf("%")>-1){v14=(v14/100)*v13;
v2[v6]=v12[0]+"="+v14;}}if (v10[0]==v12[1]){v16=parseInt(v10[1]);v15=v6;
}}if (l_iTarget==2){v7=(v13-v14)/2;v15=v2.length;}else if (l_iTarget==3){v7=v13-v14-v16;
}v2[v15]=v12[1]+"="+v7;}}v8=v2.join(",");v9=window.open(v1[0],v1[1],v8);if (v3){v9.focus();
}document.MM_returnValue=false;return v9;}
//-->
</script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body marginwidth="0" marginheight="0" >
  <div class="bandeau-liens" id="divbandeau-lienCNRS"> <a href="http://www.cnrs.fr/" target="_blank">Le CNRS</a> </div>
<div id="divbandeau-traitvert1"><img src="../z-outils/images/charte/trait-vertical.gif"></div>
  <div id="divbandeau-lienAccueil" class="bandeau-liens"> <a href="http://www.cnrs.fr/shs/" target="_blank">Accueil SHS</a> </div>
<div id="divbandeau-traitvert2"><img src="../z-outils/images/charte/trait-vertical.gif"></div>
  <div id="divbandeau-lienAutres" class="bandeau-liens"><a href="http://www2.cnrs.fr/band/5.htm" target="_blank">Autres sites CNRS</a></div> 
  <div id="divbandeau-traitvert3"><img src="../z-outils/images/charte/trait-vertical.gif"></div>

<table width="751"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="150"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="65"></td>
    <td colspan="3"><img src="../z-outils/images/charte/bandeau-haut-droit.gif" alt="" width="600" height="65" border="0"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td colspan="3" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td height="1" colspan="2"><!-- InstanceBeginEditable name="Visuel" --><a href="publications.php"><img src="../images/bandeaux/vient_de_paraitre.jpg" alt="" width="600" height="82" border="0"></a><!-- InstanceEndEditable --></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="150" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="10" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="30"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="30"></td>
    <td colspan="2" class="Xchemin">&nbsp;<!-- InstanceBeginEditable name="Chemin" --> <a href="../index.htm">Accueil</a> &gt; <a href="publications.php">Liste auteurs</a> &gt; Productions scientifiques <!-- InstanceEndEditable --></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="30"></td>
  </tr>
  <tr>
    <td><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="449" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
  <tr>
    <td width="150">&nbsp;</td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td rowspan="2" colspan="2" class="Xtextcourant" width="600">	<div id="divXnavdroite"><!-- InstanceBeginEditable name="MenuDroit" --><!-- InstanceEndEditable --></div>
      <div id="ZonePrint" class="ZonePrint">    
      <!-- InstanceBeginEditable name="Contenu" -->













	<b><?php 
	
	 /*echo $_GET['Type'].' -- ';*/
	/* if ($_GET['Type'] == "OUV") {echo "Ouvrages ";}*/
	 if ($_GET['Type'] == "OUV") {echo "Ouvrages ".' -- ';}
	 if ($_GET['Type'] == "ART") {echo "Articles ".' -- ';}
	 if ($_GET['Type'] == "COV") {echo "Chapitres d'ouvrage ".' -- ';}
	 if ($_GET['Type'] == "COL") {echo "Communications ".' -- ';}
	 if ($_GET['Type'] == "TRU") {echo "Th�ses ".' -- ';}
	 if ($_GET['Type'] == "CRO") {echo "Comptes rendus ".' -- ';}
	 echo $_GET['NomPrenomAuteur'];?></b></br>
	
	<?php include ('menu.php');?></br>
	<?php if ($totalRows_liste_pub > 0) { ?>
              <table width="100%"  border="0" cellspacing="0" cellpadding="1">
                <tr valign="top">
                  <td colspan="3">
                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                      <tr>
                        <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, 0, $queryString_liste_pub); ?>">Premier</a>
                          <?php } // Show if not first page ?>
                          <?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
                          <font color="#666666">Premier</font>
                          <?php } // Show if first page ?>
                        </td>
                        <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, max(0, $pageNum_liste_pub - 1), $queryString_liste_pub); ?>">Pr&eacute;c&eacute;dent</a>
                          <?php } // Show if not first page ?>
                          <?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
                          <font color="#666666"> Pr&eacute;c&eacute;dent</font>
                          <?php } // Show if first page ?>
                        </td>
                        <td align="center" class="intertitre"><b>&nbsp;[<?php echo ($startRow_liste_pub + 1) ?>-<?php echo min($startRow_liste_pub + $maxRows_liste_pub, $totalRows_liste_pub) ?><b>]/<?php echo $totalRows_liste_pub ?></b></b></td>
                        <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, min($totalPages_liste_pub, $pageNum_liste_pub + 1), $queryString_liste_pub); ?>">Suivant</a>
                          <?php } // Show if not last page ?>
                          <?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
                          <font color="#666666">Suivant</font>
                          <?php } // Show if last page ?>
                        </td>
                        <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, $totalPages_liste_pub, $queryString_liste_pub); ?>">Dernier</a>
                          <?php } // Show if not last page ?>
                          <?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
                          <font color="#666666">Dernier</font>
                          <?php } // Show if last page ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <?php do { ?>
                <tr valign="top">
                  <td>&nbsp;</td>
                  <td>
                  	<b><?php echo $row_liste_pub['Annee']; ?>&nbsp;</b><br>
				  	<?php if(trim($row_liste_pub['URL'])!=""){echo "<a href=\"";echo trim($row_liste_pub['URL']);echo"\"><img src='/icons/text.gif' border='0'/></a>";} ?>
				  </td>
                  <td>
					  <?php  if($row_liste_pub['Type']=="COV"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; if($row_liste_pub['u']!="") {echo "&nbsp;/&nbsp;"; echo $row_liste_pub['u'];} echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];} ?>
					  <?php  if($row_liste_pub['Type']=="ART"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];} ?>
					  <?php  if($row_liste_pub['Type']=="TRU"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['u']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['t']; echo ".-&nbsp;";  echo $row_liste_pub['Collation'];} ?>
					  <?php  if($row_liste_pub['Type']=="OUV"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ".-&nbsp;";  echo $row_liste_pub['Collation'];} ?>
					  <?php  if($row_liste_pub['Type']=="RAP"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['Annee']; echo ".-&nbsp;";  echo $row_liste_pub['o'];} ?>
					  <?php  if($row_liste_pub['Type']=="COL"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;Pour&nbsp;:&nbsp;"; echo $row_liste_pub['s']; if($row_liste_pub['u']!="") {echo "&nbsp;/&nbsp;"; echo $row_liste_pub['u'];} echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t'];} ?>
					  <?php  if($row_liste_pub['Type']=="CRO"){echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];} ?>
				  </td>
                </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                </tr>
                <?php } while ($row_liste_pub = mysql_fetch_assoc($liste_pub)); ?>
				  <tr valign="top">
					<td colspan="3">
					  <table width="100%" border="0" cellpadding="5" cellspacing="0">
						<tr>
						  <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
						  <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, 0, $queryString_liste_pub); ?>">Premier</a>
						  <?php } // Show if not first page ?>
							 <?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
							 <font color="#666666">Premier</font>
							<?php } // Show if first page ?>
						  </td>
						  <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
							<a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, max(0, $pageNum_liste_pub - 1), $queryString_liste_pub); ?>">Pr&eacute;c&eacute;dent</a>
							<?php } // Show if not first page ?>
							<?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
							<font color="#666666"> Pr&eacute;c&eacute;dent</font>
							<?php } // Show if first page ?>
						  </td>
						  <td align="center" class="intertitre"><b>&nbsp;[<?php echo ($startRow_liste_pub + 1) ?>-<?php echo min($startRow_liste_pub + $maxRows_liste_pub, $totalRows_liste_pub) ?><b>]/<?php echo $totalRows_liste_pub ?></b></b></td>
						  <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
							<a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, min($totalPages_liste_pub, $pageNum_liste_pub + 1), $queryString_liste_pub); ?>">Suivant</a>
							<?php } // Show if not last page ?>
							<?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
							<font color="#666666">Suivant</font>
							<?php } // Show if last page ?>
						  </td>
						  <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
							<a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, $totalPages_liste_pub, $queryString_liste_pub); ?>">Dernier</a>
							<?php } // Show if not last page ?>
							<?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
							<font color="#666666">Dernier</font>
							<?php } // Show if last page ?>
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
              </table>
              <?php } // Show if recordset not empty
              if ($totalRows_liste_pub == 0) { // Show if recordset empty ?>
					<p align="left" class="intertitre">&nbsp;</p>
					<p align="left" class="intertitre"><b>r&eacute;sultats :</b> <b>
					<?php echo $totalRows_liste_pub ?></b> </p>
					<p align="left">&gt; aucune  publication n'a &eacute;t&eacute; trouv&eacute;e </p>
					<div align="left">
              <?php } // Show if recordset empty ?>















      <!-- InstanceEndEditable --></div></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="500"></td>
  </tr>
  <tr>
    <td width="150" class="XnavgaucheIcones"><img src="../z-outils/images/charte/icones-01.gif" alt="" width="150" height="55" border="0" usemap="#Map2"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="10"></td>
  </tr>
  <tr>
    <td width="150" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
    <td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="449" height="1"></td>
    <td width="150" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td>
    <td width="1" class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="1" height="1"></td>
  </tr>
</table>
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2319041; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="1fae5b4b"; 
var sc_text=3; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/frames.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2319041&amp;java=0&amp;security=1fae5b4b&amp;invisible=0" alt="best website stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
<p>&nbsp;</p>
 <p>&nbsp;</p>
 <div id="divpartenaires" >
   <table width="150"  border="0" cellspacing="0" cellpadding="0">
     <tr><td><a href="http://www.cnrs.fr" target="_blank"><img src="../images/logos/logo-cnrs.jpg" alt="cnrs" width="150" height="62" border="0"></a></td>
     </tr>
     <tr><td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td></tr>
     <tr><td><a href="http://www.univ-paris3.fr/1207750810633/0/fiche___defaultstructureksup/&RH=1235649944785" target="_blank"><img src="../images/logos/logo-paris-3.gif" alt="paris3" width="150" height="53" border="0"></a></td>
     </tr>
     <tr><td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td></tr>
     <tr><td><a href="http://www.paris-sorbonne.fr/fr/spip.php?rubrique1096" target="_blank"><img src="../images/logos/logo-paris-4.gif" alt="paris4" width="150" height="53" border="0"></a></td>
     </tr>
	 <tr><td class="separateur"><img src="../z-outils/images/boite-outils/espaceur.gif" width="150" height="1"></td></tr>
     <tr><td><a href="http://www.typologie.cnrs.fr/" target="_blank"><img src="../images/logos/logo-typo.gif" alt="tul" width="150" height="53" border="0"></a></td>
     </tr>
   </table>
</div>
 <p>
   <script type='text/javascript'>function Go(){return}</script>
     <script type='text/javascript' src='../z-outils/deroulants/top_pos_var.js'></script>
     <script type='text/javascript' src='../z-outils/deroulants/menu_var.js'></script>
     <script type='text/javascript' src='../z-outils/deroulants/menu9_com.js'></script>
</p>
 <noscript>
 <p>Your browser does not support script</p>
</noscript>

<div id="divnavgauche-spec"> 
  <table border="0" cellpadding="0" cellspacing="0"  width="150">
    <tr> 
      <td height="2"> <img border="0" src="../z-outils/images/boite-outils/pointilles.gif" alt="" width="150" height="3"></td>
    </tr>
    <tr> 
      <td width="100%"  class="Xnavgauche" > 
        <table border="0" cellpadding="10" cellspacing="0"  width="100%">
          <tr> 
            <td width="100%" class="Xnavgauche"> 
              <p class="intertitre"><a href="../pratique/organigramme.htm">Les membres</a></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td height="2"> <img border="0" src="../z-outils/images/boite-outils/pointilles.gif" alt="" width="150" height="3"></td>
    </tr>
    <tr> 
      <td width="100%"  class="Xnavgauche" > 
        <table border="0" cellpadding="10" cellspacing="0"  width="100%">
          <tr> 
            <td width="100%" class="Xnavgauche"> 
              <p class="intertitre" >Rechercher</p>
              <p>Sur le WEB du Lacito</p>
              <p><br>
              <br>
              <!--Sur le WEB du CNRS--> <br>
              <br>
              <br>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td height="2"> <img border="0" src="../z-outils/images/boite-outils/pointilles.gif" alt="" width="150" height="3"></td>
    </tr>
  </table>
</div>
<div id="divnavgauche-searchLabo"> 
  <form name="rechercher-spi" action="http://lacito.vjf.cnrs.fr/moteur/engine.php" method="GET">
  <input type="hidden" name ="action" value="go">
    <table cellspacing="0" cellpadding="0" border="0">
      <tr> 
        <td> 
          <input name ="blork" maxLength="50" size="10" class="text">
        </td>
        <td> <img border="0" src="../z-outils/images/boite-outils/espaceur.gif" width="10" height="8"
                alt=""></td>
        <td> <input name="submit" type="image" src="../z-outils/images/charte/ok.gif" 
                                border="0" width="20" height="20">
        </td>
      </tr>
    </table>
  </form>
</div>
<!--<div id="divnavgauche-search"> 
  <form name="rechercher-spi" action="http://www.cnrs.fr/rechercher/" method="POST"
       target="_blank">
    <table cellspacing="0" cellpadding="0" border="0">
      <tr> 
        <td> 
          <input name ="request" maxLength="50" size="10" class="BoiteRechercher">
        </td>
        <td> <img border="0" src="../z-outils/images/boite-outils/espaceur.gif" width="10" height="8"
                alt=""></td>
        <td valign="middle" > 
          <input name="submit" type="image" src="../z-outils/images/charte/ok.gif" 
                                border="0" width="20" height="20">
        </td>
      </tr>
    </table>
  </form>
</div>-->
<div id="divnavhaut-nom-labo"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td class="Xnavhaut"> 
        <p> <a href="../index.htm"><img src="../images/logos/Logo_Lacito.jpg" alt="lacito" width="143" height="53" border="0"></a></p>
      </td>
    </tr>
  </table>
</div>
<map name="Map2">
  <area shape="rect" coords="28,23,46,43" href="javascript:impression()" alt="Imprimer/to print">
  <area shape="rect" coords="49,23,66,43" href="javascript:writemail('vjf.cnrs.fr','behaghel','',1);" alt="Contact">
  <area shape="rect" coords="68,23,85,43" href="../pratique/index.htm" alt="Plan du site/Site map">
  <area shape="rect" coords="87,23,105,43" href="../pratique/credits.htm" alt="Cr&eacute;dits/Copyrights">
  <area shape="rect" coords="107,23,128,43" href="../pratique/to_build.htm" alt="Plug-ins">
  <area shape="rect" coords="8,24,24,43" href="../index.htm" alt="Accueil">
</map>
</body>
<!-- InstanceEnd --></html>