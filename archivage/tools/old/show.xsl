<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
	xmlns:dc="http://purl.org/dc/elements/1.1/" 
	xmlns:dcterms="http://purl.org/dc/terms/" 
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/" version="1.0">
	
	<xsl:output method="xml" indent="yes"/>
	
	<!-- ******************************************************** -->

	<xsl:template match="/">
		<xsl:variable name="objet">
			<xsl:value-of select="//dc:subject[@xsi:type='olac:language'][1]"/>
		</xsl:variable>
		<xsl:variable name="titre">
			<xsl:value-of select="//dc:title[1]"/>
		</xsl:variable>
		<xsl:variable name="audio">
			<xsl:value-of select="//crdo:item[contains(dcterms:medium,'audio')]/dc:identifier"/>
		</xsl:variable>
		<xsl:variable name="texte">
			<xsl:value-of select="//crdo:item[dcterms:medium='text/xml']/dc:identifier"/>
		</xsl:variable>
		<script src="showhide.js" type="text/javascript">.</script>
		<div style="margin-left: 5px;">
			<div>Titre: <xsl:value-of select="$titre"/> 
				(Langue: <xsl:value-of select="$objet"/>)
				<span style="text-align:right">
				<a href="http://lacito.archivage.vjf.cnrs.fr:8080/crdo_servlet/myxsl?XML=http://lacito.archivage.vjf.cnrs.fr/archives/null.xml&amp;xmlfile={$texte}&amp;XSL=http://lacito.archivage.vjf.cnrs.fr/archives/xslt/default.xsl&amp;subject={$objet}&amp;title={$titre}&amp;mediaUrl={$audio}">Recherche linguistique</a>
				</span>
			</div>
			<div>Glose <a href="aide.htm#Glose" target="_blank">
				<img class="sansBordure" src="../../images/icones/aide.gif"/>
				</a>: <input checked="checked" name="interlinear" onclick="javascript:showhide(this, 7, 'inline')" type="checkbox"/>
				Traductions: <input checked="checked" name="translation" onclick="javascript:showhide(this, 4, 'block')" type="checkbox"/>
			</div>
			<div>
				<xsl:call-template name="player4qt-audio">
					<xsl:with-param name="mediaUrl" select="$audio"/>
				</xsl:call-template>
			</div>
		</div>

		<xsl:apply-templates select=".//TEXT|.//WORDLIST"/>
	</xsl:template>	
	
	
	<xsl:template match="TEXT">
		<table width="100%" border="1"  bordercolor="#993300" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#993300" class="it">
						<tbody>
							<xsl:for-each select="S">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">S<xsl:value-of select="position()"/>
									</td>
									<td class="segmentContent" id="{@id}">
										<div>
											<a href="javascript:boutonStop()">
												<img src="stop.gif" alt="stop"/>
											</a>
											<a href="javascript:playFrom('{@id}')">
												<img src="play.gif" alt="écouter"/>
											</a>
											<!-- affiche le nom du locuteur si il y en a -->
											<xsl:if test="((@who) and (not(@who='')) and (not(@who=ancestor::TEXT/S[number(position())-1]/@who)))">
												<span class="speaker">
													<xsl:value-of select="@who"/><xsl:text>: </xsl:text>
												</span>
											</xsl:if>

											<xsl:if test="not(W/FORM) and not(W/M/FORM) and FORM">
												<span class="transcription">
													<xsl:value-of select="FORM"/>
												</span>
											</xsl:if>
										</div>
										<xsl:for-each select="W">
											<table class="word">
												<tbody>
													<tr>
														<td class="word_form">
															<xsl:choose>
																<xsl:when test="M/FORM">
																	<xsl:for-each select="M/FORM">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="FORM">
																	<xsl:value-of select="FORM"/>
																</xsl:when>
															</xsl:choose>
														</td>
													</tr>
													<tr>
														<td class="word_transl">
															<xsl:choose>
																<xsl:when test="M/TRANSL[@xml:lang='en']">
																	<xsl:for-each select="M/TRANSL[@xml:lang='en']">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="M/TRANSL[@xml:lang='fr']">
																	<xsl:for-each select="M/TRANSL[@xml:lang='fr']">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="M/TRANSL">
																	<xsl:for-each select="M/TRANSL[1]">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="TRANSL[@xml:lang='en']">
																	<xsl:value-of select="TRANSL[@xml:lang='en']"/>
																</xsl:when>
																<xsl:when test="TRANSL[@xml:lang='en']">
																	<xsl:value-of select="TRANSL[@xml:lang='fr']"/>
																</xsl:when>
																<xsl:when test="TRANSL">
																	<xsl:value-of select="TRANSL[1]"/>
																</xsl:when>
															</xsl:choose>
														</td>
													</tr>
												</tbody>
											</table>
										</xsl:for-each>
										<br/>
										<xsl:for-each select="TRANSL">
											<div class="translation">
												<xsl:value-of select="."/>
											</div>
										</xsl:for-each>
									</td>
								</tr>
							</xsl:for-each>
						</tbody>
					</table>
				</td>
			</tr>
		</table>
	</xsl:template>
	<xsl:template match="WORDLIST">
		<table width="100%" border="1"  bordercolor="#993300" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#993300" class="it">
						<tbody>
							<xsl:for-each select="W">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">S<xsl:value-of select="position()"/></td>
									<td id="{@id}">
										<a href="javascript:boutonStop()">
											<img src="stop.gif" alt="stop"/>
										</a>
										<a href="javascript:playFrom('{@id}')">
											<img src="play.gif" alt="écouter"/>
										</a>
									</td>
									<xsl:for-each select="FORM">
										<xsl:sort select="@kindOf"/>
										<td class="transcription">
											<xsl:value-of select="."/>
										</td>
									</xsl:for-each>
									<xsl:for-each select="TRANSL">
										<xsl:sort select="@xml:lang"/>
										<td class="translation">
											<xsl:value-of select="."/>
										</td>
									</xsl:for-each>
								</tr>
							</xsl:for-each>
						</tbody>
					</table>
				</td>
			</tr>
		</table>
	</xsl:template>

	<xsl:template name="player4qt-audio">
		<xsl:param name="mediaUrl" select="''"/>
		<script language="Javascript">
			<xsl:text>var IDS    = new Array(</xsl:text>
			<xsl:for-each select="//TEXT/S|//WORDLIST/W">
	   			"<xsl:value-of select="@id"/>"
	  	 		<xsl:if test="position()!=last()"><xsl:text>,</xsl:text></xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var STARTS = new Array(</xsl:text>
			<xsl:for-each select="//TEXT/S/AUDIO|//WORDLIST/W/AUDIO">
	   			"<xsl:value-of select="@start"/>"
	   			<xsl:if test="position()!=last()"><xsl:text>,</xsl:text></xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var ENDS   = new Array(</xsl:text>
			<xsl:for-each select="//TEXT/S/AUDIO|//WORDLIST/W/AUDIO">
	  	 		"<xsl:value-of select="@end"/>"
	  	 		<xsl:if test="position()!=last()"><xsl:text>,</xsl:text></xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
		</script>
		
		<object id="player" width="350" height="16" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
			<param name="src" value="{$mediaUrl}"/>
			<param name="AUTOPLAY" value="false"/>
			<param name="CONTROLLER" value="true"/>
			<embed width="350pt" height="16px" pluginspace="http://www.apple.com/quicktime/download/" controller="true" src="{$mediaUrl}" name="player" autostart="false" enablejavascript="true">
       			</embed>
		</object>
		<span style="margin-left:10px"> Lecture en continu: </span><input id="karaoke" name="karaoke" checked="checked" type="checkbox"/>
		<script type="text/javascript" src="showhide.js">.</script>
		<script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="qtPlayerManager.js">.</script>
	</xsl:template>
	
</xsl:stylesheet>