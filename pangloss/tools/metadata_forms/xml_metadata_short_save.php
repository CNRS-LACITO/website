
<?php


ini_set('display_errors', 0); 

$metadata=$_POST['metadata'];

/* Récupération des informations pour les métadonnée d'une ressource audio */
if ($metadata=="metadata_sound"){
	
$audio_file=stripslashes($_POST['audio_file']);
	
$title=stripslashes($_POST['title']);
$lang_title=stripslashes($_POST['lang_title']);
$lang_title_other=stripslashes($_POST['lang_title_other']);



$language=stripslashes($_POST['language']);
$code_language=stripslashes($_POST['code_language']);



$place=stripslashes($_POST['place']);
$latitude=stripslashes($_POST['latitude']);
$longitude=stripslashes($_POST['longitude']);


$linguistique=stripslashes($_POST['linguistique']);

$access=stripslashes($_POST['access']);




$hour=stripslashes($_POST['hour']);
$minute=stripslashes($_POST['minute']);
$second=stripslashes($_POST['second']);

$publisher=stripslashes($_POST['publisher']);

//$collection=$_POST['collection'];

$year=stripslashes($_POST['year']);
$month=stripslashes($_POST['month']);
$day=stripslashes($_POST['day']);

$date=stripslashes($_POST['date']);


$format=stripslashes($_POST['format']);


$copyright=stripslashes($_POST['copyright']);



$depositor=stripslashes($_POST['depositor']);
$researcher=stripslashes($_POST['researcher']);
$speaker=stripslashes($_POST['speaker']);


$depositor_gr=split("\n",$depositor);

$researcher_gr=split("\n",$researcher);

$speaker_gr=split("\n",$speaker);



$code_language_maj=strtoupper($code_language);

$note=stripslashes($_POST['note']);


/*unlink('metadata/metadata_sound_short.xml');*/

// 1 : on ouvre le fichier
$fic = fopen("metadata/$audio_file.xml", 'w+');

// 2 : on fera ici nos opérations sur le fichier...

/* En tete du fichier xml de métadonnées*/
$string="<catalog xmlns=\"http://crdo.risc.cnrs.fr/schemas/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
    xmlns:oai=\"http://www.openarchives.org/OAI/2.0/\" xmlns:crdo=\"http://crdo.risc.cnrs.fr/schemas/\"
    xmlns:olac=\"http://www.language-archives.org/OLAC/1.1/\"
    xmlns:dcterms=\"http://purl.org/dc/terms/\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
    xsi:schemaLocation=\"http://crdo.risc.cnrs.fr/schemas/ http://crdo.risc.cnrs.fr/schemas/metadata.xsd\">\n\n";
fputs($fic,$string);

$date_courante=date("Y-m-d");

$string="<crdo:item crdo:datestamp=\"$date_courante\" crdo:id=\"crdo-".$code_language_maj."_****A_REMPLIR(titre)****_SOUND\">\n";
fputs($fic,$string);


if ($title!="" and $lang_title!="" and $lang_title!="other"){
	$string="<dc:title xml:lang=\"$lang_title\">$title</dc:title>\n"; 
	
fputs($fic,$string);
}
else if ($title!="" and $lang_title=="other" and $lang_title_other!=""){
	$string="<dc:title xml:lang=\"$lang_title_other\">$title</dc:title>\n"; 
fputs($fic,$string);
}



$string="<dc:subject xsi:type=\"olac:language\" olac:code=\"$code_language\">$language</dc:subject>\n"; 
fputs($fic,$string);

$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language\"/>\n"; 
fputs($fic,$string);

$string="<dcterms:spatial>$place</dcterms:spatial>\n"; 
fputs($fic,$string);

if ($latitude!="" and $longitude!=""){
$string="<dcterms:spatial xsi:type=\"dcterms:Point\">east=$longitude; north=$latitude;</dcterms:spatial>\n"; 
fputs($fic,$string);
}

for($i = 0, $c = count($depositor_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"depositor\">".$depositor_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
}



if ($researcher!=""){
	
	for($i = 0, $c = count($researcher_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"researcher\">".$researcher_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}
if ($speaker!=""){
	
	for($i = 0, $c = count($speaker_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"speaker\">".$speaker_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

$string="<dc:publisher>".$publisher."</dc:publisher>\n"; 
fputs($fic,$string);


/*$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"primary_text\"/>\n";
fputs($fic,$string);*/

/*$string="<dc:type xsi:type=\"olac:discourse-type\" olac:code=\"$discours\"/>\n";
fputs($fic,$string);*/


$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"$linguistique\"/>\n";
	fputs($fic,$string);    

        
$string="<dc:format xsi:type=\"dcterms:IMT\">audio/$format</dc:format>\n";
		fputs($fic,$string);  
 
 
 
 $string="<dc:type xsi:type=\"dcterms:DCMIType\">Sound</dc:type>\n";
		fputs($fic,$string);  
        
 if ($year!="" and $month!="" and $day!=""){
$string="<dcterms:created xsi:type=\"dcterms:W3CDTF\">$year-$month-$day</dcterms:created> \n";
fputs($fic,$string);
 }
 
 else if ($year!="" and $month!=""){
$string="<dcterms:created xsi:type=\"dcterms:W3CDTF\">$year-$month</dcterms:created> \n";
fputs($fic,$string);
 }
 
 else if ($year!=""){
$string="<dcterms:created xsi:type=\"dcterms:W3CDTF\">$year</dcterms:created> \n";
fputs($fic,$string);
 }


if ($hour==""){$hour_t="";}else{$hour_t=$hour."H";}
if ($minute==""){$minute_t="";}else{$minute_t=$minute."M";}
if ($second==""){$second_t="";}else{$second_t=$second."S";}
 
$string="<dcterms:extent>PT".$hour_t.$minute_t.$second_t."</dcterms:extent>\n";
fputs($fic,$string);



$string="<dc:identifier xsi:type=\"dcterms:URI\">[$audio_file] http://cocoon.tge-adonis.fr/data/****A_REMPLIR(nom_chercheur/nom fichier)****.wav </dc:identifier>\n";
fputs($fic,$string);

$string="<dcterms:isRequiredBy xsi:type=\"dcterms:URI\"
            >oai:crdo.vjf.cnrs.fr:***A_REMPLIR(identifiant)****</dcterms:isRequiredBy>\n";
fputs($fic,$string);


if ($access=="access_ok"){
	
	
	$string="<dcterms:accessRights>Freely available for non-commercial use</dcterms:accessRights>\n"; 
	fputs($fic,$string);
	$string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc-nd/2.5/</dcterms:license>\n"; 
	fputs($fic,$string); 
}
else {
	$string="<dcterms:accessRights>Private data</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}




	$string="<dc:rights>Copyright (c) ".$copyright."</dc:rights>\n";
fputs($fic,$string);



   
		$string="<crdo:collection>A REMPLIR</crdo:collection>\n";
		fputs($fic,$string);    
    


if ($note!="") {   
		$string="<crdo:comment>$note</crdo:comment>\n";	
		fputs($fic,$string);
}

 
$string="</crdo:item>\n";
fputs($fic,$string);

$string="</catalog>";
fputs($fic,$string);

// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($fic);


// Vous voulez afficher un xml
header('Content-type: application/xml');

// Il sera nommé metadata_sound.xml
header("Content-Disposition: attachment; filename=\"$audio_file.xml\"");

// Le source du fichier xml
readfile("metadata/$audio_file.xml");

unlink("metadata/$audio_file.xml");

}



/* Récupération des informations pour les métadonnée d'une ressource d'annotations */
else if ($metadata=="metadata_text") {
	
$audio_file=stripslashes($_POST['audio_file2']);
$annot_file=stripslashes($_POST['annot_file2']);
	
$title=stripslashes($_POST['title2']);
$lang_title=stripslashes($_POST['lang_title2']);
$lang_title_other=stripslashes($_POST['lang_title_other2']);


$language=stripslashes($_POST['language2']);
$code_language=stripslashes($_POST['code_language2']);

$place=stripslashes($_POST['place2']);
$latitude=stripslashes($_POST['latitude2']);
$longitude=stripslashes($_POST['longitude2']);


$linguistique=stripslashes($_POST['linguistique2']);

$access=stripslashes($_POST['access2']);

$publisher=stripslashes($_POST['publisher2']);

//$collection=stripslashes($_POST['collection2'];

$format=stripslashes($_POST['format2']);


$copyright=stripslashes($_POST['copyright2']);


$depositor=stripslashes($_POST['depositor2']);
$researcher=stripslashes($_POST['researcher2']);
$speaker=stripslashes($_POST['speaker2']);


$depositor_gr=split("\n",$depositor);

$researcher_gr=split("\n",$researcher);

$speaker_gr=split("\n",$speaker);

$code_language_maj=strtoupper($code_language);

$note=stripslashes($_POST['note2']);

/*unlink('metadata/metadata_text_short.xml');*/

// 1 : on ouvre le fichier
$fic = fopen("metadata/$annot_file.xml", 'w+');

// 2 : on fera ici nos opérations sur le fichier...

/* En tete du fichier xml de métadonnées*/
$string="<catalog xmlns=\"http://crdo.risc.cnrs.fr/schemas/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
    xmlns:oai=\"http://www.openarchives.org/OAI/2.0/\" xmlns:crdo=\"http://crdo.risc.cnrs.fr/schemas/\"
    xmlns:olac=\"http://www.language-archives.org/OLAC/1.1/\"
    xmlns:dcterms=\"http://purl.org/dc/terms/\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
    xsi:schemaLocation=\"http://crdo.risc.cnrs.fr/schemas/ http://crdo.risc.cnrs.fr/schemas/metadata.xsd\">\n\n";
fputs($fic,$string);

$date_courante=date("Y-m-d");

$string="<crdo:item crdo:datestamp=\"$date_courante\" crdo:id=\"crdo-".$code_language_maj."_****A_REMPLIR(titre)****\">\n";
fputs($fic,$string);



if ($title!="" and $lang_title!="" and $lang_title!="other"){
	$string="<dc:title xml:lang=\"$lang_title\">$title</dc:title>\n"; 
fputs($fic,$string);
}
else if ($title!="" and $lang_title=="other" and $lang_title_other!=""){
	$string="<dc:title xml:lang=\"$lang_title_other\">$title</dc:title>\n"; 
fputs($fic,$string);
}


$string="<dc:subject xsi:type=\"olac:language\" olac:code=\"$code_language\">$language</dc:subject>\n"; 
fputs($fic,$string);

$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language\"/>\n"; 
fputs($fic,$string);


$string="<dcterms:spatial>".$place."</dcterms:spatial>\n"; 
fputs($fic,$string);

if ($latitude!="" and $longitude!=""){
$string="<dcterms:spatial xsi:type=\"dcterms:Point\">east=$longitude; north=$latitude;</dcterms:spatial>\n"; 
fputs($fic,$string);
}

for($i = 0, $c = count($depositor_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"depositor\">".$depositor_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
}

if ($researcher!=""){
	
	for($i = 0, $c = count($researcher_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"researcher\">".$researcher_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}
if ($speaker!=""){
	
	for($i = 0, $c = count($speaker_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"speaker\">".$speaker_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

$string="<dc:publisher>".$publisher."</dc:publisher>\n"; 
fputs($fic,$string);




/*$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"primary_text\"/>\n";
fputs($fic,$string);*/

if ($linguistique!="") {
   	$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"$linguistique\"/>\n";
		fputs($fic,$string);    
    
}

if  ($format=="xml") {
$string="<dc:format xsi:type=\"dcterms:IMT\">text/xml</dc:format>\n";
		fputs($fic,$string);

$string="<dc:type xsi:type=\"dcterms:DCMIType\">Text</dc:type>\n";
		fputs($fic,$string);
		
		
		
$string="<dcterms:conformsTo xsi:type=\"dcterms:URI\"
            >oai:crdo.vjf.cnrs.fr:crdo-dtd_archive</dcterms:conformsTo>\n";
fputs($fic,$string);

}
else if ($format=="pdf"){
	$string="<dc:format xsi:type=\"dcterms:IMT\">application/pdf</dc:format>\n";
		fputs($fic,$string);

$string="<dc:type xsi:type=\"dcterms:DCMIType\">Text</dc:type>\n";
		fputs($fic,$string);
}
else if ($format=="text"){
	$string="<dc:format xsi:type=\"dcterms:IMT\">text/txt</dc:format>\n";
		fputs($fic,$string);

$string="<dc:type xsi:type=\"dcterms:DCMIType\">Text</dc:type>\n";
		fputs($fic,$string);
}



$string="<dc:identifier xsi:type=\"dcterms:URI\">[$annot_file]http://cocoon.tge-adonis.fr/exist/crdo/****A_REMPLIR(nom_chercheur/code_langue/nom fichier)****.xml</dc:identifier>\n";
fputs($fic,$string);

$string="<dcterms:isFormatOf xsi:type=\"dcterms:URI\">http://cocoon.tge-adonis.fr/exist/crdo/****A_REMPLIR(nom_chercheur/code_langue/nom fichier)****.xhtml</dcterms:isFormatOf>\n";
fputs($fic,$string);	

$string="<dcterms:requires xsi:type=\"dcterms:URI\"
            >[$audio_file](oai:crdo.vjf.cnrs.fr:****A_REMPLIR(identifiant)****)</dcterms:requires>\n";
fputs($fic,$string);



if ($access=="access_ok"){
	
	
	$string="<dcterms:accessRights>Freely available for non-commercial use</dcterms:accessRights>\n"; 
	fputs($fic,$string);
	$string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc-nd/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);
}
else {
	$string="<dcterms:accessRights>Private data</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}

	$string="<dc:rights>Copyright (c) ".$copyright."</dc:rights>\n";
fputs($fic,$string);


if ($collection!="") {
    for ($i = 0, $c = count($collection); $i < $c; $i++) {
		$string="<crdo:collection>$collection[$i]</crdo:collection>\n";
		fputs($fic,$string);    
    }
}

if ($note!="") {   
		$string="<crdo:comment>$note</crdo:comment>\n";	
		fputs($fic,$string);
}

$string="</crdo:item>\n";
fputs($fic,$string);




$string="</catalog>";
fputs($fic,$string);
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($fic);
	
	
// Vous voulez afficher un xml
header('Content-type: application/xml');

// Il sera nommé metadata_text.xml
header("Content-Disposition: attachment; filename=\"$annot_file.xml\"");

// Le source du fichier xml
readfile("metadata/$annot_file.xml");	

unlink("metadata/$annot_file.xml");
}



/*if ($metadata=="metadata_sound"){
// Vous voulez afficher un xml
header('Content-type: application/xml');

// Il sera nommé metadata_sound.xml
header('Content-Disposition: attachment; filename="metadata_sound_short.xml"');

// Le source du fichier xml
readfile('metadata/metadata_sound_short.xml');
}
else if ($metadata=="metadata_text"){
// Vous voulez afficher un xml
header('Content-type: application/xml');

// Il sera nommé metadata_text.xml
header('Content-Disposition: attachment; filename="metadata_text_short.xml"');

// Le source du fichier xml
readfile('metadata/metadata_text_short.xml');
}*/
?>