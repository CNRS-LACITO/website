<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
                      "http://www.w3.org/TR/html4/strict.dtd">
<html><!-- InstanceBegin template="/Templates/popup.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Metadata</title>
<!-- InstanceEndEditable --><link rel="stylesheet" type="text/css" href="../../styles/xcharte.css">
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

		Xslt_text_metadata($id);
	?>
<!-- InstanceEndEditable -->
<map name="map">
<area shape="rect" coords="330,5,445,20" HREF="javascript:window.close()">
</map>
<div id="divnavhaut-nom-labo"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td class="Xnavhaut"> 
        <p> <a href="#" target="_blank">Langues et civilisations <br>
&agrave; tradition orale <br>
(UMR7107)</a> </p>
      </td>
    </tr>
  </table>
</div>

</body><!-- InstanceEnd --></html>
