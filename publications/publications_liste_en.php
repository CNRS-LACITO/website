<?php
require_once('Connections/connect_publiCNRS.php');

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_liste_pub = 10;
$pageNum_liste_pub = 0;
if (isset($_GET['pageNum_liste_pub'])) {
	$pageNum_liste_pub = $_GET['pageNum_liste_pub'];
	
  
}
$startRow_liste_pub = $pageNum_liste_pub * $maxRows_liste_pub;
$colname_liste_pub = "Auteurs";
if (isset($_GET['NomAuteur'])) {
  $colname_liste_pub = (get_magic_quotes_gpc()) ? $_GET['NomAuteur'] : addslashes($_GET['NomAuteur']);
}
mysql_select_db($database_connect_publiCNRS, $connect_publiCNRS);
$query_liste_pub = sprintf("SELECT * FROM bdd WHERE Auteurs LIKE '%%%s%%' AND `Type` NOT LIKE 'col' ORDER BY Annee DESC, Auteurs ASC, Titre ASC", $colname_liste_pub);
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
<html><!-- InstanceBegin template="/Templates/seconde-navgauche-navdroite_en.dwt" codeOutsideHTMLIsLocked="false" -->
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
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
.Style1 {color: #820E12}
-->
</style>
</head>
<body marginwidth="0" marginheight="0" >


<table height="100%" width="100%"  bgcolor="#CCCCCC">
<tr>
<td >

<table height="100%" width="1000"  border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
  <tr>
   
    <td background="../z-outils/images/charte/bandeau-haut-droit_ok.gif" align="left" ><table width="1000"><tr><td width="454" valign="top" class="Xnavhaut"><p> <a href="../index_en.htm"><img src="../images/logos/Logo_Lacito.png" alt="aa" width="141" height="59" hspace="10" border="0" align="left"></a></p> <span class="Style1">Langues et civilisations<br>
        à tradition orale <br>
        (UMR7107)</span></p></td><td width="534" class="bandeau-liens">&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.cnrs.fr/fr/organisme/presentation.htm" target="_blank">CNRS</a>
&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.cnrs.fr/shs/" target="_blank">INSHS home</a>&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">
&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.cnrs.fr/fr/une/sites-cnrs.htm" target="_blank">Other web sites</a>
&nbsp;&nbsp;&nbsp;&nbsp;  
<img src="../z-outils/images/charte/trait-vertical.gif">
&nbsp;&nbsp;&nbsp;&nbsp;
</td></tr></table>
        
     </td>
    <!--<img src="../z-outils/images/charte/bandeau-haut-droit.gif" alt="" width="100%" height="66" border="0"/></td>-->
    
  </tr>
  
  <tr>
   
    
    <td width="1000"  align="center" height="125" ><!-- InstanceBeginEditable name="Visuel" --><a href="publications_en.php"><img src="../images/bandeaux/vient_de_paraitre.jpg" alt="" width="100%" border="0"></a><!-- InstanceEndEditable --></td>
   
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
                    <td width="10%" class="Xnavgauche" align="right"><a href="Javascript:version()"><img src="../images/logos/fra.gif" alt="Français" width="47" height="47"  border="0"></a></td>
      			</tr>
   		  </table>
  
  </td>
  </tr>
 
  <tr>
 
    
    <td class="Xchemin" height="60"> 
    <br/><br/><br/><br/>
    &nbsp;<!-- InstanceBeginEditable name="Chemin" --> <a href="../index_en.htm">Home</a> &gt; <a href="publications_en.php">Authors</a> &gt; Scientific productions<!-- InstanceEndEditable --> 
    
    </tr>
  
  
  <tr>
   
    
    <td class="Xtextcourant" width="600" height="500" valign="top">	<div id="divXnavdroite"><!-- InstanceBeginEditable name="MenuDroit" -->
        
    <!-- InstanceEndEditable --></div>
      <div id="ZonePrint" class="ZonePrint">    
      <!-- InstanceBeginEditable name="Contenu" -->
            
<table width="100%" height="400">
<tr><td valign="top">
	<b><?php echo $_GET['NomPrenomAuteur'];?></b></br>
	<?php include ('menu_en.php');?>
	<?php if ($totalRows_liste_pub > 0) { ?>
              <table width="100%"  border="0" cellspacing="0" cellpadding="1">
                <tr valign="top">
                  <td colspan="3">
                    <table width="100%" border="0" cellpadding="5" cellspacing="0">
                      <tr>
                        <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, 0, $queryString_liste_pub); ?>">First</a>
                          <?php } // Show if not first page ?>
                          <?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
                          <font color="#666666">First</font>
                          <?php } // Show if first page ?>
                        </td>
                        <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, max(0, $pageNum_liste_pub - 1), $queryString_liste_pub); ?>">Previous</a>
                          <?php } // Show if not first page ?>
                          <?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
                          <font color="#666666"> Previous</font>
                          <?php } // Show if first page ?>
                        </td>
                        <td align="center" class="intertitre"><b>&nbsp;[<?php echo ($startRow_liste_pub + 1) ?>-<?php echo min($startRow_liste_pub + $maxRows_liste_pub, $totalRows_liste_pub) ?><b>]/<?php echo $totalRows_liste_pub ?></b></b></td>
                        <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, min($totalPages_liste_pub, $pageNum_liste_pub + 1), $queryString_liste_pub); ?>">Next</a>
                          <?php } // Show if not last page ?>
                          <?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
                          <font color="#666666">Next</font>
                          <?php } // Show if last page ?>
                        </td>
                        <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
                          <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, $totalPages_liste_pub, $queryString_liste_pub); ?>">Last</a>
                          <?php } // Show if not last page ?>
                          <?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
                          <font color="#666666">Last</font>
                          <?php } // Show if last page ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <?php do { 
				
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
                <tr valign="top">
                  <td>&nbsp;</td>
                  <td>
                  	<b><?php echo $row_liste_pub['Annee']; ?>&nbsp;</b><br>
				  	<?php if(trim($row_liste_pub['URL'])!=""){echo "<a href=\"";echo trim($row_liste_pub['URL']);echo"\" target=\"_blank\"><img src='/icons/text.gif' border='0'/></a>";} ?>
				  </td>
                  <td>
					  <?php  if($row_liste_pub['Type']=="COV"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; if($row_liste_pub['u']!="") {echo "&nbsp;/&nbsp;"; echo $row_liste_pub['u'];} echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];
						if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					    if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';}   
						  } ?>
					  <?php  if($row_liste_pub['Type']=="ART"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];
					  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
					  } ?>
					  <?php  if($row_liste_pub['Type']=="TRU"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['u']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['t']; echo ".-&nbsp;";  echo $row_liste_pub['Collation'];
					  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  } ?>
					  <?php  if($row_liste_pub['Type']=="OUV"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ".-&nbsp;";  echo $row_liste_pub['Collation'];
					  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  } ?>
					  <?php  if($row_liste_pub['Type']=="RAP"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;"; echo $row_liste_pub['Annee']; echo ".-&nbsp;";  echo $row_liste_pub['o'];
					  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  } ?>
					  <?php  if($row_liste_pub['Type']=="COL"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;Pour&nbsp;:&nbsp;"; echo $row_liste_pub['s']; if($row_liste_pub['u']!="") {echo "&nbsp;/&nbsp;"; echo $row_liste_pub['u'];} echo "&nbsp;--&nbsp;"; echo $row_liste_pub['t'];
					  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  } ?>
					  <?php  if($row_liste_pub['Type']=="CRO"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ",&nbsp;";  echo $row_liste_pub['Collation'];
					  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
					  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Shelf&nbsp;mark&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  } ?>
                          <?php  if($row_liste_pub['Type']=="AUT"){
						  echo $row_liste_pub['Auteurs']; echo "&nbsp;--&nbsp;" ; echo $row_liste_pub['Titre']; echo "&nbsp;--&nbsp;In&nbsp;:&nbsp;"; echo $row_liste_pub['s']; echo ",&nbsp;"; echo $row_liste_pub['Annee']; echo ",&nbsp;";  echo $row_liste_pub['Collation']; 
						  if($row_liste_pub['zone_libre'] != ''){ echo '&nbsp;--&nbsp;['.$row_liste_pub['zone_libre'].']';} 
						  if($row_liste_pub['cote'] != ''){ echo '&nbsp;--&nbsp;Cote&nbsp;:&nbsp;<b>'.$row_liste_pub['cote'].'</b>';} 
						  } ?>
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
						  <a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, 0, $queryString_liste_pub); ?>">First</a>
						  <?php } // Show if not first page ?>
							 <?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
							 <font color="#666666">First</font>
							<?php } // Show if first page ?>
						  </td>
						  <td align="left" valign="top"><?php if ($pageNum_liste_pub > 0) { // Show if not first page ?>
							<a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, max(0, $pageNum_liste_pub - 1), $queryString_liste_pub); ?>">Previous</a>
							<?php } // Show if not first page ?>
							<?php if ($pageNum_liste_pub == 0) { // Show if first page ?>
							<font color="#666666"> Previous</font>
							<?php } // Show if first page ?>
						  </td>
						  <td align="center" class="intertitre"><b>&nbsp;[<?php echo ($startRow_liste_pub + 1) ?>-<?php echo min($startRow_liste_pub + $maxRows_liste_pub, $totalRows_liste_pub) ?><b>]/<?php echo $totalRows_liste_pub ?></b></b></td>
						  <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
							<a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, min($totalPages_liste_pub, $pageNum_liste_pub + 1), $queryString_liste_pub); ?>">Next</a>
							<?php } // Show if not last page ?>
							<?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
							<font color="#666666">Next</font>
							<?php } // Show if last page ?>
						  </td>
						  <td align="right" valign="top"><?php if ($pageNum_liste_pub < $totalPages_liste_pub) { // Show if not last page ?>
							<a href="<?php printf("%s?pageNum_liste_pub=%d%s", $currentPage, $totalPages_liste_pub, $queryString_liste_pub); ?>">Last</a>
							<?php } // Show if not last page ?>
							<?php if ($pageNum_liste_pub >= $totalPages_liste_pub) { // Show if last page ?>
							<font color="#666666">Last</font>
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
					<p align="left" class="intertitre"><b>Results :</b> <b>
					<?php echo $totalRows_liste_pub ?></b> </p>
					<p align="left">&gt; No publication found </p>
					<div align="left">
              <?php } // Show if recordset empty ?>



</td></tr></table>







      <!-- InstanceEndEditable --></div></td>
    
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

</table>


<p>
  <script type='text/javascript'>function Go(){return}</script>
  <script type='text/javascript' src='../z-outils/deroulants/top_pos_var.js'></script>
  <script type='text/javascript' src='../z-outils/deroulants/menu_var_en.js'></script>
  <script type='text/javascript' src='../z-outils/deroulants/menu9_com.js'></script>
</p>
<noscript>
 <p>Your browser does not support script</p>
</noscript>
 <map name="Map2">
   <area shape="rect" coords="28,23,46,43" href="javascript:impression()" alt="Imprimer">
  <area shape="rect" coords="49,23,66,43" href="javascript:writemail('vjf.cnrs.fr','behaghel','',1);" alt="Contacter le webmestre">
  <area shape="rect" coords="68,23,85,43" href="../pratique/index.htm" alt="Plan du site">
  <area shape="rect" coords="87,23,105,43" href="../pratique/credits.htm" alt="Crédits">
  <area shape="rect" coords="8,24,24,43" href="../index.htm" alt="Accueil">
</map>
</body>
<!-- InstanceEnd --></html>