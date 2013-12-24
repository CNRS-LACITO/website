 /***********************************************
*	(c) Ger Versluis 2000 version 9.50 24 July 2003	          *
*	You may use this script on non commercial sites.	          *
*	www.burmees.nl/menu			          *
*	You may remove all comments for faster loading	          *		
************************************************/
	var NoOffFirstLineMenus=8;		// Number of main menu  items
						            // Colorvariables:
						            // Color variables take HTML predefined color names or "#rrggbb" strings
						            //For transparency make colors and border color ""
	var LowBgColor="#FFFFFF";			// Background color when mouse is not over
	var HighBgColor="#FFFFFF";			// Background color when mouse is over
	var FontLowColor="#00294b";		// Font color when mouse is not over
	var FontHighColor="#7695b8";		// Font color when mouse is over
	var BorderColor="#446c7f";			// Border color
	var BorderWidthMain=1;			// Border width main items
	var BorderWidthSub=1;			// Border width sub items
 	var BorderBtwnMain=1;			// Border between elements main items 1 or 0
	var BorderBtwnSub=0;			// Border between elements sub items 1 or 0
	var FontFamily="arial,helvetica,sans-serif";	// Font family menu items
	var FontSize=9;				// Font size menu items
	var FontBold=1;				// Bold menu items 1 or 0
	var FontItalic=0;			// Italic menu items 1 or 0
	var MenuTextCentered="left";		// Item text position left, center or right
	var MenuCentered="left";		// Menu horizontal position can be: left, center, right, justify,
						//  leftjustify, centerjustify or rightjustify. PartOfWindow determines part of window to use
	var MenuVerticalCentered="top";		// Menu vertical position top, middle,bottom or static
	var ChildOverlap=0;			// horizontal overlap child/ parent
	var ChildVerticalOverlap=0;		// vertical overlap child/ parent
	var StartLeft=-1;			// Menu offset x coordinate. If StartLeft is between 0 and 1 StartLeft is calculated as part of windowwidth
	var VerCorrect=0;			// Multiple frames y correction
	var HorCorrect=0;			// Multiple frames x correction
	var LeftPaddng=6;			// Left padding
	var TopPaddng=4;			// Top padding
	var FirstLineHorizontal=0;		// First level items layout horizontal 1 or 0
	var MenuFramesVertical=1;		// Frames in cols or rows 1 or 0
	var DissapearDelay=1000;		// delay before menu folds in
	var UnfoldDelay=100;			// delay before sub unfolds	
	var TakeOverBgColor=1;			// Menu frame takes over background color subitem frame
	var FirstLineFrame="";			// Frame where first level appears
	var SecLineFrame="";			// Frame where sub levels appear
	var DocTargetFrame="";			// Frame where target documents appear
	var TargetLoc="";			// span id for relative positioning
	var MenuWrap=1;				// enables/ disables menu wrap 1 or 0
	var RightToLeft=0;			// enables/ disables right to left unfold 1 or 0
	var BottomUp=0;				// enables/ disables Bottom up unfold 1 or 0
	var UnfoldsOnClick=0;			// Level 1 unfolds onclick/ onmouseover
	var BaseHref=""; 
  var Arrws=["",5,10,"",10,5,"",5,10,"",10,5];

						// Arrow source, width and height.
						// If arrow images are not needed keep source ""

	var MenuUsesFrames=0;			// MenuUsesFrames is only 0 when Main menu, submenus,
						// document targets and script are in the same frame.
						// In all other cases it must be 1

	var RememberStatus=0;			
	var PartOfWindow=.8;
	                    // PartOfWindow: When MenuCentered is justify, sets part of window width to stretch to

						// Below some pretty useless effects, since only IE6+ supports them
						// I provided 3 effects: MenuSlide, MenuShadow and MenuOpacity
						// If you don't need MenuSlide just leave in the line var MenuSlide="";
						// delete the other MenuSlide statements
						// In general leave the MenuSlide you need in and delete the others.
						// Above is also valid for MenuShadow and MenuOpacity
						// You can also use other effects by specifying another filter for MenuShadow and MenuOpacity.
						// You can add more filters by concanating the strings
	var BuildOnDemand=0;
	var MenuSlide="";
	var MenuShadow="";
	var MenuOpacity="";

	function BeforeStart(){return}
	function AfterBuild(){return}
	function BeforeFirstOpen(){return}
	function AfterCloseAll(){return}

