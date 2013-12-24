<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet 
	xmlns:oai="http://www.openarchives.org/OAI/2.0/"
	xmlns:dcterms="http://purl.org/dc/terms/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:olac="http://www.language-archives.org/OLAC/1.1/"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:php="http://php.net/xsl" 
    exclude-result-prefixes="oai dcterms dc olac xsi"
	version='1.0'>
		
	<xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
	
	<xsl:param name="id" select="'*'"/>
    <xsl:param name="lg" select="'*'"/>
    
	<xsl:variable name="total_id"><xsl:text>oai:crdo.vjf.cnrs.fr:</xsl:text><xsl:value-of select="$id"/></xsl:variable>
   
	

<!-- ******************************************************** -->
<xsl:template match="/"><link rel="stylesheet" type="text/css" href="http://lacito.vjf.cnrs.fr/archivage/tools/LacitoStyle.css"/>

	<xsl:for-each select=".//oai:ListRecords/oai:record[oai:header/oai:identifier = $total_id]/oai:metadata/olac:olac">
		<table class="meta">	
			<tr><td class="rubrique" colspan="2"></td></tr>
			<xsl:call-template name="title"/>
			<xsl:call-template name="langue"/>
            <xsl:call-template name="identifier_Text"/> 
			<xsl:call-template name="date"/>		
			<xsl:call-template name="contributor"/>
			<xsl:call-template name="description"/>
			<xsl:call-template name="coverage"/>
			<xsl:call-template name="coordGeo"/>
			<xsl:call-template name="error"/>
			<xsl:call-template name="rights"/>		
			<tr height="10px"></tr>	
		</table>	
	</xsl:for-each>
</xsl:template>

<!-- 
 ********************************************************
 *** General Description                              ***
 ********************************************************
 -->
 
<!--  normalement le titre est suppose unique mais on ne sais jamais
      Les titres alternatifs peuvent etre plusieurs dans des langues diverses -->
<xsl:template name="title">
	<xsl:if test="dc:title">
		<h2 align="center"><strong style="font-size:16px"> <xsl:apply-templates select="dc:title[1]"/></strong></h2>
	</xsl:if>
</xsl:template>

<xsl:template name="langue">

	<tr>
		<td class="descripteur">Langue / Language: </td>
		<td class="valeur">
			<xsl:for-each select="dc:subject[@xsi:type='olac:language']">
				<!--<a href="http://lacito.vjf.cnrs.fr/ALC/Languages/{$lg}_popup.htm"><xsl:apply-templates select="."/></a>-->
                <a href="http://lacito.vjf.cnrs.fr/ALC/Languages/{$lg}_popup.htm"
                target="_blank"
                onClick="window.open(this.href,'popup_lang','width=500,height=300,scrollbars=yes,resizable=yes',1);return false">
                <xsl:apply-templates select="."/></a>
			</xsl:for-each>
		</td>
	</tr>
	<tr><td></td></tr>
	<tr><td></td></tr>
</xsl:template>

<!-- les date peuvent aussi etre des modified available created dateAccepted dateCopyrighted dateSubmitted issued valid -->
<xsl:template name="date">
	<xsl:if test="(dcterms:created)">
		<tr>
			<td class="descripteur">Enregistré en / Recorded in: </td>
			<td class="valeur">
				<xsl:for-each select="dcterms:created">
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"><br/></xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>


<!--  affichage de la duree  -->
<xsl:template name="extent">
	<xsl:if test="dcterms:extent">

		<xsl:for-each select="dcterms:extent">
			(<xsl:apply-templates select="."/>)
		<xsl:if test="position()!=last()"><br/></xsl:if>
		</xsl:for-each>
		
	</xsl:if>
</xsl:template>

<xsl:template name="contributor">
	<!--<xsl:if test="dc:contributor[@olac:code='researcher']|dc:contributor[@olac:code='speaker']|dc:contributor[@olac:code='depositor']|dc:contributor[@olac:code='interviewer']">-->
    <xsl:if test="dc:contributor">
		<tr>
			<td class="descripteur">Participant(s):</td>
			<td class="valeur">
				<!--<xsl:for-each select="dc:contributor[@olac:code='researcher']|dc:contributor[@olac:code='speaker']|dc:contributor[@olac:code='depositor']|dc:contributor[@olac:code='interviewer']">-->
                <xsl:for-each select="dc:contributor">
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"><br/></xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>

