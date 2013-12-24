#! C:\perl\bin\perl.exe
# Perl trim function to remove whitespace from the start and end of the string
sub trim($)
{
	my $string = shift;
	$string =~ s/^\s+//;
	$string =~ s/\s+$//;
	return $string;
}
$prems = $ARGV[0];
  $deux = $ARGV[1];
  $trois = $ARGV[2];
print "Demarrage de la fusion\n";

# open (IN1, 'C:\Program Files\EasyPHP-5.3.2\www\lacito2\archivage\tools\metadata\metadata_lacito_int.xml')|| die "Probl�me � l\'ouverture du fichier d'entr�e";

# open (IN2, 'C:\Program Files\EasyPHP-5.3.2\www\lacito2\archivage\tools\metadata\metadata_others.xml')|| die "Probl�me � l\'ouverture du fichier d'entr�e";

# open (OUT, '>C:\Program Files\EasyPHP-5.3.2\www\lacito2\archivage\tools\metadata\metadata_lacito.xml')|| die "Probl�me � l\'ouverture du fichier de sortie";
 
 open (IN1, $ARGV[0])|| die "Probl�me � l\'ouverture du fichier d'entr�e";

open (IN2, $ARGV[1])|| die "Probl�me � l\'ouverture du fichier d'entr�e";

open (OUT, ">$ARGV[2]")|| die "Probl�me � l\'ouverture du fichier de sortie";
 

$i=-1;
$s=0;
$p=0;
$att=0;
my @tab_egg;
my @tab_sound;



while ($line_egg1=<IN2>) {
 
	if ($line_egg1 =~ m/<crdo:item crdo:datestamp="(.*)" crdo:id="(.*)_EGG">/){

	$tab_egg[$p]=$2."_EGG";
	$att=1;
		
	}
	
	if (($line_egg1 =~ m/.*oai:crdo.vjf.cnrs.fr:(.*)_SOUND</) and ($att==1)){
	$tab_sound[$p]=$1."_SOUND";
	$p++;
	$att=0;

	}
	
	if ($line_egg1 =~ m/<\/crdo:item>/){

		$att=0;
		$aff=$p-1;
		# print " $tab_egg[$aff]\n";
		# print " $tab_sound[$aff]\n";
	}
}

close(IN2);
# open (IN2, 'C:\Program Files\EasyPHP-5.3.2\www\lacito2\archivage\tools\metadata\metadonnees_autres.xml')|| die "Probl�me � l\'ouverture du fichier d'entr�e";
open (IN2, $ARGV[1])|| die "Probl�me � l\'ouverture du fichier d'entr�e";

$item=0;
my $taille = scalar(@tab_sound);

while ($line_tout=<IN1>) {


	if ($line_tout =~ m/<identifier>oai:crdo.vjf.cnrs.fr:(.*)</){
	
	$id_sound=$1;
		for ($v=0; $v<$taille; $v++){
		
			if ($tab_sound[$v] eq $id_sound){
			# print "id\n";
				$item="<dcterms:isRequiredBy xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:type=\"dcterms:URI\">oai:crdo.vjf.cnrs.fr:$tab_egg[$v]</dcterms:isRequiredBy>\n";
				}
			}
	
		}
	if (($line_tout =~ m/<\/olac:olac>/) and not($item eq 1) and not($item eq 0)){
	print OUT "$item\n";
			$item=0;
			}

	if ($line_tout =~ m/<\/ListRecords.*>/){


		while ($line_egg=<IN2>) {
	
		

		if ($line_egg =~ m/<crdo:item crdo:datestamp="(.*)" crdo:id="(.*)">/){
		
			print OUT   "<record>\n<header>\n<identifier>oai:crdo.vjf.cnrs.fr:$2</identifier>\n<datestamp>$1</datestamp>\n<setSpec>Lacito</setSpec>\n</header>\n<metadata>\n";
			print OUT	"<olac:olac xmlns:dc=\"http://purl.org/dc/elements/1.1/\" xmlns:dcterms=\"http://purl.org/dc/terms/\" xmlns:olac=\"http://www.language-archives.org/OLAC/1.1/\" xsi:schemaLocation=\"http://www.language-archives.org/OLAC/1.1/ http://www.language-archives.org/OLAC/1.1/olac.xsd\">\n";
			}
		
		elsif ($line_egg =~ m/<(.*?) xsi:type="(.*?)">((.*)<\/.*?>)/){
			
			print OUT   "<$1 xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:type=\"$2\">$3\n";
			}
			elsif ($line_egg =~ m/<crdo:collection>.*/){
			}
			elsif ($line_egg =~ m/<\/crdo\:item>/){
			print OUT "<\/olac:olac>\n<\/metadata>\n<\/record>\n";
			}
			
		else {
		print OUT "$line_egg\n";
		}
		
	}
	
}

	

print OUT $line_tout; 

}

print "Fini !\n";

	close(IN1);
	close(IN2);
	close(OUT);


	