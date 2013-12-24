<?php

ini_set('display_errors', 0); 

$metadata=$_POST['metadata'];

/* Récupération des informations pour les métadonnée d'une ressource audio */
if ($metadata=="metadata_sound"){
	
$audio_file=stripslashes($_POST['audio_file']);
	
$title=stripslashes($_POST['title']);
$lang_title=stripslashes($_POST['lang_title']);
$lang_title_other=stripslashes($_POST['lang_title_other']);

$title_alt=stripslashes($_POST['title_alt']);
$lang_title_alt=stripslashes($_POST['lang_title_alt']);
$lang_alt_other=stripslashes($_POST['lang_alt_other']);

$title_alt_autre=stripslashes($_POST['title_alt_autre']);
$lang_title_alt_autre=stripslashes($_POST['lang_title_alt_autre']);
$lang_alt_autre_other=stripslashes($_POST['lang_alt_autre_other']);

$language=stripslashes($_POST['language']);
$code_language=stripslashes($_POST['code_language']);

$lg1=stripslashes($_POST['lg1']);
$code_language_1=stripslashes($_POST['code_language_1']);
$lg2=stripslashes($_POST['lg2']);
$code_language_2=stripslashes($_POST['code_language_2']);


$place=stripslashes($_POST['place']);
$latitude=stripslashes($_POST['latitude']);
$longitude=stripslashes($_POST['longitude']);

$discours=stripslashes($_POST['discours']);
$field=stripslashes($_POST['field']);
$linguistique=stripslashes($_POST['linguistique']);

$access=stripslashes($_POST['access']);

$resume=stripslashes($_POST['resume']);
$lang_resume=stripslashes($_POST['lang_resume']);
$lang_resume_other=stripslashes($_POST['lang_resume_other']);


$hour=stripslashes($_POST['hour']);
$minute=stripslashes($_POST['minute']);
$second=stripslashes($_POST['second']);

$publisher=stripslashes($_POST['publisher']);

//$collection=$_POST['collection'];

$year=stripslashes($_POST['year']);
$month=stripslashes($_POST['month']);
$day=stripslashes($_POST['day']);

$date=stripslashes($_POST['date']);

$source=stripslashes($_POST['source']);


$format=stripslashes($_POST['format']);

$licence=stripslashes($_POST['licence']);

$copyright=stripslashes($_POST['copyright']);

$collection=stripslashes($_POST['collection']);


$depositor=stripslashes($_POST['depositor']);
$researcher=stripslashes($_POST['researcher']);
$speaker=stripslashes($_POST['speaker']);
$recorder=stripslashes($_POST['recorder']);
$sponsor=stripslashes($_POST['sponsor']);
$interviewer=stripslashes($_POST['interviewer']);

$depositor_gr=split("\n",$depositor);

$researcher_gr=split("\n",$researcher);

$speaker_gr=split("\n",$speaker);

$recorder_gr=split("\n",$recorder);

$interviewer_gr=split("\n",$interviewer);

$sponsor_gr=split("\n",$sponsor);

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
/* En tete d'un item (une ressource) contenant la date et l'identifiant oai*/
$string="<crdo:item crdo:datestamp=\"$date_courante\" crdo:id=\"crdo-".$code_language_maj."_****A_REMPLIR(titre)****_SOUND\">\n";
fputs($fic,$string);

/* titre principal de la ressources */
if ($title!="" and $lang_title!="" and $lang_title!="other"){
	$string="<dc:title xml:lang=\"$lang_title\">$title</dc:title>\n"; 
fputs($fic,$string);
}
else if ($title!="" and $lang_title=="other" and $lang_title_other!=""){
	$string="<dc:title xml:lang=\"$lang_title_other\">$title</dc:title>\n"; 

fputs($fic,$string);
}

/* titre alternatif */
if ($title_alt!="" and $lang_title_alt!="" and $lang_title_alt!="other"){
	$string="<dcterms:alternative xml:lang=\"$lang_title_alt\">$title_alt</dcterms:alternative>\n"; 
fputs($fic,$string);
}
else if ($title_alt!="" and $lang_title_alt=="other" and $lang_alt_other!=""){
	$string="<dcterms:alternative xml:lang=\"$lang_alt_other\">$title_alt</dcterms:alternative>\n"; 
fputs($fic,$string);
}

/* autre titre alternatif */
if ($title_alt_autre!="" and $lang_title_alt_autre!="" and $lang_title_alt_autre!="other"){
	$string="<dcterms:alternative xml:lang=\"$lang_title_alt_autre\">$title_alt_autre</dcterms:alternative>\n"; 
fputs($fic,$string);
}
else if ($title_alt_autre!="" and $lang_title_alt=="other" and $lang_alt_autre_other!=""){
	$string="<dcterms:alternative xml:lang=\"$lang_alt_autre_other\">$title_alt_autre</dcterms:alternative>\n"; 
fputs($fic,$string);
}

/* sujet d'étude, la langue étudiée */
$string="<dc:subject xsi:type=\"olac:language\" olac:code=\"$code_language\">$language</dc:subject>\n"; 
fputs($fic,$string);

/* langues présentes dans l'enregistrement */
$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language\"/>\n"; 
fputs($fic,$string);

if ($lg1!=""){
$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language_1\">$lg1</dc:language>\n"; 
fputs($fic,$string);
}

if ($lg2!=""){
$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language_2\">$lg2</dc:language>\n";  
fputs($fic,$string);
}

/* lieu de l'enregistrement */
$string="<dcterms:spatial>$place</dcterms:spatial>\n"; 
fputs($fic,$string);

if ($latitude!="" and $longitude!=""){
$string="<dcterms:spatial xsi:type=\"dcterms:Point\">east=$longitude; north=$latitude;</dcterms:spatial>\n"; 
fputs($fic,$string);
}

/* liste des contributeurs */
for($i = 0, $c = count($depositor_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"depositor\">".$depositor_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
}


//chercheurs
if ($researcher!=""){
	
	for($i = 0, $c = count($researcher_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"researcher\">".$researcher_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

// locuteurs
if ($speaker!=""){
	
	for($i = 0, $c = count($speaker_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"speaker\">".$speaker_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

// personne qui enregistre
if ($recorder!=""){
	
	for($i = 0, $c = count($recorder_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"recorder\">".$recorder_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

// personne qui interviewe
if ($interviewer!=""){
	
	for($i = 0, $c = count($interviewer_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"interviewer\">".$interviewer_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

// sponsors
if ($sponsor!=""){
	
	for($i = 0, $c = count($sponsor_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"sponsor\">".$sponsor_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

// celui qui publie (en général un nom de labo)
$string="<dc:publisher>".$publisher."</dc:publisher>\n"; 
fputs($fic,$string);


/*$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"primary_text\"/>\n";
fputs($fic,$string);*/

/*$string="<dc:type xsi:type=\"olac:discourse-type\" olac:code=\"$discours\"/>\n";
fputs($fic,$string);*/

// type du discours
if ($discours!="") {
    for ($i = 0, $c = count($discours); $i < $c; $i++) {
		$string="<dc:type xsi:type=\"olac:discourse-type\" olac:code=\"$discours[$i]\"/>\n";
		fputs($fic,$string);    
    }
}

if ($field!="") {
    for ($i = 0, $c = count($field); $i < $c; $i++) {
		$string="<dc:subject xsi:type=\"olac:linguistic-field\" olac:code=\"$field[$i]\"/>\n";
		fputs($fic,$string);    
    }
}

// type linguistique
$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"$linguistique\"/>\n";
	fputs($fic,$string);    

// format de la ressource        
$string="<dc:format xsi:type=\"dcterms:IMT\">audio/$format</dc:format>\n";
		fputs($fic,$string);  
 

// source de la ressource 
 if ($source!="") {
		$string="<dc:source>$source</dc:source>\n";
		fputs($fic,$string);  
}

// type de la ressource (ici : son)
 $string="<dc:type xsi:type=\"dcterms:DCMIType\">Sound</dc:type>\n";
		fputs($fic,$string);  
// date de l'enregistrement        
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

// durée de l'enregistrement
if ($hour==""){$hour_t="";}else{$hour_t=$hour."H";}
if ($minute==""){$minute_t="";}else{$minute_t=$minute."M";}
if ($second==""){$second_t="";}else{$second_t=$second."S";}
 
$string="<dcterms:extent>PT".$hour_t.$minute_t.$second_t."</dcterms:extent>\n";
fputs($fic,$string);


// description du contenu de la ressource (de quoi ca parle)
if ($resume!="" and $lang_resume!="" and $lang_resume!="other"){
	$string="<dc:description xml:lang=\"$lang_resume\">$resume</dc:description>";
	fputs($fic,$string);
}
else if ($resume!="" and $lang_resume=="other" and $lang_resume_other!=""){
	$string="<dc:description xml:lang=\"$lang_resume_other\">$resume</dc:description>";
	fputs($fic,$string);
}

else if ($resume!="" and $lang_resume=="other" and $lang_resume_other!=""){
	$string="<dc:description xml:lang=\"$lang_resume_other\">$resume</dc:description>";
	fputs($fic,$string);
}

	
// identifiant de la ressource (uri)
$string="<dc:identifier xsi:type=\"dcterms:URI\">[$audio_file] http://cocoon.tge-adonis.fr/data/****A_REMPLIR(nom_chercheur/nom fichier)****.wav </dc:identifier>\n";
fputs($fic,$string);

/*// lien éventuel avec d'autres ressources 
$string="<dcterms:isRequiredBy xsi:type=\"dcterms:URI\"
            >oai:crdo.vjf.cnrs.fr:***A_REMPLIR(identifiant)****</dcterms:isRequiredBy>\n";
fputs($fic,$string);*/

// acces public ou restreint
if ($access=="access_ok"){
	
	
	$string="<dcterms:accessRights>Freely available for non-commercial use</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}
else {
	$string="<dcterms:accessRights>Private data</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}

// licence creative commons choisie
if ($access=="access_ok"){
if ($licence="by-nc") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);    
}
else if ($licence="by-nc-sa") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc-sa/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);    
}
else if ($licence="by-nc-nd") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc-nd/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);	     
}
else {
	 $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);
	}
}

// copyright
	$string="<dc:rights>Copyright (c) ".$copyright."</dc:rights>\n";
fputs($fic,$string);

// collection d'appartenance
if ($collection!="") {
    for ($i = 0, $c = count($collection); $i < $c; $i++) {
		$string="<crdo:collection>$collection[$i]</crdo:collection>\n";
		fputs($fic,$string);    
    }
}

// commentaire éventuel pour celui qui va traiter la ressource
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
?>