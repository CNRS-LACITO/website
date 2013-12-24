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
	//var HighBgColor="#9E3C3C";			// Background color when mouse is over
	
	var FontLowColor="#00294b";		// Font color when mouse is not over
	var FontHighColor="#7695b8";		// Font color when mouse is over
	var BorderColor="#446c7f";			// Border color
	var BorderWidthMain=2;			// Border width main items
	var BorderWidthSub=1;			// Border width sub items
 	var BorderBtwnMain=1;			// Border between elements main items 1 or 0
	var BorderBtwnSub=1;			// Border between elements sub items 1 or 0
	var FontFamily="arial,helvetica,sans-serif";	// Font family menu items
	var FontSize=9;				// Font size menu items
	var FontBold=1;				// Bold menu items 1 or 0
	var FontItalic=0;			// Italic menu items 1 or 0
	var MenuTextCentered="center";		// Item text position left, center or right
	var MenuCentered="center";		// Menu horizontal position can be: left, center, right, justify,
						//  leftjustify, centerjustify or rightjustify. PartOfWindow determines part of window to use
	var MenuVerticalCentered="top";		// Menu vertical position top, middle,bottom or static
	var ChildOverlap=0;			// horizontal overlap child/ parent
	var ChildVerticalOverlap=0;		// vertical overlap child/ parent
	var StartLeft=-10;			// Menu offset x coordinate. If StartLeft is between 0 and 1 StartLeft is calculated as part of windowwidth
	var VerCorrect=0;			// Multiple frames y correction
	var HorCorrect=0;			// Multiple frames x correction
	//var LeftPaddng=6;			// Left padding
	var LeftPaddng=0;			// Left padding
	var TopPaddng=4;			// Top padding
	var FirstLineHorizontal=1;		// First level items layout horizontal 1 or 0
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
//var Subbghighcolor = "#284a71";
var Subbghighcolor = "#000000";
var Subfonthighcolor="#5e91cc"
var Subfontcolor = "#FFFFFF"
//Le Lacito = The Lacito Lab
Menu1=new Array("The Lacito Lab","","",7,24,120,"","","","","","",-1,-1,-1,"","");
	Menu1_1=new Array("Presentation",BaseMenuHref+"themes/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_2=new Array("Conferences",BaseMenuHref+"colloque/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_3=new Array("Field trips",BaseMenuHref+"missions/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_4=new Array("Teaching",BaseMenuHref+"enseignement/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_5=new Array("Exhibits",BaseMenuHref+"expos/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_6=new Array("Lectures",BaseMenuHref+"la_recherche/conferences_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu1_7=new Array("Publications",BaseMenuHref+"vient-de-paraitre/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
//La recherche = Research
Menu2=new Array("Research","","",10,24,"","","","","","","",-1,-1,-1,"","");
	Menu2_1=new Array("Presentation",BaseMenuHref+"la_recherche/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_2=new Array("Adoption",BaseMenuHref+"themes/adoption_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_3=new Array("Description and typology",BaseMenuHref+"themes/comparaison/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_4=new Array("Indefinites",BaseMenuHref+"themes/indefini_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_5=new Array("Metaphor(s)",BaseMenuHref+"themes/metaphore_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_6=new Array("Public Places",BaseMenuHref+"themes/interlocution_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_7=new Array("Balkan Studies",BaseMenuHref+"themes/balkans/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_8=new Array("Dravidian Languages",BaseMenuHref+"themes/dravidien/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_9=new Array("Oceanic Studies",BaseMenuHref+"themes/oceanie/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu2_10=new Array("Tibeto-Burman Languages",BaseMenuHref+"themes/tibeto-birman/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
    
//Langues et pays = Languages & countries
Menu3=new Array("Studied Languages","","",3,24,"","","","","","","",-1,-1,-1,"","");
	Menu3_1=new Array("By Country",BaseMenuHref+"ALC/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu3_2=new Array("In Alphabetical Order",BaseMenuHref+"ALC/listealpha_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu3_3=new Array("By Language Family",BaseMenuHref+"ALC/listeparfamille_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
//Archives orales = The Oral Archives
Menu4=new Array("The Oral Archives","","",5,24,"","","","","","","",-1,-1,-1,"","");
    Menu4_1=new Array("The Pangloss collection",BaseMenuHref+"pangloss/presentation_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	 Menu4_2=new Array("Submit resources",BaseMenuHref+"pangloss/depot_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	 Menu4_3=new Array("Tools",BaseMenuHref+"pangloss/outils_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu4_4=new Array("Archive Access",BaseMenuHref+"pangloss/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu4_5=new Array("Search",BaseMenuHref+"pangloss/tools/search_en.php","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
	
//Projets associés = Projects (ou Collaborative Research?)
Menu5=new Array("Collab. Research","","",6,24,"","","","","","","",-1,-1,-1,"","");
	Menu5_1=new Array("Presentation",BaseMenuHref+"partenariat/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_2=new Array("Dad types in Saudi Arabia",BaseMenuHref+"partenariat/index.htm#dad-types","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_3=new Array("A documentation of Laz",BaseMenuHref+"partenariat/index.htm#laz","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_4=new Array("The Kurumba Languages",BaseMenuHref+"partenariat/index.htm#kurumba","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_5=new Array("EuroSlav",BaseMenuHref+"partenariat/euroslav/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_6=new Array("HimalCo","javascript:NewWin=window.open(\"http://himalco.hypotheses.org\",\"NWin\");window[\"NewWin\"].focus()","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	<!--Menu5_3=new Array("Brahmaputra Studies","javascript:NewWin=window.open(\"http://brahmaputra.ceh.vjf.cnrs.fr\",\"NWin\");window[\"NewWin\"].focus()","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");-->
	

//Publications = Publications
Menu6=new Array("Publications",BaseMenuHref+ "publications/publications_en.php","",0,24,"","","","","","","",-1,-1,-1,"","");

//Biblio-thèmes = Biblio-themes
Menu7=new Array("Biblio-themes","","",3,24,"","","","","","","",-1,-1,-1,"","");
    Menu7_1=new Array("Atlas",BaseMenuHref+"colloque/geographie/atlas_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu7_2=new Array("A.-G. Haudricourt",BaseMenuHref+"membres/haudricourt_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu7_3=new Array("Actances",BaseMenuHref+"actances/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	
//Annuaire = Directory
Menu8=new Array("Directory","","",3,24,"","","","","","","",-1,-1,-1,"","");
    Menu8_1=new Array("Alphabetical list",BaseMenuHref+"membres/index_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu8_2=new Array("Administrative Structure",BaseMenuHref+"pratique/structure_admin_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
    Menu8_3=new Array("Organizational Chart",BaseMenuHref+"pratique/organigramme_en.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");


