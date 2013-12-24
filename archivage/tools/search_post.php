<?php
	include ('eXist.php');

	$term       = isset($_POST["term"])    ? ($_POST["term"])    : "*";
	$field      = isset($_POST["field"])   ? ($_POST["field"])   : "All";
	$mode       = isset($_POST["mode"])    ? ($_POST["mode"])    : "near";
	$langue     = isset($_POST["langue"])  ? ($_POST["langue"])  : "*";
	$howmany    = isset($_POST["howmany"]) ? ($_POST["howmany"]) : "15";
	$from       = isset($_POST["from"])    ? ($_POST["from"])    : "1";

	$lab     = isset($lab)?     $lab     : "";
	$who     = isset($who)?     $who     : "";
	$metaUrl = isset($metaUrl)? $metaUrl : "http://crdo.risc.cnrs.fr/exist/crdo/details.xq";

	$condDepositor = ($who != "")? "[dc:contributor[@olac:code='depositor']='".$who."']": "";

	echo '<form action="" method="POST">';
	echo '<table class="crdo-request">';
	echo '	<tr>';
	echo '		<th>Terme recherché</th>';
	echo '		<th>Catégorie</th>';
	echo '		<th>Opérateur</th>';
	echo '		<th>Langue</th>';
	echo '		<th colspan="2">Nbre de réponses</th>';
	echo '	</tr>';

	echo '  <tr>';
	echo '     <td>';
	echo "         <input type='hidden' name='who' value='".$who."'/>";
	echo "         <input type='hidden' name='lab' value='".$lab."'/>";
	echo "         <input type='text'   name='term' size='20' value='$term'/>";
	echo '     </td>';
	echo '     <td>';

	$tab = array('All','Title','Publisher','Contributor','Description','Date','Type','Format','Identifier','Source','Language','Relation','Coverage','Rights','Creator','Subject');
	reset($tab);
	echo '<select name="field">';
	while ( list($clef, $valeur) = each($tab) ) {
		$selected = "";
		if ($valeur == $field) {
			$selected = " selected='selected'";
		}
		echo "<option".$selected.">$valeur</option>";
	}
	echo '</select>';

	echo '</td><td>';

	$tab = array('near','exact','contains');
	$tabLabels = array('near','exact match','word list');
	reset($tab);
	echo '<select name="mode">';
	while ( list($clef, $valeur) = each($tab) ) {
		$selected = "";
		if ($valeur == $mode) {
			$selected = " selected='selected'";
		}
		$label = $tabLabels[$clef];
		echo "<option value='".$valeur."'".$selected.">$label</option>";
	}
	echo '</select>';

	echo '</td><td>';

	try {
		$db = new eXist("guest","guest","http://crdo.risc.cnrs.fr/exist/services/Query?wsdl");

		# Connect
		$db->connect() or die ($db->getError());

		$query = "declare namespace dc='http://purl.org/dc/elements/1.1/';
			declare namespace dcterms='http://purl.org/dc/terms/';
			declare namespace crdo='http://crdo.risc.cnrs.fr/schemas/';
			declare namespace olac='http://www.language-archives.org/OLAC/1.1/';
			<select name='langue'>
			<option value='*'>All</option>
			{
			for \$lg in distinct-values(collection('/db/catalog')//crdo:item[crdo:collection='".$lab."']".$condDepositor."/dc:subject/text())
			order by \$lg
			return
			if (\$lg='".$langue."')
				then <option selected='selected'>{\$lg}</option>
				else <option>{\$lg}</option>
			}</select>";

		# XQuery execution
		$db->setHighlight(FALSE);
		$result = $db->xquery($query) or die ($db->getError());

		# Show results
		if ( !empty($result["XML"]) )
		print ($result["XML"]);

		$db->disconnect() or die ($db->getError());
	} catch( Exception $e ) {
		die($e);
	}

	echo '</td><td>';

	$tab = array('15','30','50','100');
	reset($tab);
	echo '<nobr><select name="howmany">';
	while ( list($clef, $valeur) = each($tab) ) {
		$selected = "";
		if ($valeur == $howmany) {
			$selected = " selected='selected'";
		}
		echo "<option".$selected.">$valeur</option>";
	}
	echo '</select>';
	echo '<input type="submit" value="Valider"/></nobr>';

	echo '     </td>';
	echo '	</tr>';
	echo '</table>';
	echo '</form>';

	if(isset($_POST["term"]) && ($term!='')) {
		$condLangue = '';
		if ($langue != '*') {
			$condLangue = "[dc:subject = '".$langue."']";
		}
		$f = ".";
		if ($field == "Publisher") {
			$f = "dc:publisher";
		} else if ($field == "Contributor") {
			$f = "dc:contributor|dc:contributor/@olac:code";
		} else if ($field == "Title") {
			$f = "dc:title|dcterms:alternative";
		} else if ($field == "Description") {
			$f = "dc:description|dcterms:tableOfContents|dcterms:abstract";
		} else if ($field == "Subject") {
			$f = "dc:subject|dc:subject/@olac:code";
		} else if ($field == "Date") {
			$f = "dc:date|dcterms:created|dcterms:valid|dcterms:available|dcterms:issued|dcterms:modified|dcterms:dateAccepted|dcterms:dateCopyrighted|dcterms:dateSubmitted";
		} else if ($field == "Type") {
			$f = "dc:type|dc:type/@olac:code";
		} else if ($field == "Format") {
			$f = "dc:format|dcterms:medium|dcterms:extent";
		} else if ($field == "Identifier") {
			$f = "dc:identifier|dcterms:bibliographicCitation";
		} else if ($field == "Source") {
			$f = "dc:source";
		} else if ($field == "Language") {
			$f = "dc:language|dc:language/@olac:code";
		} else if ($field == "Relation") {
			$f = "dc:relation|dcterms:isVersionOf|dcterms:hasVersion|dcterms:isReplacedBy|dcterms:replaces|dcterms:isRequiredBy|dcterms:requires|dcterms:isPartOf|dcterms:hasPart|dcterms:isReferencedBy|dcterms:references|dcterms:isFormatOf|dcterms:hasFormat|dcterms:conformsTo";
		} else if ($field == "Coverage") {
			$f = "dc:coverage|dcterms:spatial|dcterms:temporal";
		} else if ($field == "Rights") {
			$f = "dc:rights|dcterms:accessRights";
		} else if ($field == "Creator") {
			$f = "dc:creator|dc:creator/@olac:code";
		} else {
			$f = ".|dc:contributor/@olac:code|dc:subject/@olac:code|dc:type/@olac:code|dc:language/@olac:code|dc:creator/@olac:code";
		}

		$expr = "";
		$t = "'".$term."'";
		if($t != '*') {
			if ($mode == 'near') {
			    $expr = "[near(".$f.",".$t.")]";
			} else if ($mode == 'exact') {
			    $expr = "[".$f."=".$t."]";
			} else {
			    $expr = "[".$f." &= ".$t."]";
			}
		}



		try {
			$db = new eXist("guest","guest","http://crdo.risc.cnrs.fr/exist/services/Query?wsdl");

			# Connect
			$db->connect() or die ($db->getError());

				$query = "declare namespace dc='http://purl.org/dc/elements/1.1/';
					declare namespace dcterms='http://purl.org/dc/terms/';
					declare namespace crdo='http://crdo.risc.cnrs.fr/schemas/';
					declare namespace olac='http://www.language-archives.org/OLAC/1.1/';
					<span>{
						let \$hits   := for \$s in collection('/db/catalog')//crdo:item[contains(dcterms:medium,'audio')][not(dcterms:accessRights &amp;= 'protected')][crdo:collection='".$lab."']".$condDepositor.$condLangue.$expr."  order by \$s/dc:subject/text(), \$s/dc:title/text() return \$s,
						    \$n      := count(\$hits),
						    \$next   := ".$from." + ".$howmany.",
						    \$prev   := ".$from." - ".$howmany.",
						    \$items  := subsequence(\$hits, ".$from.", ".$howmany.")
						return <center>
							<table class='resultats'>
								<tr>
									<td style='text-align:left;'>{
										if (".$from." gt 1)
										then
											<form action='' method='POST'>
												<input type='hidden' name='lab'     value='".$lab."'/>
												<input type='hidden' name='from'    value='{\$prev}'/>
												<input type='hidden' name='term'    value='".$term."'/>
												<input type='hidden' name='mode'    value='".$mode."'/>
												<input type='hidden' name='langue'  value='".$langue."'/>
												<input type='hidden' name='howmany' value='".$howmany."'/>
												<input type='submit' value='Précédents'/>
											</form>
										else ''
									}</td>
									<td colspan='2'></td>
									<td style='text-align:right;'>{
										if (\$n gt ".$from."+".$howmany.")
										then
											<form action='' method='POST'>
												<input type='hidden' name='lab'     value='".$lab."'/>
												<input type='hidden' name='from'    value='{\$next}'/>
												<input type='hidden' name='term'    value='".$term."'/>
												<input type='hidden' name='mode'    value='".$mode."'/>
												<input type='hidden' name='langue'  value='".$langue."'/>
												<input type='hidden' name='howmany' value='".$howmany."'/>
												<input type='submit' value='Suivants'/>
											</form>
										else ''
									}</td>
								</tr>
								<tr>
									<td colspan='4' style='text-align:center;'>Affichage des enregistrements ".$from." à {".$from." + count(\$items) - 1} (total: {\$n} enregistrements trouvés)</td>
								</tr>
							</table>
							<table  class='resultats'>
								<tr>
									 <th><div align='center'><font size='-1'></font></div></th>
									 <th><div align='center'><font size='-1'></font></div></th>
									 <th><div align='center'><font size='-1'></font></div></th>
									 <th><div align='center'><font size='-1'></font></div></th>
									 <th><div align='center'><font size='-1'>TITRE</font></div></th>
									 <th><div align='center'><font size='-1'></font></div></th>
									 <th><div align='center'><font size='-1'>CHERCHEUR(S)</font></div></th>
								</tr>
								{ for \$p in 1 to count(\$items)
								  let \$item        := item-at(\$items, \$p),
									  \$id          := \$item/@crdo:id,
									  \$maxTitre    := 35,
									  \$maxResearch := 25,
									  \$titre       := \$item/dc:title/text(),
									  \$tit         := if (string-length(\$titre) > \$maxTitre) then concat(substring(\$titre, 0, \$maxTitre), '...') else \$titre,
									  \$class       := if (\$p mod 2 eq 0) then '' else 'odd',
									  \$transcr     := \$item/dcterms:isRequiredBy,
									  \$researchers := \$item/dc:contributor[@olac:code='researcher'],
									  \$research    := if (count(\$researchers) > 1) then concat(\$researchers[1], ' et...') else \$researchers,
									  \$href        := if (\$transcr) then concat('show_text.php?id=', \$id) else \$item/dc:identifier
								  return
									<tr class='{\$class}'>
										<td valign='top'>
											<a
											href='{\$href}'
											title ='Ecouter ce texte'
											target='_blank'
											
											><img class='sansBordure' src='../../images/icones/h_parleur.gif'/></a>
										</td>
										<td valign='top'> </td>
										<td valign='top'>
											<a
											href='show_metadatas.php?id={\$id}'
											title='A propos de {\$titre}'
											target='_blank'
											onClick='window.open(this.href, \"popupLink\",\"width=640,height=400,scrollbars=yes,resizable=yes\",1);return false'
											><img class='sansBordure' src='../../images/icones/info.gif'/></a>
										</td>
										<td valign='top'> </td>
										<td valign='top'  title='{\$titre}'>{\$tit}</td>
										<td valign='top'> </td>
										<td valign='top'  title='{\$researchers}'>{\$research}</td>
									</tr>
								}
							</table>
						</center>
					}</span>";




			# XQuery execution
			$db->setHighlight(FALSE);
			$result = $db->xquery($query) or die ($db->getError());

			# Show results
			if ( !empty($result["XML"]) )
			print ($result["XML"]);

			$db->disconnect() or die ($db->getError());
		} catch( Exception $e ) {
			die($e);
		}
	}

?>