<!-- les descriptions peuvent aussi etre des abstract et des tableOfContents -->
<xsl:template name="description">
	<xsl:if test="(dc:description) or (dcterms:abstract) or (dcterms:tableOfContents)">
		<tr>
			<td class="descripteur">Description(s):</td>
			<td class="valeur">
				<xsl:for-each select="dc:description|dcterms:abstract|dcterms:tableOfContents">
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"><br/></xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>	
	</xsl:if>
</xsl:template>

<!-- les coverage peuvent aussi etre des spatial et des temporal -->
<xsl:template name="coverage">
	<xsl:if test="(dc:coverage) or (dcterms:spatial[not(@xsi:type)]) or (dcterms:temporal)">
		<tr>
			<td class="descripteur">Lieu / place:</td>
			<td class="valeur">
				<xsl:for-each select="dc:coverage|dcterms:spatial[not(@xsi:type)]|dcterms:temporal">
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()">; </xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>

<xsl:template name="coordGeo">
	<xsl:choose>
		<xsl:when test="dcterms:spatial[@xsi:type='dcterms:Point']">
			<tr>
			<td class="descripteur"></td>
			<td class="valeur">
			<xsl:for-each select="dcterms:spatial[@xsi:type='dcterms:Point'][1]">
			
				<xsl:variable name="content"><xsl:value-of select="translate(.,' ','')"/></xsl:variable>
				<xsl:variable name="east1"><xsl:value-of select="substring-after($content,'east=')"/></xsl:variable>
				<xsl:variable name="east">
					<xsl:choose>
						<xsl:when test="contains($east1, ';')">
							<xsl:value-of select="substring-before($east1,';')"/>
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="$east1"/>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:variable>
				<xsl:variable name="north1"><xsl:value-of select="substring-after($content,'north=')"/></xsl:variable>
				<xsl:variable name="north">
					<xsl:choose>
						<xsl:when test="contains($north1, ';')">
							<xsl:value-of select="substring-before($north1,';')"/>
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="$north1"/>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:variable>
				<span>
					<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA6qqIGIzzm66FKOMoO6XtaBTow1JDc9bEDFAJIfZIA_Io33cCEBSs1pR8UT0Iis7_aL0Rli1hVWFfiw"
					  type="text/javascript">//</script>

				<!--	<script type="text/javascript">
					function load() &#x7b;
					  if (GBrowserIsCompatible()) &#x7b;
						var map = new GMap2(document.getElementById("map"));
						map.addControl(new GSmallMapControl());
						map.addControl(new GMapTypeControl());
						map.setCenter(new GLatLng("<xsl:value-of select="$north"/>", "<xsl:value-of select="$east"/>"), 7);
						var marker = new GMarker(new GLatLng("<xsl:value-of select="$north"/>", "<xsl:value-of select="$east"/>"));
						map.addOverlay(marker);
						map.setMapType(G_HYBRID_TYPE);

					  &#x7d;
					&#x7d;
					</script>-->
				  <div>
					<div id="map" style="width: 500px; height: 320px">x</div>
				  </div>
				</span>		
		  	</xsl:for-each>
		  	<br/><br/>
			</td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		</xsl:when>
		<xsl:otherwise>
		<!--	<script type="text/javascript">
			function load() &#x7b;
			&#x7d;
			function GUnload() &#x7b;
			&#x7d;
			</script>-->
		</xsl:otherwise>
	</xsl:choose>
</xsl:template>

