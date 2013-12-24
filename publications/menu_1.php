
 
			<?php require_once('Connections/connect_publiCNRS.php');

if (isset($_GET['NomAuteur'])) {
  $NomAuteur = $_GET['NomAuteur'];
}
if (isset($_GET['NomPrenomAuteur'])) {
  $NomPrenomAuteur = $_GET['NomPrenomAuteur'];
}
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=OUV">Ouvrages</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=COV">Chapitres</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=ART">Articles</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=TRU">Th&egrave;ses</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=CRO">CR</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=AUT">Autres</a>--';
				echo '<a href="publications_liste.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'">TOUT</a>';
				echo "    ||    ";
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=COL">Communications</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=RAP">Rapports</a> -- ';
				
				         
   ?>       