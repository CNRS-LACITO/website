
<?php

$metadata=$_POST['metadata'];


if ($metadata=="metadata_sound"){
	
$audio_file=$_POST['audio_file'];
	
$title=$_POST['title'];
$lang_title=$_POST['lang_title'];
$lang_title_other=$_POST['lang_title_other'];

$title_alt=$_POST['title_alt'];
$lang_title_alt=$_POST['lang_title_alt'];
$lang_alt_other=$_POST['lang_alt_other'];


$language=$_POST['language'];
$code_language=$_POST['code_language'];

$lg1=$_POST['lg1'];
$code_language_1=$_POST['code_language_1'];
$lg2=$_POST['lg2'];
$code_language_2=$_POST['code_language_2'];


$place=$_POST['place'];
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];

$discours=$_POST['discours'];
$field=$_POST['field'];
$linguistique=$_POST['linguistique'];

$access=$_POST['access'];

$resume=$_POST['resume'];
$lang_resume=$_POST['lang_resume'];
$lang_resume_other=$_POST['lang_resume_other'];


$hour=$_POST['hour'];
$minute=$_POST['minute'];
$second=$_POST['second'];

$publisher=$_POST['publisher'];

//$collection=$_POST['collection'];

$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];

$date=$_POST['date'];

$source=$_POST['source'];


$format=$_POST['format'];

$licence=$_POST['licence'];

$copyright=$_POST['copyright'];

$collection=$_POST['collection'];


$depositor=$_POST['depositor'];
$researcher=$_POST['researcher'];
$speaker=$_POST['speaker'];
$recorder=$_POST['recorder'];
$sponsor=$_POST['sponsor'];
$interviewer=$_POST['interviewer'];

$depositor_gr=split("\n",$depositor);

$researcher_gr=split("\n",$researcher);

$speaker_gr=split("\n",$speaker);

$recorder_gr=split("\n",$recorder);

$interviewer_gr=split("\n",$interviewer);

$sponsor_gr=split("\n",$sponsor);

$code_language_maj=strtoupper($code_language);

$note=$_POST['note'];


unlink('metadata/metadata_sound.xml');

// 1 : on ouvre le fichier
$fic = fopen('metadata/metadata_sound.xml', 'w+');

// 2 : on fera ici nos opérations sur le fichier...
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


if ($title_alt!="" and $lang_title_alt!="" and $lang_title_alt!="other"){
	$string="<dcterms:alternative xml:lang=\"$lang_title_alt\">$title_alt</dcterms:alternative>\n"; 
fputs($fic,$string);
}
else if ($title_alt!="" and $lang_title_alt=="other" and $lang_alt_other!=""){
	$string="<dcterms:alternative xml:lang=\"$lang_alt_other\">$title_alt</dcterms:alternative>\n"; 
fputs($fic,$string);
}

