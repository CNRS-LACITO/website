
 
			<?php require_once('Connections/connect_publiCNRS.php');

if (isset($_GET['NomAuteur'])) {
  $NomAuteur = $_GET['NomAuteur'];
}
if (isset($_GET['NomPrenomAuteur'])) {
  $NomPrenomAuteur = $_GET['NomPrenomAuteur'];
}

				echo '<a href="publications_5ans_Type.php?Type=OUV">Ouvrages</a> -- ';
				echo '<a href="publications_5ans_Type.php?Type=COV"> Chapitres</a> -- ';
				echo '<a href="publications_5ans_Type.php?Type=ART"> Articles</a> -- ';
				echo '<a href="publications_5ans_Type.php?Type=TRU"> Th&egrave;ses</a> -- ';
				echo '<a href="publications_5ans_Type.php?Type=CRO"> CR</a> -- ';
				echo '<a href="publications_5ans_Type.php?Type=AUT"> Autres</a> --';
				echo '<a href="publications_5ans.php">  TOUT</a>';
				echo " &nbsp;&nbsp; || &nbsp;&nbsp;   ";
				echo '<a href="publications_5ans_Type.php?Type=COL"> Communications</a> -- ';
				echo '<a href="publications_5ans_Type.php?Type=RAP"> Rapports</a>';
				
				         
   ?>   
   <br/>    