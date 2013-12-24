 /***********************************************
*	(c) Ger Versluis 2000 version 9.50 24 July 2003	          *
*	You may use this script on non commercial sites.	          *
*	www.burmees.nl/menu			          *
*	You may remove all comments for faster loading	          *		
************************************************/
	var NoOffFirstLineMenus=6;		// Number of main menu  items
						            // Colorvariables:
						            // Color variables take HTML predefined color names or "#rrggbb" strings
						            //For transparency make colors and border color ""
	var LowBgColor="#FFFFFF";			// Background color when mouse is not over
	var HighBgColor="#FFFFFF";			// Background color when mouse is over
	var FontLowColor="#F09415";		// Font color when mouse is not over
	var FontHighColor="#BE6E00";		// Font color when mouse is over
	var BorderColor="#F09415";			// Border color
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
	var PartOfWindow=.8;			// PartOfWindow: When MenuCentered is justify, sets part of window width to stretch to

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
   
var Subbgcolor = "#F09415";
var Subbghighcolor = "#F09415";
var Subfonthighcolor="#BE6E00"
var Subfontcolor = "#FFFFFF"

//Le Lacito
Menu1=new Array("Le Lacito",BaseMenuHref+ "themes/index.htm","",0,24,150,"","","","","","",-1,-1,-1,"","");

//La recherche
Menu2=new Array("La recherche",BaseMenuHref+ "la_recherche/index.htm","",0,24,"","","","","","","",-1,-1,-1,"","");
	
//Langues et pays
Menu3=new Array("Langues et pays",BaseMenuHref+ "ALC/index.htm","",0,24,"","","","","","","",-1,-1,-1,"","");

//Publications
Menu4=new Array("Publications",BaseMenuHref+ "publications/publications.php","",0,24,"","","","","","","",-1,-1,-1,"","");

//Archives orales
Menu5=new Array("Archives orales","","",2,24,"","","","","","","",-1,-1,-1,"","");
    Menu5_1=new Array("Pr\xE9sentation",BaseMenuHref+"archivage/presentation.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");
	Menu5_2=new Array("Acc\xE8s aux corpus",BaseMenuHref+"archivage/index.htm","",0,20,150,Subbgcolor,Subbghighcolor,Subfontcolor,Subfonthighcolor,"","",8,0,-1,"","");    
	
//Projets associés
Menu6=new Array("Projets associ\xE9s",BaseMenuHref+ "partenariat/index.htm","",0,24,"","","","","","","",-1,-1,-1,"","");