// Menu tree:
// MenuX=new Array("ItemText","Link","background image",number of sub elements,height,width,"bgcolor","bghighcolor",
//	"fontcolor","fonthighcolor","bordercolor","fontfamily",fontsize,fontbold,fontitalic,"textalign","statustext");
// Color and font variables defined in the menu tree take precedence over the global variables
// Fontsize, fontbold and fontitalic are ignored when set to -1.
// For rollover images ItemText format is:  "rollover?"+BaseHref+"Image1.jpg?"+BaseHref+"Image2.jpg" 
   
var Subbgcolor = "#284a71";
var Subbghighcolor = "#284a71";
var Subfonthighcolor="#5e91cc"
var Subfontcolor = "#FFFFFF"
//Le Lacito
Menu1=new Array("Le Lacito",BaseMenuHref+ "themes/index.htm","",5,24,150,"","","","","","",-1,-1,-1,"","");
	Menu1_1=new Array("Colloques",BaseMenuHref+"colloque/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_2=new Array("Enseignement",BaseMenuHref+"enseignement/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_3=new Array("Expositions",BaseMenuHref+"expos/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_4=new Array("Conf\xE9rences & expos\xE9s",BaseMenuHref+"la_recherche/conferences.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_5=new Array("Ouvrages parus",BaseMenuHref+"vient-de-paraitre/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
//La recherche
Menu2=new Array("La recherche",BaseMenuHref+ "la_recherche/index.htm","",8,24,"","","","","","","",-1,-1,-1,"","");
	Menu2_1=new Array("Changement linguistique",BaseMenuHref+"themes/changecologie.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_2=new Array("Le dit et le non-dit",BaseMenuHref+"themes/dit_nondit.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_3=new Array("Espaces publics",BaseMenuHref+"themes/interlocution.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_4=new Array("Nomination d\xE9nomination",BaseMenuHref+"themes/nomination.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_5=new Array("Etudes oc\xE9aniennes",BaseMenuHref+"themes/oceanie/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_6=new Array("Etudes balkaniques",BaseMenuHref+"themes/balkans/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_7=new Array("Langues dravidiennes",BaseMenuHref+"themes/dravidien/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_8=new Array("Langues tib\xE9to-birmanes",BaseMenuHref+"themes/tibeto-birman/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
    
//Langues et pays
Menu3=new Array("Langues et pays",BaseMenuHref+ "ALC/index.htm","",3,24,"","","","","","","",-1,-1,-1,"","");
	Menu3_1=new Array("Par pays",BaseMenuHref+"ALC/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu3_2=new Array("Par ordre alphab\xE9tique",BaseMenuHref+"ALC/listealpha.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu3_3=new Array("Par famille linguistique",BaseMenuHref+"ALC/listeparfamille.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
//Archives orales
Menu4=new Array("Archives orales","","",3,24,"","","","","","","",-1,-1,-1,"","");
    Menu4_1=new Array("Pr\xE9sentation",BaseMenuHref+"archivage/presentation.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu4_2=new Array("Acc\xE8s aux corpus",BaseMenuHref+"archivage/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu4_3=new Array("Rechercher",BaseMenuHref+"archivage/tools/search.php","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
//Projets associ�s
Menu5=new Array("Projets associ\xE9s",BaseMenuHref+ "partenariat/index.htm","",3,24,"","","","","","","",-1,-1,-1,"","");
	Menu5_1=new Array("EuroSlav 2010",BaseMenuHref+"partenariat/euroslav/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_2=new Array("Autour du Brahmapoutre","javascript:NewWin=window.open(\"http://www.vjf.cnrs.fr/brahmaputra\",\"NWin\");window[\"NewWin\"].focus()","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_3=new Array("Les \xE9pop\xE9es du N\xE9pal","javascript:NewWin=window.open(\"http://www.vjf.cnrs.fr/himalaya/fr/axes/histsavpat.htm#2\",\"NWin\");window[\"NewWin\"].focus()","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");

//Publications
Menu6=new Array("Publications",BaseMenuHref+ "publications/publications.php","",0,24,"","","","","","","",-1,-1,-1,"","");

//Organigramme
Menu8=new Array("Organigramme",BaseMenuHref+ "pratique/organigramme.htm","",0,24,"","","","","","","",-1,-1,-1,"","");

//Annuaire
Menu7=new Array("Annuaire",BaseMenuHref+ "membres/index.htm","",0,24,"","","","","","","",-1,-1,-1,"","");