
 
			<?php require_once('Connections/connect_publiCNRS.php');

if (isset($_GET['NomAuteur'])) {
  $NomAuteur = $_GET['NomAuteur'];
}
if (isset($_GET['NomPrenomAuteur'])) {
  $NomPrenomAuteur = $_GET['NomPrenomAuteur'];
}
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=OUV">Ouvrages</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=COV">Chapitres d\'ouvrage</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=ART">Articles</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=TRU">Th&egrave;ses</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=COL">Communications</a> -- ';
				echo '<a href="publications_listebis.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=CRO">Comptes rendus</a> -- ';
				echo '<a href="publications_liste.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'">Tout</a>';
			?>          
          