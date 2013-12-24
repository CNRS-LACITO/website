<?php
/** fonctions_Xquery.php
 * fonctions Xquery_'NomFonction' qui retournent les requètes xQuery des pages : 'NomFonction'.php
 * philippe - 24-09-06
 */


	function SuppAccents($chaine){

		$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
		$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";

		return(strtr($chaine,$tofind,$replac));
	}

	function lienAide($term){
		echo ("$term
					<a
						href=\"aide.php#$term\"
						target=\"_blank\"
						onClick=\"window.open(this.href,'popupLink','width=640,height=400,scrollbars=yes,resizable=yes',1);return false\">
						<img class=\"sansBordure\" src=\"../../images/icones/aide.gif\"/>
					</a>");
	}


	// retourne l expression Xquery pour l affichage de la liste des textes
	// la langue est spécifiée par son nom : $lg
	function Xquery_list_texts($lg)
	{
		$query ='
		declare namespace crdo="http://crdo.risc.cnrs.fr/schemas/";
		declare namespace dc="http://purl.org/dc/elements/1.1/";
		declare namespace dcterms="http://purl.org/dc/terms/";
		declare namespace xsi="http://www.w3.org/2001/XMLSchema-instance";
		declare namespace olac="http://www.language-archives.org/OLAC/1.1/";
		declare namespace xmldb="http://exist-db.org/xquery/xmldb";

		let $lg := "'.$lg.'",
			$s := collection("/db/catalog")//crdo:item[crdo:collection ="Lacito"][dc:subject[@xsi:type="olac:language"] = $lg][starts-with(dcterms:medium,"audio/x-wav")][not(dcterms:accessRights="Access restricted (password protected)")]
		return
			if (count($s) = 0)
				then <td>Pas de ressources disponibles</td>
				else (
					for $p in 1 to count($s)
					let $item  := item-at($s, $p),
						$class := if ($p mod 2 eq 0) then "" else "odd",
						$id := $item/@crdo:id,
						$researcher := $item/dc:contributor[@olac:code="researcher"],
						$count := count($researcher),
						$title := $item/dc:title[1],
						$sizeTitle := 35,
						$sizeResearcher := 25,
						$Meta:= collection("/db/catalog")//crdo:item[@crdo:id=$id]/dcterms:isRequiredBy,
						$countMeta := count($Meta),
						$href := if ($countMeta = 0) then $item/dc:identifier else concat("show_text.php?id=", $id),
						$result :=
						<tr class="{$class}">
							<td valign="top">
								<a
								href="{$href}"
								title ="Ecouter ce texte"
								target="_blank"
								onClick="window.open(this.href,\'popupLink\',\'width=640,height=400,scrollbars=yes,resizable=yes\',1);return false"
								><img class="sansBordure" src="../../images/icones/h_parleur.gif"/></a>
							</td>
							<td valign="top"> </td>
							<td valign="top">
								<a
								href="show_metadatas.php?id={$id}"
								title="A propos de {$title}"
								target="_blank"
								onClick="window.open(this.href,\'popupLink\',\'width=640,height=400,scrollbars=yes,resizable=yes\',1);return false"><img class="sansBordure" src="../../images/icones/info.gif"/></a>
							</td>
							<td valign="top"> </td>
							{  if (string-length($title) > $sizeTitle)
								then  let $tit := substring($title, 0, $sizeTitle)
								return <td valign="top"  title="{$title}">{$tit} ... </td>
								else  <td valign="top" title="{$title}">{$title}</td>
							}
							<td valign="top"> </td>
							{ if ($count > 1)
							  then let $research := $item/dc:contributor[@olac:code="researcher"][1]
								   return if (string-length($research) > $sizeResearcher)
									 then let $res := substring($research, 0, $sizeResearcher)
											return <td valign="top"  title="{$researcher}">{$res} et... </td>
									 else<td valign="top"  title="{$researcher}">{$research} et ...</td>
							  else  if (string-length($researcher) > $sizeResearcher)
										  then  let $res:= substring($researcher, 0, $sizeResearcher)
											return <td valign="top"  title="{$researcher}">{$res} ... </td>
										  else<td valign="top"  title="{$researcher}">{$researcher}</td>
							}
						</tr>
						return $result
				) ';
		return $query;
	}


	// retourne l'expression Xquery pour l'affichage du texte selectionné
	// le texte interlinéaire est spécifié par son id : $id
	  function Xquery_show_text($id)
	 {
		$query ='
		declare namespace crdo="http://crdo.risc.cnrs.fr/schemas/";
		declare namespace dc="http://purl.org/dc/elements/1.1/";
		declare namespace dcterms="http://purl.org/dc/terms/";
		let  $id_Sound      := "'.$id.'",
			 $Meta:= collection("/db/catalog")//crdo:item[@crdo:id=$id_Sound]/dcterms:isRequiredBy,
			 $countMeta := count($Meta)
				return 	if ($countMeta=0)
						then <metadata><error>Cet enregistrement ne poss&#xE8;de pas de transcription</error></metadata>
						else
							for $M in $Meta
								let 	 $id_Meta := substring-after($M,"oai:crdo.vjf.cnrs.fr:"),
										 $text_url:= collection("/db/catalog")//crdo:item[@crdo:id = $id_Meta]/dc:identifier,
										 $path	  := substring-after($text_url, "http://crdo.risc.cnrs.fr/exist/crdo"),
										 $item	  := document(concat("/db/corpus",$path)),
										 $param   := <parameters><param name="now" value="{current-time()}"/></parameters>,
										 $audio_meta := collection("/db/catalog")//crdo:item[@crdo:id = $id_Sound],
										 $result  := <text><metadata>{$audio_meta}</metadata>{
										let 	$text_meta := collection("/db/catalog")//crdo:item[@crdo:id = $id_Meta]
												return <metadata>{$id_Meta}{$text_meta}</metadata>
				}
			   <x>{$item}</x>
			   </text>
			return transform:transform($result,"http://lacito.vjf.cnrs.fr/pangloss/tools/show.xsl", $param)
		';
		return $query;
	 }

	// retourne l'expression Xquery pour l'affichage des metadata du texte selectionné
	// le texte interlinéaire est spécifié par son id : $id
	  function Xquery_text_metadata($id)
	 {
		$query ='
		declare namespace crdo="http://crdo.risc.cnrs.fr/schemas/";
		declare namespace dc="http://purl.org/dc/elements/1.1/";
		declare namespace dcterms="http://purl.org/dc/terms/";
		declare namespace xsi="http://www.w3.org/2001/XMLSchema-instance";
		let  $id_Sound      := "'.$id.'",
			 $text_url:= collection("/db/catalog")//crdo:item[@crdo:id = $id_Sound]/dc:identifier,
			 $path	  := substring-after($text_url, "http://crdo.risc.cnrs.fr/exist/crdo"),
			 $item	  := document(concat("/db/corpus",$path), concat("/db",$path)),
			 $param   := <parameters><param name="now" value="{current-time()}"/></parameters>,
			 $audio_meta := collection("/db/catalog")//crdo:item[@crdo:id = $id_Sound],
			 $result  := <text><metadata>{$audio_meta}</metadata>{
					let 	$Meta:= collection("/db/catalog")//crdo:item[@crdo:id=$id_Sound]/dcterms:isRequiredBy,
						$countMeta := count($Meta)
						return 	if ($countMeta=0)
								then <metadata><error>Cet enregistrement ne poss&#xE8;de pas de transcription</error></metadata>
								else
									for $M in $Meta
										let 	$id_Meta := substring-after($M,"oai:crdo.vjf.cnrs.fr:"),
												$text_meta := collection("/db/catalog")//crdo:item[@crdo:id = $id_Meta],
												$coord := $audio_meta/dcterms:spatial[@xsi:type="dcterms:Point"]/text()
												return <metadata>{$id_Meta}{$text_meta}<coord>{$coord}</coord></metadata>
				}
			   {$item}
			   </text>
			return transform:transform($result,"http://lacito.vjf.cnrs.fr/pangloss/tools/meta.xsl", $param)
		';
		return $query;
	 }

	function Xquery_show_MdR($id,$recherche,$niveau,$corpus)
	{
		$query ='

		declare namespace util="http://exist-db.org/xquery/util";
		declare namespace dc="http://purl.org/dc/elements/1.1/";
		declare namespace dcterms="http://purl.org/dc/terms/";
		declare namespace crdo="http://crdo.risc.cnrs.fr/schemas/";
		declare namespace olac="http://www.language-archives.org/OLAC/1.1/";
		declare namespace xsi="http://www.w3.org/2001/XMLSchema-instance";

			let 	$id_sound 	:= "'.$id.'",
				$id		:= substring-before($id_sound, "_SOUND"),
				$recherche 	:= "'.$recherche.'",
				$niveau 	:= "'.$niveau.'",
				$corpus 	:= "'.$corpus.'",
				$param   	:= <parameters><param name="now" value="{current-time()}"/></parameters>,
				$result		:= <text> {

				for $c in $corpus
				return 	if ($c="text")
						then let $listsrc    := collection("/db/catalog/")//crdo:item[crdo:id=$id]
							for $ress in $listsrc
							let $url := replace($ress/dc:identifier/text(), "http://crdo.risc.cnrs.fr/exist/crdo/", "/db/corpus/")
					 		for $r in $recherche
								return 	if ($r="transcription")
										then for $n in $niveau
												 	if ($n="phrase")
													then let $term := document($url)//S[.//FORM &= $term1]
														 <terme>{$term}</terme>
													else
														 	if ($n="mot")
															then let $term := document($url)//W[.//FORM &= $term1]
																 <terme>{$term}</terme>
															else
																 	if ($n="morpheme")
																	then let $term := document($url)//M[.//FORM &= $term1]
																		 <terme>{$term}</terme>
																	else <terme>pas de termes trouvés</terme>


										else
											 	if ($r="traduction")
												then for $n in $niveau
														 	if ($n="phrase")
															then let $term := document($url)//S[.//TRANSL &= $term1]
																 <terme>{$term}</terme>
															else
																 	if ($n="mot")
																	then let $term := document($url)//W[.//TRANSL &= $term1]
											 							 <terme>{$term}</terme>
																	else
																		 	if ($n="morpheme")
																			then let $term := document($url)//M[.//TRANSL &= $term1]
												 								 <terme>{$term}</terme>
																			else <terme>pas de termes trouvés</terme>
												else
													 	if ($r="All")
														then for $n in $niveau
																 	if ($n="phrase")
																	then let $term := document($url)//S[.//TRANSL &= $term1]|document($url)//S[.//FORM &= $term1]
										 									 <terme>{$term}</terme>
																	else
																		 	if ($n="mot")
																			then let $term := document($url)//W[.//TRANSL &= $term1]|document($url)//W[.//FORM &= $term1]
											 										 <terme>{$term}</terme>
																			else
																				 	if ($n="morpheme")
																					then let $term := document($url)//M[.//TRANSL &= $term1]|document($url)//M[.//FORM &= $term1]
												 											 <terme>{$term}</terme>
																					else <terme>pas de termes trouvés</terme>
														else <terme>pas de termes trouvés</terme>

						else
						return 	if ($c="langue")
								then let $listsrc    := collection("/db/catalog/")//crdo:item[crdo:collection = "Lacito"][dc:subject[@xsi:type="olac:language"] = $lg][starts-with(dcterms:medium,"text/xml")][not(dcterms:accessRights="Access restricted (password protected)")]
										for $ress in $listsrc
										let $url := replace($ress/dc:identifier/text(), "http://crdo.risc.cnrs.fr/exist/crdo/", "/db/corpus/")
						 				for $r in $recherche
											return 	if ($r="transcription")
													then for $n in $niveau
														return 	if ($n="phrase")
																then let $term := document($url)//S[.//FORM &= $term1]
									 									 <terme>{$term}</terme>
																else
																	 	if ($n="mot")
																		then let $term := document($url)//W[.//FORM &= $term1]
																				 <terme>{$term}</terme>
																		else
																			 	if ($n="morpheme")
																				then let $term := document($url)//M[.//FORM &= $term1]
																						 <terme>{$term}</terme>
																				else <terme>pas de termes trouvés</terme>


													else
														 	if ($r="traduction")
															then for $n in $niveau
																return 	if ($n="phrase")
																		then let $term := document($url)//S[.//TRANSL &= $term1]
																				 <terme>{$term}</terme>
																		else
																			 	if ($n="mot")
																				then let $term := document($url)//W[.//TRANSL &= $term1]
																						 <terme>{$term}</terme>
																				else
																					 	if ($n="morpheme")
																						then let $term := document($url)//M[.//TRANSL &= $term1]
																								 <terme>{$term}</terme>
																						else <terme>pas de termes trouvés</terme>
															else
																 	if ($r="All")
																	then for $n in $niveau
																		return 	if ($n="phrase")
																				then let $term := document($url)//S[.//TRANSL &= $term1]|document($url)//S[.//FORM &= $term1]
																						 <terme>{$term}</terme>
																				else
																					 	if ($n="mot")
																						then let $term := document($url)//W[.//TRANSL &= $term1]|document($url)//W[.//FORM &= $term1]
																								 <terme>{$term}</terme>
																						else
																							 	if ($n="morpheme")
																								then let $term := document($url)//M[.//TRANSL &= $term1]|document($url)//M[.//FORM &= $term1]
																										 <terme>{$term}</terme>
																								else <terme>pas de termes trouvés</terme>
																	else <terme>pas de termes trouvés</terme>
								else <terme>pas de termes trouvés</terme>
			}
		</text>

		return transform:transform($result,"http://lacito.vjf.cnrs.fr/pangloss/tools/mdr.xsl", $param)
		';

		return $query;
	}



?>
