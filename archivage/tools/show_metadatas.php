<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
                      "http://www.w3.org/TR/html4/strict.dtd">
<html><!-- InstanceBegin template="/Templates/popup.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Metadata</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../../styles/xcharte.css">
<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body marginheight="0" marginwidth="0" onLoad="load()" onUnload="GUnload()">

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="145" height="66"><img src="../../z-outils/images/charte/popup/imggauche.gif" width="145" height="66" border="0"></td>
    <td width="100%" height="66"><img src="../../z-outils/images/charte/popup/imgcentre.gif" alt="" width="100%" height="66" border="0"></td>
    <td width="450" height="66"><img src="../../z-outils/images/charte/popup/imgdroite.gif" alt="" width="450" height="66" border="0" usemap="#map"></td>
  </tr>
</table>
<!-- InstanceBeginEditable name="Contenu" -->
	<?php
		require_once ('fonctions_Xslt.php');
		$id=  isset($_GET["id"])    ? utf8_encode($_GET["id"])    : "*";

		Xslt_sound_metadata($id);
	?>
<!-- InstanceEndEditable -->
<map name="map">
<area shape="rect" coords="330,5,445,20" HREF="javascript:window.close()">
</map>
<div id="divnavhaut-nom-labo">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="Xnavhaut">
        <p> <a href="#" target="_blank">Langues et civilisations &agrave; tradition orale  <br>
          (LACITO)</a> </p>
      </td>
    </tr>
  </table>
</div>
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
</body><!-- InstanceEnd --></html>
