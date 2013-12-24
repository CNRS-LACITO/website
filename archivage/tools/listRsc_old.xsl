<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet 
	xmlns:oai="http://www.openarchives.org/OAI/2.0/"
	xmlns:dcterms="http://purl.org/dc/terms/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:olac="http://www.language-archives.org/OLAC/1.1/"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	exclude-result-prefixes="oai dcterms dc olac xsi"
	version="1.0">
	
	<xsl:output method="xml" indent="yes" omit-xml-declaration="yes"/>
	
	<xsl:param name="lg" select="'*'"/>
    <xsl:param name="aff_lang" select="'*'"/>
	
	<!-- ******************************************************** -->

	<xsl:variable name="sizeTitle">35</xsl:variable>
	<xsl:variable name="sizeResearcher">25</xsl:variable>
    <xsl:variable name="sizeLocutor">25</xsl:variable>

	<xsl:template match="/"> 
   <!-- <xsl:for-each select=".//oai:record/oai:metadata/olac:olac[contains(dc:subject,$lg)][starts-with(dc:format,'text/xml')][not(dcterms:accessRights='Access restricted (password protected)')]">
    
    </xsl:for-each>-->
   <!-- <xsl:for-each select=".//oai:record/oai:metadata/olac:olac[contains(dc:subject,$lg)][starts-with(dc:format,'application/pdf')][not(dcterms:accessRights='Access restricted (password protected)')]">
    
    </xsl:for-each>-->
		<xsl:for-each select=".//oai:record/oai:metadata/olac:olac[dc:subject=$lg][starts-with(dc:format,'audio')][not(dcterms:accessRights='Access restricted (password protected)')]">
        		<xsl:variable name="countResearchers"><xsl:value-of select="count(dc:contributor[@olac:code='researcher'])"/></xsl:variable>
                <xsl:variable name="countLocutors"><xsl:value-of select="count(dc:contributor[@olac:code='speaker'])"/></xsl:variable>
        		<xsl:variable name="title"><xsl:value-of select="dc:title"/></xsl:variable>
        		<xsl:variable name="researcher"><xsl:value-of select="dc:contributor[@olac:code='researcher'][1]"/></xsl:variable>
                <xsl:variable name="locutor"><xsl:value-of select="dc:contributor[@olac:code='speaker'][1]"/></xsl:variable>
        		<xsl:variable name="researchers">
        			<xsl:for-each select="dc:contributor[@olac:code='researcher']">
        				<xsl:value-of select="."/>
        				<xsl:if test="position()!=last()"><xsl:text>; </xsl:text></xsl:if>
        			</xsl:for-each>
        		</xsl:variable>
               
                <xsl:variable name="locutors">
        			<xsl:for-each select="dc:contributor[@olac:code='speaker']">
        				<xsl:value-of select="."/>
        				<xsl:if test="position()!=last()"><xsl:text>; </xsl:text></xsl:if>
        			</xsl:for-each>
        		</xsl:variable>
        		
                <xsl:variable name="id">
                	<xsl:value-of select="substring-after(ancestor::oai:record/oai:header/oai:identifier, 'oai:crdo.vjf.cnrs.fr:')"/>
                </xsl:variable>
                
                
        		
                
                <xsl:variable name="href">
                    <!--<xsl:choose>
                        <xsl:when test="dcterms:isRequiredBy">
                        
                    <xsl:choose>
						<xsl:when test="$aff_lang='fr'">
                        	show_text.php?id=<xsl:value-of select="$id"/>
                            
                        </xsl:when>
                        <xsl:otherwise> 
                    		show_text_en.php?id=<xsl:value-of select="$id"/>
                        </xsl:otherwise>
                    </xsl:choose>
                    </xsl:when>
					<xsl:otherwise><xsl:value-of select="dc:identifier"/></xsl:otherwise>
				
                </xsl:choose>-->
                <xsl:value-of select="dc:identifier"/>
			</xsl:variable>
           
            
            
            
               
            
           
            
			
			<tr>
				<xsl:if test="(position() mod 2) = 1">
					<xsl:attribute name="class">odd</xsl:attribute>
				</xsl:if>
				<td valign="top">
					<a
					href="{$href}"
					title ="Ecouter"
					target="_blank"
					>
                    
                    <!--
                    onClick="window.open(this.href,'popupLink','width=640,height=400,scrollbars=yes,resizable=yes',1);return false"-->
						<img class="sansBordure" src="../../images/icones/sound1_bleu.jpg"/>
					</a>
				</td>
				
				<td valign="top">

					<a
					href="show_metadatas.php?id={$id}&amp;lg={$lg}"
					title="A propos de {$title}"
					target="_blank"
					onClick="window.open(this.href,'popupLink','width=640,height=400,scrollbars=yes,resizable=yes',1);return false">
						<img class="sansBordure" src="../../images/icones/info_marron.jpg"/>
					</a>
				</td>
                <td valign="top"> </td>
				<td valign="top"> 
                
          
                
             	<xsl:for-each select="dcterms:isRequiredBy">
                    <xsl:variable name="id1">
                    	<xsl:value-of select="$id"/>
                    </xsl:variable>
                    <xsl:variable name="id2">
                    	<xsl:value-of select="substring-after(., 'oai:crdo.vjf.cnrs.fr:')"/>
                    </xsl:variable>
                    
                   	<xsl:choose>
						<xsl:when test="$aff_lang='fr'">
                        	<xsl:if test="contains($id2, 'IMG')">
                             <!-- <a	href="show_other.php?id={$id1}&amp;id_ref={$id2}"
                                    target="_blank"
                                    title="Lire (pdf) et Ecouter"
                                    >
                                    <img class="sansBordure" src="../../images/icones/Txt_Inter_pdf1.jpg"/>
                                </a>-->
                              
                            
                            </xsl:if>
                            <xsl:if test="not(contains($id2, 'IMG'))">
                               <a	href="show_text.php?id={$id1}&amp;id_ref={$id2}"
                                    target="_blank"
                                    title="Lire (texte interlin�aire) et Ecouter"
                                   >
                                    <img class="sansBordure" src="../../images/icones/Txt_Inter_parchemin1.jpg"/>
                                </a>
                            </xsl:if>
                            
                            
                        </xsl:when>
                        <xsl:otherwise> 
                    		<!-- si le fichier qui est requis par le son est une image (pdf)-->
                          <xsl:if test="contains($id2, 'IMG')">
                             <!--  <a	href="show_other_en.php?id={$id1}&amp;id_ref={$id2}"
                                    target="_blank"
                                    title="Read (pdf) end Listen"
                             		>
                                    <img class="sansBordure" src="../../images/icones/Txt_Inter_pdf1.jpg"/>
                                </a>-->
                            </xsl:if>
                            <!-- si le fichier qui est requis est un fichier d'annotation (xml)-->
                            <xsl:if test="not(contains($id2, 'IMG'))">
                               <a	href="show_text_en.php?id={$id1}&amp;id_ref={$id2}"
                                    target="_blank"
                                    title="Read (interninear text) and Listen"
                                   >
                                    <img class="sansBordure" src="../../images/icones/Txt_Inter_parchemin1.jpg"/>
                                </a>
                            </xsl:if>
                        </xsl:otherwise>
                    </xsl:choose>
                               
                </xsl:for-each>
                
                </td>
					<xsl:choose>
						<xsl:when test="string-length($title) &gt; $sizeTitle">
							<td valign="top" title="{$title}"><xsl:value-of select="substring($title, 0, $sizeTitle)"/>...</td>
						</xsl:when>
						<xsl:otherwise>
							<td valign="top" title="{$title}"><xsl:value-of select="$title"/></td>
						</xsl:otherwise>
					</xsl:choose>
				<td valign="top"> </td>
				<td valign="top" title="{$researchers}">
					<xsl:choose>
						<xsl:when test="string-length($researcher) &gt; $sizeResearcher">
							<xsl:value-of select="substring($researcher, 0, $sizeResearcher)"/>...
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="$researcher"/>
						</xsl:otherwise>
					</xsl:choose>
					<xsl:if test="$countResearchers &gt; 1"> et...</xsl:if>
				</td>
                <td valign="top"> </td>
				<td valign="top" title="{$locutors}">
					<xsl:choose>
						<xsl:when test="string-length($locutor) &gt; $sizeLocutor">
							<xsl:value-of select="substring($locutor, 0, $sizeLocutor)"/>...
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="$locutor"/>
						</xsl:otherwise>
					</xsl:choose>
					<xsl:if test="$countLocutors &gt; 1"> et...</xsl:if>
				</td>
			</tr>
		</xsl:for-each>
		<tr><td/></tr>
	</xsl:template>	
	
</xsl:stylesheet>