<xsl:template name="identifier_Text">
	<tr>
		<td class="descripteur">Fichier(s) source audio / Recording(s): </td>
		<td class="valeur">
			<xsl:choose>
            	<xsl:when test="contains(dc:identifier,'_22km')">
            
                    <xsl:if test="dcterms:isFormatOf">
                   	<xsl:for-each select="dcterms:isFormatOf">
                   		 <xsl:if test="contains(.,'.wav')">
                    			 Version <b>originale</b> :<xsl:apply-templates select="."/>
                    			<br/>
                    		</xsl:if>
                    		<xsl:if test="contains(.,'_44k.mp3')">
                    			Version dégradée <b>MP3/44Khz</b> :<xsl:apply-templates select="."/>
                   				 <br/>
                   			 </xsl:if>
                    </xsl:for-each>
                     </xsl:if>
              		Version dégradée <b>Wav/22Khz</b> : <xsl:apply-templates select="dc:identifier"/>
            	</xsl:when>
            <xsl:otherwise>
            Version originale : <xsl:apply-templates select="dc:identifier"/>
            </xsl:otherwise>
            </xsl:choose>
		</td>
	</tr>
	<tr><td></td></tr>
	<tr><td></td></tr>

<!--<xsl:for-each select="dc:description|dcterms:abstract|dcterms:tableOfContents">
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"><br/></xsl:if>
				</xsl:for-each>-->





<!--<xsl:variable name="total_id"><xsl:text>oai:crdo.vjf.cnrs.fr:</xsl:text><xsl:value-of select="$id"/></xsl:variable>
	<xsl:for-each select=".//oai:ListRecords/oai:record[oai:header/oai:identifier = $total_id]/oai:metadata/olac:olac">-->


<!--<xsl:variable name="id_t"><xsl:value-of select="ancestor::dcterms:isRequiredBy, 'oai:crdo.vjf.cnrs.fr:')"/></xsl:variable>-->

 
    
	<xsl:for-each select="dcterms:isRequiredBy">
  
				<xsl:variable name="id_other"><xsl:value-of select="."/></xsl:variable>
                <xsl:variable name="id_other_short"><xsl:value-of select="substring-after($id_other,'oai:crdo.vjf.cnrs.fr:')"/></xsl:variable>
			
            
            <xsl:choose>
            <xsl:when test="contains($id_other_short, '_IMG')">
		<tr>
			<td class="descripteur">Fichier PDF / PDF file:
            
            <a	href="show_metadatas_text.php?id={$id_other_short}&amp;lg={$lg}"
					target="_blank"
					onClick="window.open(this.href,'popup','width=640,height=400,scrollbars=yes,resizable=yes',1);return false">
						<img class="sansBordure" src="../../images/icones/info.gif"/>
					</a>
            :
            </td>
			<td class="valeur">
				<xsl:variable name="isRequiredBy"><xsl:value-of select="."/></xsl:variable>
				<xsl:apply-templates select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $isRequiredBy]/oai:metadata/olac:olac/dc:identifier"/>
                
			</td>
		</tr>
        </xsl:when>
         <xsl:when test="contains($id_other_short, '_EGG')">
		<tr>
			<td class="descripteur">Fichier EGG (électroglottographie) / EGG file (electroglottography):
            
            <a	href="show_metadatas_text.php?id={$id_other_short}&amp;lg={$lg}"
					target="_blank"
					onClick="window.open(this.href,'popup','width=640,height=400,scrollbars=yes,resizable=yes',1);return false">
						<img class="sansBordure" src="../../images/icones/info.gif"/>
					</a>
            :
            </td>
			<td class="valeur">
				<xsl:variable name="isRequiredBy"><xsl:value-of select="."/></xsl:variable>
				<xsl:apply-templates select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $isRequiredBy]/oai:metadata/olac:olac/dc:identifier"/>
                
			</td>
		</tr>
        </xsl:when>
        
        <xsl:otherwise>
		<tr>
			<td class="descripteur">Fichier XML d'annotations / XML text annotations:
            
            <a	href="show_metadatas_text.php?id={$id_other_short}&amp;lg={$lg}"
					target="_blank"
					onClick="window.open(this.href,'popup','width=640,height=400,scrollbars=yes,resizable=yes',1);return false">
						<img class="sansBordure" src="../../images/icones/info.gif"/>
					</a>
            :
            </td>
			<td class="valeur">
				<xsl:variable name="isRequiredBy"><xsl:value-of select="."/></xsl:variable>
				<xsl:apply-templates select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $isRequiredBy]/oai:metadata/olac:olac/dc:identifier"/>
                
			</td>
		</tr>
        
        </xsl:otherwise>
        </xsl:choose>
		<tr><td></td></tr>
		<tr><td></td></tr>
        <tr><td></td></tr>
        
	</xsl:for-each>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    
