<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/"
    xmlns:annot="http://crdo.risc.fr/schemas/annotation"
	version="1.0">
	
	<xsl:output method="xml" indent="yes"/>
	
		<xsl:param name="titre" select="''"/>
		<xsl:param name="url_sound" select="''"/>
		<xsl:param name="lg" select="''"/>
		<xsl:param name="url_text" select="''"/>
		
	<!-- ******************************************************** -->

	<xsl:template match="/">
		<script src="showhide.js" type="text/javascript">.</script>
		<div style="margin-left: 5px;">
			<div>Titre: <xsl:value-of select="$titre"/> 
				(Langue: <xsl:value-of select="$lg"/>)
				<span style="text-align:right">
				<a href="http://lacito.archivage.vjf.cnrs.fr:8080/crdo_servlet/myxsl?XML=http://lacito.archivage.vjf.cnrs.fr/archives/null.xml&amp;xmlfile={$url_text}&amp;XSL=http://lacito.archivage.vjf.cnrs.fr/archives/xslt/default.xsl&amp;subject={$lg}&amp;title={$titre}&amp;mediaUrl={$url_sound}">Recherche linguistique</a>
				</span>
			</div>
			<div>Glose <a href="aide.htm#Glose" target="_blank">
				<img class="sansBordure" src="../../images/icones/aide.gif"/>
				</a>: <input checked="checked" name="interlinear" onclick="javascript:showhide(this, 7, 'inline')" type="checkbox"/>
				Traductions: <input checked="checked" name="translation" onclick="javascript:showhide(this, 4, 'block')" type="checkbox"/>
			</div>
			<div>
				<xsl:call-template name="player4qt-audio">
					<xsl:with-param name="mediaUrl" select="$url_sound"/>
				</xsl:call-template>
			</div>
		</div>
		<xsl:apply-templates select=".//annot:TEXT|.//annot:WORDLIST"/>
	</xsl:template>	
	
	
	<xsl:template match="annot:TEXT">
		<table width="100%" border="1"  bordercolor="#993300" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#993300" class="it">
						<tbody>
							<xsl:for-each select="annot:S">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">annot:S<xsl:value-of select="position()"/>
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
											<xsl:if test="((@who) and (not(@who='')) and (not(@who=ancestor::annot:TEXT/annot:S[number(position())-1]/@who)))">
												<span class="speaker">
													<xsl:value-of select="@who"/><xsl:text>: </xsl:text>
												</span>
											</xsl:if>

											<xsl:if test="not(annot:W/annot:FORM) and not(annot:W/annot:M/annot:FORM) and annot:FORM">
												<span class="transcription">
													<xsl:value-of select="annot:FORM"/>
												</span>
											</xsl:if>
										</div>
										<xsl:for-each select="annot:W">
											<table class="word">
												<tbody>
													<tr>
														<td class="word_form">
															<xsl:choose>
																<xsl:when test="annot:M/annot:FORM">
																	<xsl:for-each select="annot:M/annot:FORM">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="annot:FORM">
																	<xsl:value-of select="annot:FORM"/>
																</xsl:when>
															</xsl:choose>
														</td>
													</tr>
													<tr>
														<td class="word_transl">
															<xsl:choose>
																<xsl:when test="annot:M/annot:TRANSL[@xml:lang='en']">
																	<xsl:for-each select="annot:M/annot:TRANSL[@xml:lang='en']">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="annot:M/annot:TRANSL[@xml:lang='fr']">
																	<xsl:for-each select="annot:M/annot:TRANSL[@xml:lang='fr']">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="annot:M/annot:TRANSL">
																	<xsl:for-each select="annot:M/annot:TRANSL[1]">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="annot:TRANSL[@xml:lang='en']">
																	<xsl:value-of select="annot:TRANSL[@xml:lang='en']"/>
																</xsl:when>
																<xsl:when test="annot:TRANSL[@xml:lang='en']">
																	<xsl:value-of select="annot:TRANSL[@xml:lang='fr']"/>
																</xsl:when>
																<xsl:when test="annot:TRANSL">
																	<xsl:value-of select="annot:TRANSL[1]"/>
																</xsl:when>
															</xsl:choose>
														</td>
													</tr>
												</tbody>
											</table>
										</xsl:for-each>
										<br/>
										<xsl:for-each select="annot:TRANSL">
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
	<xsl:template match="annot:WORDLIST">
		<table width="100%" border="1"  bordercolor="#993300" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#993300" class="it">
						<tbody>
							<xsl:for-each select="annot:W">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">annot:S<xsl:value-of select="position()"/></td>
									<td id="{@id}">
										<a href="javascript:boutonStop()">
											<img src="stop.gif" alt="stop"/>
										</a>
										<a href="javascript:playFrom('{@id}')">
											<img src="play.gif" alt="écouter"/>
										</a>
									</td>
									<xsl:for-each select="annot:FORM">
										<xsl:sort select="@kindOf"/>
										<td class="transcription">
											<xsl:value-of select="."/>
										</td>
									</xsl:for-each>
									<xsl:for-each select="annot:TRANSL">
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
			<xsl:for-each select="//annot:TEXT/annot:S|//annot:WORDLIST/annot:W">
	   			"<xsl:value-of select="@id"/>"
	  	 		<xsl:if test="position()!=last()"><xsl:text>,</xsl:text></xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var STARTS = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S/annot:AUDIO|//annot:WORDLIST/annot:W/annot:AUDIO">
	   			"<xsl:value-of select="@start"/>"
	   			<xsl:if test="position()!=last()"><xsl:text>,</xsl:text></xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var ENDS   = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S/annot:AUDIO|//annot:WORDLIST/annot:W/annot:AUDIO">
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