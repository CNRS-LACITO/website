/*-----------------   PARAMETRES DE CONFIGURATION A RENSEIGNER   ------------------*/

// images du bandeau de la popup d'impression 
var imgGauche=hRefSite+"z-outils/kit-impression/images/imggauche.gif";
var espaceur=hRefSite+"z-outils/kit-impression/images/imgcentre.gif";
var imgDroite=hRefSite+"z-outils/kit-impression/images/imgdroite.gif";
var urlStyles=hRefSite+"styles/";

/*-------------   FIN DES PARAMETRES DE CONFIGURATION A RENSEIGNER   --------------*/

/*-------------   Fonction writemail pour éviter les spam   --------------
fonction JS qui ‚vite le spam en codant les emails.
4 parametres :
  hostname : le nom du domaine (exemple : "cnrs.fr" si le mail est "contact@cnrs.fr")
  username : le nom du user (exemple : "contact" si le mail est "contact@cnrs.fr")
  linktext : si "" (=pas renseigné, le mail est affiché 'contact@cnrs.fr')
             si renseigné : exemple "ecrivez-nous", 
							alors le lien affichera ce texte et pointera vers le mail spécifié.
  mode : 0 si c'est pour intégrer dans une partie HTML (le script écrit toute la balise du <a au </a>, 
		 1 si c'est pour l'intégrer dans une map (href="#" onClick="javascript:writemail(..,.,..,1);" )
		 
------------------------------------------------------------------------------------------*/
function writemail(hostname,username,linktext,mode) {
  if (hostname.length > 0) {
	  mail_to="mail" + "to:" + username + "@" + hostname;
	  if (mode==0) {  
		  (linktext.length > 0)?document.write("<a href=" + mail_to + ">" + linktext + "</a>"):document.write("<a href=" +  mail_to + ">" + username + ""+"@" + hostname +"" + "</a>"); 
	  }
	  else { document.location.replace(mail_to); }
  }
}


/*-----------------------------------------------------------------------------------------
fonction JS qui ouvre une popup et y ecrit un bandeau d'images puis le contenu de la page 
HTML qui l'appelle situe dans la balise DIV dont l'id est "ZonePrint"
------------------------------------------------------------------------------------------*/
function impression()
{

/*----- ouverture de la popup -----*/
stats="toolbar=no,location=no,scrollbars=yes,directories=no,status=no,menubar=yes,resizable=yes,width=650,height=600,left=0,top=0";
win=window.open("about:blank", "print", stats);

win.document.open();

win.document.write('<html><head><title>Laboratoire ....</title>');
win.document.write('<link rel="stylesheet" type="text/css" href="' + urlStyles + 'xcharte.css">');
win.document.write('<link rel="stylesheet" type="text/css" href="' + urlStyles + 'styles.css">');
win.document.write('</head>');

win.document.write('<body marginheight="0" marginwidth="0">');

/*----- affichage du bandeau d'images -----*/
win.document.write('<table border="0" cellspacing="0" cellpadding="0" width="100%">');
win.document.write('<tr>');
win.document.write('<td width="145" height="66">');
win.document.write('<img src="' + imgGauche + '" width="145" height="66" border="0"></td>');
win.document.write('<td width="100%" height="66">');
win.document.write('<img src="' + espaceur + '" width="100%" height="66" border="0"></td>');
win.document.write('<td width="450" height="66">');
win.document.write('<img src="' + imgDroite + '" width="450" height="66" border="0" usemap="#map"></td>');
win.document.write('</tr>');
win.document.write('<tr>');
/* affichage du contenu a imprimer dans une cellule de tableau */
win.document.write('<td colspan="3" class="Xtextcourant">');
win.document.write('<table width="100%" border="0" cellspacing="0" cellpadding="10">');
win.document.write('<tr>');
win.document.write('<td>');

/*-----    affichage de la zone contenue dans le layer "ZonePrint"     -----*/
/*----- (code dependant de la compatibilite du navigateur avec le DOM) -----*/

if (document.getElementById)  /* IE >= 5 / Netscape >= 6 / Mozilla >= 1.6 / Opera >= 7 */

  win.document.write(document.getElementById("ZonePrint").innerHTML);
	
else  /* navigateur incompatible avec la methode "getElementById : code specifique */

  if (document.all && !window.print)   /* IE 4 */
    win.document.write(document.all["ZonePrint"].innerHTML);
	
  else	/* Netscape 4 ou autre navigateur obsolete */ 
    {
      win.close();
      alert("Cette fonctionnalité ne marche pas avec cette version de navigateur.");
    }
  
win.document.write('</td></tr></table>');
win.document.write('</td></tr></table>');
/* mapping pour la partie "Fermer la fenetre" de imgDroite */
win.document.write('<map name="map">');
win.document.write('<area shape="rect" coords="330,5,445,20" HREF="javascript:window.close()">');
win.document.write('</map>');
win.document.write('<div id="divnavhaut-nom-labo">'); 
win.document.write('  <table width="100%" border="0" cellspacing="0" cellpadding="0">');
win.document.write('    <tr>'); 
win.document.write('      <td class="Xnavhaut">'); 
win.document.write('        <p> Langues et civilisations &agrave; tradition orale'); 
win.document.write('          <br>');
win.document.write('          (UMR7107) </p>');
win.document.write('      </td>');
win.document.write('    </tr>');
win.document.write('  </table>');
win.document.write('</div>');

win.document.write('</body></html>');
win.document.close();
}
/*-----------------------------------------------------------------------------------------
fonction JS qui ouvre une popup avec les parametres qu'on lui donne
------------------------------------------------------------------------------------------*/
function MM_openBrWindow(theURL,winName,features) 
{
  window.open(theURL,winName,features);
}