</xsl:template>

<xsl:template name="error">
	<xsl:if test="//error">
		<tr>
			<td class="descripteur"></td>
			<td class="valeur">
				<xsl:for-each select="//error">
					<i>(<xsl:apply-templates select="."/>)</i>
					<xsl:if test="position()!=last()"><br/></xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>

<xsl:template name="rights">
	<xsl:if test="(dc:rights|dcterms:accessRights)">
		<tr>
			<td class="descripteur">Rights:</td>
			<td class="valeur">
				<xsl:for-each select="dc:rights|dcterms:accessRights"> 
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"><br/></xsl:if>
				</xsl:for-each>
			</td>
			</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>

<!-- 
 ********************************************************
 *** encoding schemes                                 ***
 ********************************************************
-->
<xsl:template match="*">
	<xsl:variable name="content"><xsl:value-of select="normalize-space(.)"/></xsl:variable>
	<xsl:choose>
		<xsl:when test="@xsi:type='dcterms:URI'">
			<xsl:choose>
				<xsl:when test="starts-with($content,'oai:crdo.vjf.cnrs.fr:')">
					<a href="./{substring-after($content,'oai:crdo.vjf.cnrs.fr:')}">
						<xsl:value-of select="'oai:crdo.vjf.cnrs.fr:'"/><xsl:value-of select="substring-after($content,'oai:crdo.vjf.cnrs.fr:')"/>
					</a>
                   
				</xsl:when>
				<xsl:otherwise>
						<xsl:choose>
							<xsl:when test="contains($content, '.wav') or contains($content, '.mp3')">
								<!--<a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/wav.gif"/></a>
								<xsl:for-each select="ancestor::olac:olac">
									<xsl:call-template name="extent"/>
								</xsl:for-each>-->
                                
                                <xsl:choose>
                           			<xsl:when test='contains($content,"EGG")'>
										<a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/egg2.jpg" height="25" width="25"/></a>
										<xsl:for-each select="ancestor::olac:olac">
										<xsl:call-template name="extent"/>
										</xsl:for-each>
									</xsl:when>
                           			<xsl:otherwise>
                                    <xsl:if test="contains($content, '.wav')">
                                        <a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/wav.png"/></a>
                                        </xsl:if>
                                     <xsl:if test="contains($content, '.mp3')">
                                      <a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/mp3.png"/></a>
                                     </xsl:if>
                                    	<xsl:for-each select="ancestor::olac:olac">
                                        <xsl:call-template name="extent"/>
                                    	</xsl:for-each>
                                	</xsl:otherwise>
                                </xsl:choose>
                                
                                
							</xsl:when>
							<xsl:when test="contains($content, '.xml')">
								<a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/xml.png"/></a> 
							</xsl:when>
							<xsl:when test="contains($content, '.pdf')">
								<a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/pdf2.gif"/></a> 
							</xsl:when>
						</xsl:choose>
				</xsl:otherwise>
			</xsl:choose>
		</xsl:when>
		<!-- aujourd'hui on n'a que audio/mpeg audio/x-wav application/pdf text/xml -->
		<xsl:when test="@xsi:type='dcterms:IMT'">
			(IANA MIME Media Type: <xsl:value-of select="$content"/>)
		</xsl:when>
		<xsl:when test="local-name()='extent'">
			<xsl:value-of select="translate($content, 'PTMS', '0::')"/>
		</xsl:when>
		<xsl:otherwise><xsl:value-of select="$content"/></xsl:otherwise>
	</xsl:choose>
	<xsl:choose>
		<xsl:when test="@xsi:type='olac:role'"> 
			(<xsl:value-of select="@olac:code"/>)
		</xsl:when>
	</xsl:choose>
</xsl:template>


</xsl:stylesheet>