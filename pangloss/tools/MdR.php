<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"
                      "http://www.w3.org/TR/html4/strict.dtd">
<html><!-- InstanceBegin template="/Templates/popup.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Recherche</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="LacitoStyle.css">
<link rel="stylesheet" type="text/css" href="../../styles/xcharte.css">
<link rel="stylesheet" type="text/css" href="../../styles/styles.css">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->

<script language="JavaScript" type="text/JavaScript">
<!--
function window.open(){//v1.44
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


</head>

<body marginheight="0" marginwidth="0">

<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
    <td width="145" height="66"><img src="../../z-outils/images/charte/popup/imggauche.gif" width="145" height="66" border="0"></td>
    <td width="100%" height="66"><img src="../../z-outils/images/charte/popup/imgcentre.gif" alt="" width="100%" height="66" border="0"></td>
    <td width="450" height="66"><img src="../../z-outils/images/charte/popup/imgdroite.gif" alt="" width="450" height="66" border="0" usemap="#map"></td>
  </tr>
</table>

<!-- InstanceBeginEditable name="Contenu" -->
<table border="0" cellspacing="0" cellpadding="10">

	<FORM> <INPUT TYPE="button" VALUE="&lt;&lt; Retour" onClick="history.back()"> </FORM><br/><br/>


	<?php
		$title= isset($_GET["title"])    ? utf8_encode($_GET["title"])    : "*";
		$lg= isset($_GET["lg"])    ? utf8_encode($_GET["lg"])    : "*";
		$id= isset($_GET["id"])    ? utf8_encode($_GET["id"])    : "*";

		echo ("
		<form action=\"php-formulaire.php?id={$id}&$lg={$lg}\" method=\"POST\">
		<tr>
			<td>Recherche sur ce texte <i>".$title."</i></td>
			<td><INPUT type=radio CHECKED name=\"corpus\" value=\"text\"></td>
		</tr>
		<tr>
			<td>Recherche sur les textes de la langue <i>".$lg."</i></td>
			<td><INPUT type=radio name=\"corpus\" value=\"langue\"></td>
		</tr>")
	?>
		<tr>
			<td>Recherche d'un terme </td>
			<td><INPUT type=radio CHECKED name="presentation" value="term"></td>
		</tr>
		<tr>
			<td>
				<?php
					require_once ('fonctions_Xquery.php');
					$term = "Concordance";
					lienAide($term);
				?>
			</td>
			<td><INPUT type=radio name="presentation" value="concordance"></td>
		</tr>
		<tr>
			<td>
			<select name="recherche" size="1">
				<option selected value="0">- Dans quel type de texte voulez-vous effectuer la recherche ? -</option>
				<option value="1">Sans pr&eacute;f&eacute;rence</option>
				<option selected value="2">Dans la transcription</option>
				<option value="3">Dans la traduction</option>
			</select>
			<td>
		</tr>
		<tr>
			<td>
			<select name="niveau" size="1">
				<option selected value="0">- A quel niveau voulez-vous effectuer la recherche ? -</option>
				<option value="1">Sans pr&eacute;f&eacute;rence</option>
				<option selected value="2">Au niveau de la phrase</option>
				<option value="3">Au niveau du mot</option>
				<option value="3">Au niveau du morph�me</option>
			</select>
			<td>
		</tr>
		<tr>
			<td>recherche de <input type="text" name="typeRecherche" size="20"> OU </td>
			<td>
				<select name="typeRecherche" size="1">
					<option selected value="0">- S&eacute;lectionner un terme  - </option>
					<option value="">term 1 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value="OK"/></td>
			<td></td>
		</tr>
	</form>

</table>

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
</div> <!-- InstanceEndEditable -->
</body></html>
