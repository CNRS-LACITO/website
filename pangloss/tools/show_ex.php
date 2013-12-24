<!DOCTYPE html>



<html>
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Ressource</title>


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
<style type="text/css"></style>
</head>
<body>
        
        
        
        
     <?php
					require_once ('fonctions_Xslt.php');
					$id=  isset($_GET["id"])    ? utf8_encode($_GET["id"])    : "*";
					$s=  isset($_GET["s"])    ? utf8_encode($_GET["s"])    : "*";
					$aff_lang=  isset($_GET["aff_lang"])    ? utf8_encode($_GET["aff_lang"])    : "fr";
					
					$url_sound=Xslt_show_url_sound($id,$aff_lang);
					
				?>	
				
        
 

        
        

				<?php
					require_once ('fonctions_Xslt.php');
					$id=  isset($_GET["id"])    ? utf8_encode($_GET["id"])    : "*";
					$s=  isset($_GET["s"])    ? utf8_encode($_GET["s"])    : "*";
					$aff_lang=  isset($_GET["aff_lang"])    ? utf8_encode($_GET["aff_lang"])    : "fr";
					
				
					
					$url_sound=Xslt_show_ex($id,$s,$aff_lang);
					
				/*echo "coucou\n"; */
				/*http://127.0.0.1/CONC/media-cut.php?start=88.4601&amp;end=93.0001&amp;file=HARI.wav*/
					
		

	
?>

<noscript>
 <p>Your browser does not support script</p>
</noscript>





</body>
</html>