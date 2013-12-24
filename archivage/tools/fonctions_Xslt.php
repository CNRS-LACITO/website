
<?php

	function SuppAccents($chaine){
		$tofind = "¿¡¬√ƒ≈‡·‚„‰Â“”‘’÷ÿÚÛÙıˆ¯»… ÀËÈÍÎ«ÁÃÕŒœÏÌÓÔŸ⁄€‹˘˙˚¸ˇ—Ò";
		$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
		return(strtr($chaine,$tofind,$replac));
	}
	/*function SuppMajuscules($chaine){
		return(strtolower  ($chaine));
	}*/

	// retourne la liste des textes
	// la langue est spÈcifiÈe par son nom : $lg
	function Xslt_list_texts($lg) {
			  $xp = new XsltProcessor();
			  $xsl = new DomDocument;
			  $xsl->load('http://lacito.vjf.cnrs.fr/archivage/tools/listRsc.xsl');
			  
			  $xp->setParameter('', 'lg', $lg);

			  // import the XSL styelsheet into the XSLT process
			  $xp->importStylesheet($xsl);


			// create a DOM document and load the XML datat
			  $xml_doc = new DomDocument;
			  $xml_doc->load('http://lacito.vjf.cnrs.fr/archivage/tools/metadata_lacito.xml');
			  


			  // transform the XML into HTML using the XSL file
			  if ($html = $xp->transformToXML($xml_doc)) {
				  echo $html;
			  } else {
				  trigger_error('XSL transformation failed.', E_USER_ERROR);
			  }
	}

	// retourne les metadata du texte selectionnÈ
	// le texte interlinÈaire est spÈcifiÈ par son id : $id
	function Xslt_sound_metadata($id) {
			  $xp = new XsltProcessor();
			  $xsl = new DomDocument;
			  $xsl->load('http://lacito.vjf.cnrs.fr/archivage/tools/metaRsc.xsl');
		
			 
			  $xp->setParameter('', 'id', $id);
			  $xp->importStylesheet($xsl);
			  $xml_doc = new DomDocument;
			  $xml_doc->load('http://lacito.vjf.cnrs.fr/archivage/tools/metadata_lacito.xml');
			 
			  if ($html = $xp->transformToXML($xml_doc)) {
				  echo $html;
			  } else {
				  trigger_error('XSL transformation failed.', E_USER_ERROR);
			  }
	 }
	 
	 // retourne les metadata du texte selectionnÈ
	// le texte interlinÈaire est spÈcifiÈ par son id : $id
	function Xslt_text_metadata($id) {
			  $xp = new XsltProcessor();
			  $xsl = new DomDocument;
			  $xsl->load('http://lacito.vjf.cnrs.fr/archivage/tools/metaRsc_text.xsl');
		
		
			  $xp->setParameter('', 'id', $id);
			  $xp->importStylesheet($xsl);
			  $xml_doc = new DomDocument;
			  $xml_doc->load('http://lacito.vjf.cnrs.fr/archivage/tools/metadata_lacito.xml');
			
			  if ($html = $xp->transformToXML($xml_doc)) {
				  echo $html;
			  } else {
				  trigger_error('XSL transformation failed.', E_USER_ERROR);
			  }
	 }


	// retourne le texte selectionnÈ
	// le texte interlinÈaire est spÈcifiÈ par son id : $id
	function Xslt_show_text($id) {
			  $xp = new XsltProcessor();
			  $xsl = new DomDocument;
			  $xsl->load('http://lacito.vjf.cnrs.fr/archivage/tools/textRsc.xsl');
			
			  $xp->setParameter('', 'id', $id);
			  $xp->importStylesheet($xsl);
			  $xml_doc = new DomDocument;
			  $xml_doc->load('http://lacito.vjf.cnrs.fr/archivage/tools/metadata_lacito.xml');
			
			
			  if ($res = $xp->transformToXML($xml_doc)) {
					$XML = new SimpleXMLElement($res);
					$url_text  = $XML->url_text;
					$url_sound = $XML->url_sound;
					$titre     = $XML->titre;
					$lg        = $XML->lg;
					$xp->setParameter('', 'titre',     $titre);
					$xp->setParameter('', 'lg',        $lg);
					$xp->setParameter('', 'url_sound', $url_sound);
					$xp->setParameter('', 'url_text',  $url_text);
					
					
					$xsl = new DomDocument;
					$xsl->load('http://lacito.vjf.cnrs.fr/archivage/tools/showText.xsl');
					
					$xp->importStylesheet($xsl);
					$xml_doc = new DomDocument;
					$xml_doc->load($url_text);
				  if ($html = $xp->transformToXML($xml_doc)) {
					  echo $html;
				  } else {
					  trigger_error('XSL transformation failed.', E_USER_ERROR);
				  }
			  } else {
				  trigger_error('XSL transformation failed.', E_USER_ERROR);
			  }
	 }

	// retourne un moteur de recherche sur les metadonnees
	function Xslt_moteur_de_recherche() {
		$term       = isset($_POST["term"])    ? ($_POST["term"])    : "";
		$field      = isset($_POST["field"])   ? ($_POST["field"])   : "All";
		$mode       = isset($_POST["mode"])    ? ($_POST["mode"])    : "contains";
		$langue     = isset($_POST["langue"])  ? ($_POST["langue"])  : "*";
		$howmany    = isset($_POST["howmany"]) ? ($_POST["howmany"]) : "15";
		$from       = isset($_POST["from"])    ? ($_POST["from"])    : "1";

		$xml = simplexml_load_file('http://lacito.vjf.cnrs.fr/archivage/tools/metadata_lacito.xml');
		$xml->registerXPathNamespace('dc',      'http://purl.org/dc/elements/1.1/');
		$xml->registerXPathNamespace('xsi',     'http://www.w3.org/2001/XMLSchema-instance');
		$xml->registerXPathNamespace('oai',     'http://www.openarchives.org/OAI/2.0/');
		$xml->registerXPathNamespace('dcterms', 'http://purl.org/dc/terms/');
		$xml->registerXPathNamespace('olac',    'http://www.language-archives.org/OLAC/1.1/');


		echo '<form action="" method="POST">';
		echo '<table class="crdo-request">';
		echo '	<tr>';
		echo '		<th>Terme recherch√©</th>';
		echo '		<th>Cat√©gorie</th>';
		echo '		<th>Op√©rateur</th>';
		echo '		<th>Langue</th>';
		echo '		<th> </th>';
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
		$tab = array('contains','exact');
		$tabLabels = array('contains','exact match');
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
		echo '<select name="langue">';
		echo '<option value="*">All</option>';
		$result = $xml->xpath('//dc:subject[@xsi:type="olac:language"]');
		$distincts = array_unique($result);
		sort($distincts);
		while(list( , $node) = each($distincts)) {
			if ($node == $langue) {
				echo '<option selected="selected">',$node, '</option>';
			} else {
				echo '<option>',$node,'</option>';
			}
		}
		echo '</select>';
		echo '</td><td>';
		echo '<input type="submit" value="Valider"/></nobr>';
		echo '     </td>';
		echo '	</tr>';
		echo '</table>';
		echo '</form>';

		if(isset($_POST["term"])) {
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
			$min = "'abcdefghijklmnopqrstuvwxyz'";
			$maj = "'ABCDEFGHIJKLMNOPQRSTUVWXYZ'";
			$t = "'".strtr($term, $maj, $min)."'";
			$delim = '|';
			if($t != '') {
				$tab = explode($delim, $f);
				$i = 1;
				$expr = "[";
				foreach($tab as $e) {
					if ($i > 1) {
						$expr .= " or ";
					}
					if ($mode == 'exact') {
						$expr .= "(translate($e, $maj, $min) = $t)";
					} else {
						$expr .= "(contains(translate($e, $maj, $min), $t))";
					}
					$i++;
				}
				$expr .= "]";
			}
			// echo '//oai:record[.//olac:olac[contains(dcterms:medium,"audio")][not (contains(dcterms:accessRights, "protected"))]'.$condLangue.$expr.']';



			$result = $xml->xpath('//oai:record[.//olac:olac[contains(dcterms:medium,"audio")][not (contains(dcterms:accessRights, "protected"))]'.$condLangue.$expr.']');
			echo '<center><table class="resultats">';
			$i = 0;
			while(list( , $node) = each($result)) {
			 	if (1&$i) {
			 		echo '<tr>';
			 	} else {
			 		echo '<tr class="odd">';
			 	}


				echo '<td valign="top">';
				$tit         = Xpath_first_value($node, '//dc:title');
				$titre       = $tit;
				if (strlen($tit) > 35) {
					$tit = substr($tit, 0, 34) . '...';
				}
				$id          = substr(Xpath_first_value($node, '//header/identifier'), strlen('oai:crdo.risc.cnrs.fr:')-1);
				$href        = Xpath_first_value($node, '//dc:identifier');
				$has_transcr = Xpath_first_value($node, '//dcterms:isRequiredBy');
				if ($has_transcr) {
					$href = 'show_text.php?id='.$id;
				}
				$contributor = Xpath_values($node, '//dc:contributor[@olac:code="researcher"]');
				$contributors = $contributor;
				if (strlen($contributor) > 25) {
					$contributor = substr($contributor, 0, 24) . '...';
				}

				echo '<a href="', $href,'" title ="Ecouter ce texte" target="_blank" onClick="flvFPW1(this.href, \'popupLink\',\'width=640,height=400,scrollbars=yes,resizable=yes\',1);return document.MM_returnValue">';
				echo '<img class="sansBordure" src="../../images/icones/h_parleur.gif"/></a>';
				echo '</td>';
				echo '<td valign="top"> </td>';

				echo '<td valign="top">';
				echo '<a href="show_metadatas.php?id=',$id,'" title="A propos de ',$titre,'" target="_blank" onClick="flvFPW1(this.href, \'popupLink\',\'width=640,height=400,scrollbars=yes,resizable=yes\',1);return document.MM_returnValue">';
				echo '<img class="sansBordure" src="../../images/icones/info.gif"/></a>';
				echo '</td>';
				echo '<td valign="top"> </td>';

				echo "<td title='$titre'>$tit</td>";
				echo "<td title='$contributors'>$contributor</td>";
				echo '</tr>';
				$i++;
			}
			echo '</table></center>';
		} else {
			echo 'pas de requete';
		}



	}

	function Xpath_first_value($node, $xpath) {
		$x = simplexml_load_string($node->asXML());
		$x->registerXPathNamespace('dc',      'http://purl.org/dc/elements/1.1/');
		$x->registerXPathNamespace('xsi',     'http://www.w3.org/2001/XMLSchema-instance');
		$x->registerXPathNamespace('oai',     'http://www.openarchives.org/OAI/2.0/');
		$x->registerXPathNamespace('dcterms', 'http://purl.org/dc/terms/');
		$x->registerXPathNamespace('olac',    'http://www.language-archives.org/OLAC/1.1/');
		$xx = $x->xpath($xpath);
		while(list( , $n) = each($xx)) {
			return $n;
		}
	}
	function Xpath_values($node, $xpath) {
		$x = simplexml_load_string($node->asXML());
		$x->registerXPathNamespace('dc',      'http://purl.org/dc/elements/1.1/');
		$x->registerXPathNamespace('xsi',     'http://www.w3.org/2001/XMLSchema-instance');
		$x->registerXPathNamespace('oai',     'http://www.openarchives.org/OAI/2.0/');
		$x->registerXPathNamespace('dcterms', 'http://purl.org/dc/terms/');
		$x->registerXPathNamespace('olac',    'http://www.language-archives.org/OLAC/1.1/');
		$xx = $x->xpath($xpath);
		$result = "";
		while(list( , $n) = each($xx)) {
			$result .= "$n ";
		}
		return $result;
	}

?>