$string="<dc:subject xsi:type=\"olac:language\" olac:code=\"$code_language\">$language</dc:subject>\n"; 
fputs($fic,$string);

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
if ($recorder!=""){
	
	for($i = 0, $c = count($recorder_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"recorder\">".$recorder_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}
if ($interviewer!=""){
	
	for($i = 0, $c = count($interviewer_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"interviewer\">".$interviewer_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

if ($sponsor!=""){
	
	for($i = 0, $c = count($sponsor_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"sponsor\">".$sponsor_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

$string="<dc:publisher>".$publisher."</dc:publisher>\n"; 
fputs($fic,$string);


/*$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"primary_text\"/>\n";
fputs($fic,$string);*/

/*$string="<dc:type xsi:type=\"olac:discourse-type\" olac:code=\"$discours\"/>\n";
fputs($fic,$string);*/

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

$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"$linguistique\"/>\n";
	fputs($fic,$string);    

        
$string="<dc:format xsi:type=\"dcterms:IMT\">audio/$format</dc:format>\n";
		fputs($fic,$string);  
 
 
 if ($source!="") {
		$string="<dc:source>$source</dc:source>\n";
		fputs($fic,$string);  
}

 
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


if ($resume!="" and $lang_resume!="" and $lang_resume!="other"){
	$string="<dc:description xml:lang=\"$lang_resume\">$resume</dc:description>";
	fputs($fic,$string);
}
else if ($resume!="" and $lang_resume=="other" and $lang_resume_other!=""){
	$string="<dc:description xml:lang=\"$lang_resume_other\">$resume</dc:description>";
	fputs($fic,$string);
}

	

$string="<dc:identifier xsi:type=\"dcterms:URI\">
                                    [$audio_file]http://crdo.risc.cnrs.fr/data/****A_REMPLIR(nom_chercheur/nom fichier)****.wav </dc:identifier>\n;";
fputs($fic,$string);

$string="<dcterms:isRequiredBy xsi:type=\"dcterms:URI\"
            >oai:crdo.vjf.cnrs.fr:***A_REMPLIR(identifiant)****</dcterms:isRequiredBy>\n";
fputs($fic,$string);


if ($access=="access_ok"){
	
	
	$string="<dcterms:accessRights>Freely available for non-commercial use</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}
else {
	$string="<dcterms:accessRights>Private data</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}


if ($access=="access_ok"){
if ($licence="by-nc") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);    
}
else if ($licence="by-nc-sa") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc_sa/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);    
}
else if ($licence="by-nc-nd") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc_nd/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);	     
}
else {
	 $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);
	}
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
}
 
$string="</crdo:item>\n";
fputs($fic,$string);

$string="</catalog>";
fputs($fic,$string);
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($fic);

}
else if ($metadata=="metadata_text") {
	
$audio_file=$_POST['audio_file2'];
$annot_file=$_POST['annot_file2'];
	
$title=$_POST['title2'];
$lang_title=$_POST['lang_title2'];
$lang_title_other=$_POST['lang_title_other2'];
$title_alt=$_POST['title_alt2'];
$lang_alt=$_POST['lang_alt2'];
$lang_alt_other=$_POST['lang_alt_other2'];

$language=$_POST['language2'];
$code_language=$_POST['code_language2'];

$place=$_POST['place2'];
$latitude=$_POST['latitude2'];
$longitude=$_POST['longitude2'];

$discours=$_POST['discours2'];
$linguistique=$_POST['linguistique2'];

$access=$_POST['access2'];

$resume=$_POST['resume2'];
$lang_resume=$_POST['lang_resume2'];
$lang_resume_other=$_POST['lang_resume_other2'];



$publisher=$_POST['publisher2'];

//$collection=$_POST['collection2'];

$format=$_POST['format2'];

$licence=$_POST['licence2'];

$copyright=$_POST['copyright2'];

$collection=$_POST['collection2'];

$depositor=$_POST['depositor2'];
$researcher=$_POST['researcher2'];
$speaker=$_POST['speaker2'];
$annotator=$_POST['annotator2'];
$translator=$_POST['translator2'];
$transcriber=$_POST['transcriber2'];
$sponsor=$_POST['sponsor2'];
$interviewer=$_POST['interviewer2'];

$lg_trad1=$_POST['lg_trad1'];
$code_language_trad1=$_POST['code_language_trad1'];
$lg_trad2=$_POST['lg_trad2'];
$code_language_trad2=$_POST['code_language_trad2'];
$lg_trad3=$_POST['lg_trad3'];
$code_language_trad3=$_POST['code_language_trad3'];

$depositor_gr=split("\n",$depositor);

$researcher_gr=split("\n",$researcher);

$speaker_gr=split("\n",$speaker);

$interviewer_gr=split("\n",$interviewer);

$translator_gr=split("\n",$translator);

$transcriber_gr=split("\n",$transcriber);

$annotator_gr=split("\n",$annotator);

$sponsor_gr=split("\n",$sponsor);

$code_language_maj=strtoupper($code_language);

$note=$_POST['note2'];

unlink('metadata/metadata_text.xml');

// 1 : on ouvre le fichier
$fic = fopen('metadata/metadata_text.xml', 'w+');

// 2 : on fera ici nos opérations sur le fichier...
$string="<catalog xmlns=\"http://crdo.risc.cnrs.fr/schemas/\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\"
    xmlns:oai=\"http://www.openarchives.org/OAI/2.0/\" xmlns:crdo=\"http://crdo.risc.cnrs.fr/schemas/\"
    xmlns:olac=\"http://www.language-archives.org/OLAC/1.1/\"
    xmlns:dcterms=\"http://purl.org/dc/terms/\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
    xsi:schemaLocation=\"http://crdo.risc.cnrs.fr/schemas/ http://crdo.risc.cnrs.fr/schemas/metadata.xsd\">\n\n";
fputs($fic,$string);

$date=date("Y-m-d");

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


if ($title_alt!="" and $lang_alt!="" and $lang_alt!="other"){
	$string="<dcterms:alternative xml:lang=\"$lang_title_alt\">$title_alt</dcterms:alternative>\n"; 
fputs($fic,$string);
}
else if ($title_alt!="" and $lang_alt=="other" and $lang_alt_other!=""){
	$string="<dcterms:alternative xml:lang=\"$lang_alt_other\">$title_alt</dcterms:alternative>\n"; 
fputs($fic,$string);
}


$string="<dc:subject xsi:type=\"olac:language\" olac:code=\"$code_language\">$language</dc:subject>\n"; 
fputs($fic,$string);

$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language\"/>\n"; 
fputs($fic,$string);

if ($lg_trad1!=""){
$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language_trad1\">$lg_trad1</dc:language>\n"; 
fputs($fic,$string);
}

if ($lg_trad2!=""){
$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language_trad2\">$lg_trad2</dc:language>\n";  
fputs($fic,$string);
}

if ($lg_trad3!=""){
$string="<dc:language xsi:type=\"olac:language\" olac:code=\"$code_language_trad3\">$lg_trad3</dc:language>\n"; 
fputs($fic,$string);
}

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
if ($interviewer!=""){
	
	for($i = 0, $c = count($interviewer_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"interviewer\">".$interviewer_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}
if ($annotator!=""){
	
	for($i = 0, $c = count($annotator_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"annotator\">".$annotator_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

if ($translator!=""){
	
	for($i = 0, $c = count($translator_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"translator\">".$translator_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

if ($transcriber!=""){
	
	for($i = 0, $c = count($transcriber_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"transcriber\">".$transcriber_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}
if ($sponsor!=""){
	
	for($i = 0, $c = count($sponsor_gr); $i < $c; $i++){
		$string="<dc:contributor xsi:type=\"olac:role\" olac:code=\"sponsor\">".$sponsor_gr[$i]."</dc:contributor>\n"; 
		fputs($fic,$string);
	}
}

$string="<dc:publisher>".$publisher."</dc:publisher>\n"; 
fputs($fic,$string);




/*$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"primary_text\"/>\n";
fputs($fic,$string);*/

if ($discours!="") {
    for ($i = 0, $c = count($discours); $i < $c; $i++) {
		$string="<dc:type xsi:type=\"olac:discourse-type\" olac:code=\"$discours[$i]\"/>\n";
		fputs($fic,$string);    
    }
}
if ($linguistique!="") {
    for ($i = 0, $c = count($linguistique); $i < $c; $i++) {
		$string="<dc:type xsi:type=\"olac:linguistic-type\" olac:code=\"$linguistique\"/>\n";
		fputs($fic,$string);    
    }
}

$string="<dc:format xsi:type=\"dcterms:IMT\">text/".$format."</dc:format>\n";
		fputs($fic,$string);

$string="<dc:type xsi:type=\"dcterms:DCMIType\">Text</dc:type>\n";
		fputs($fic,$string);
        

if ($resume!="" and $lang_resume!="" and $lang_resume!="other"){
	$string="<dc:description xml:lang=\"$lang_resume\">$resume</dc:description>";
	fputs($fic,$string);
}
else if ($resume!="" and $lang_resume=="other" and $lang_resume_other!=""){
	$string="<dc:description xml:lang=\"$lang_resume_other\">$resume</dc:description>";
	fputs($fic,$string);
}


$string="<dcterms:conformsTo xsi:type=\"dcterms:URI\"
            >oai:crdo.vjf.cnrs.fr:crdo-dtd_archive</dcterms:conformsTo>\n";
fputs($fic,$string);

$string="<dc:identifier xsi:type=\"dcterms:URI\">[annot_file]http://crdo.risc.cnrs.fr/exist/crdo/****A_REMPLIR(nom_chercheur/code_langue/nom fichier)****.xml</dc:identifier>\n";
fputs($fic,$string);

$string="<dcterms:isFormatOf xsi:type=\"dcterms:URI\">http://crdo.risc.cnrs.fr/exist/crdo/****A_REMPLIR(nom_chercheur/code_langue/nom fichier)****.xhtml</dcterms:isFormatOf>\n";
fputs($fic,$string);	

$string="<dcterms:requires xsi:type=\"dcterms:URI\"
            >[$audio_file](oai:crdo.vjf.cnrs.fr:****A_REMPLIR(identifiant)****)</dcterms:requires>\n";
fputs($fic,$string);



if ($access=="access_ok"){
	
	
	$string="<dcterms:accessRights>Freely available for non-commercial use</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}
else {
	$string="<dcterms:accessRights>Private data</dcterms:accessRights>\n"; 
	fputs($fic,$string);
}


if ($access=="access_ok"){
if ($licence="by-nc") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);    
}
else if ($licence="by-nc-sa") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc_sa/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);    
}
else if ($licence="by-nc-nd") {
   $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc_nd/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);	     
}
else {
	 $string="<dcterms:license xsi:type=\"dcterms:URI\"
            >http://creativecommons.org/licenses/by-nc/2.5/</dcterms:license>\n"; 
	fputs($fic,$string);
	}
}

	$string="<dc:rights>Copyright (c) ".$copyright."</dc:rights>\n";
fputs($fic,$string);


if ($collection!="") {
    for ($i = 0, $c = count($collection); $i < $c; $i++) {
		$string="<crdo:collection>$collection[$i]</crdo:collection>\n";
		fputs($fic,$string);    
    }
}
$string="</crdo:item>\n";
fputs($fic,$string);

if ($note!="") {   
		$string="<crdo:comment>$note</crdo:comment>\n";	
}

$string="</catalog>";
fputs($fic,$string);
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($fic);
	
	
	
}


?>
<?php

if ($metadata=="metadata_sound"){
// Vous voulez afficher un xml
header('Content-type: application/xml');

// Il sera nommé metadata_text.xml
header('Content-Disposition: attachment; filename="metadata_sound.xml"');

// Le source du fichier xml
readfile('metadata/$audio_file.xml');
}
else if ($metadata=="metadata_text"){
// Vous voulez afficher un xml
header('Content-type: application/xml');

// Il sera nommé metadata_text.xml
header('Content-Disposition: attachment; filename="$annot_file.xml"');

// Le source du fichier xml
readfile('metadata/metadata_text.xml');
}
?>