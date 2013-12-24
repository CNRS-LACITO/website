<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
                      "http://www.w3.org/TR/html4/strict.dtd">-->
					  
<!DOCTYPE html>

<html><!-- InstanceBegin template="/Templates/popup.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
		$id_text=  isset($_GET["id_text"])    ? utf8_encode($_GET["id_text"])    : "*";
		$lg=  isset($_GET["lg"])    ? $_GET["lg"]    : "*";
			
// pour afficher correctement la fiche langue : traitement de la chaine de langue			
		$lg=str_replace(explode(' ', 'à á â ã ä ç è é ê ë ì í î ï ñ ò ó ô õ ö ù ú û ü ý ÿ À Á Â Ã Ä Ç È É Ê Ë Ì Í Î Ï Ñ Ò Ó Ô Õ Ö Ù Ú Û Ü Ý'),
explode(' ', 'a a a a a c e e e e i i i i n o o o o o u u u u y y A A A A A C E E E E I I I I N O O O O O U U U U Y'),
$lg) ;
$lg=str_replace(' ','_',$lg) ;

$pos = strpos($lg, ',');
if ($pos!=-1){
substr($lg, $pos);	
}

		utf8_encode($lg);
		?>
        
        
		 <table border="1">
 
           
          <tr> 
          <td>
           <img src="../../images/icones/info_33px.gif" width="25" height="25"> </td> 
           <td><b>Informations</b> concernant la ressource (métadonnées) /
           <br/>
           <b>Informations</b> about the resource (metadata) 
           </td>          
           </tr>   
           <tr>
           <td>
          <img src="../../images/icones/wav.png" width="32" height="32"><img src="../../images/icones/mp3.png" width="32" height="32"> </td>
          <td> Accès à <b>l'enregistrement</b> audio. Clic droit pour télécharger / 
          <br/>
          To access the <b>recording</b>. Right-click to download
          </td>
          </tr>
          <tr>
          <td>
          <img class="sansBordure" src="../../images/icones/xml.png"/> </td>
          <td> Accès au <b>fichier d'annotations</b> (format XML). Clic droit pour télécharger /
          <br/>
          To access the <b>annotation</b> in XML format. Right-click to download
          </td>
          </tr>
          </table>
		
		
		<?php
		Xslt_sound_metadata($id,$id_text,$lg);
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
