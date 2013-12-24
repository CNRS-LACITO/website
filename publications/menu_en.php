
 
			<?php require_once('Connections/connect_publiCNRS.php');

if (isset($_GET['NomAuteur'])) {
  $NomAuteur = $_GET['NomAuteur'];
}
if (isset($_GET['NomPrenomAuteur'])) {
  $NomPrenomAuteur = $_GET['NomPrenomAuteur'];
}
				echo '<a href="publications_listebis_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=OUV">Books</a> -- ';
				echo '<a href="publications_listebis_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=COV">Chapters</a> -- ';
				echo '<a href="publications_listebis_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=ART">Articles</a> -- ';
				echo '<a href="publications_listebis_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=TRU">Theses</a> -- ';
				echo '<a href="publications_listebis_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=COL">Conferences</a> -- ';
				echo '<a href="publications_listebis_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'&Type=CRO">Reviews</a> -- ';
				echo '<a href="publications_liste_en.php?NomAuteur='.$NomAuteur.'&NomPrenomAuteur='.$NomPrenomAuteur.'">All</a>';
			?>          
          