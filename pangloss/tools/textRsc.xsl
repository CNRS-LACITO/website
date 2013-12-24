<?xml version="1.0" encoding="utf-8"?>

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

	<xsl:param name="id" select="'*'"/>


	<xsl:template match="/">
		<result>
			<xsl:variable name="sound_id">
				<xsl:text>oai:crdo.vjf.cnrs.fr:</xsl:text><xsl:value-of select="$id"/>
			</xsl:variable>
			
			<xsl:for-each select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $sound_id]/oai:metadata/olac:olac">
				<titre><xsl:value-of select="dc:title[1]"/></titre>
				<lg><xsl:value-of select="dc:subject[@xsi:type='olac:language'][1]"/></lg>
                <lg_code><xsl:value-of select="dc:subject/@olac:code[1]"/></lg_code>
				 
             
             <url_sound_wav><xsl:value-of select="dc:identifier[starts-with(normalize-space(.), 'http://cocoon.tge-adonis.fr/data')][1]"/></url_sound_wav>
             
				<url_sound_mp3><xsl:value-of select="dcterms:isFormatOf[starts-with(normalize-space(.), 'http://cocoon.tge-adonis.fr/data')][1]"/> </url_sound_mp3>
                <date_sound><xsl:value-of select="dcterms:created"/></date_sound>
             
             <xsl:variable name="text_id"><xsl:value-of select="dcterms:isRequiredBy[1]"/></xsl:variable>
             <url_text><xsl:value-of select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $text_id]/oai:metadata/olac:olac/dc:identifier[1]"/></url_text>
             <date_text><xsl:value-of select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $text_id]/oai:metadata/olac:olac/dcterms:created"/></date_text>
             
             <chercheurs>
             		<xsl:for-each select="dc:contributor[@olac:code='researcher']">
        				<xsl:value-of select="."/>
        				<xsl:if test="position()!=last()"><xsl:text>; </xsl:text></xsl:if>
        			</xsl:for-each>
             </chercheurs>
             <locuteurs>
             <xsl:for-each select="dc:contributor[@olac:code='speaker']|dc:contributor[@olac:code='performer']">
        				<xsl:value-of select="."/>
        				<xsl:if test="position()!=last()"><xsl:text>; </xsl:text></xsl:if>
        			</xsl:for-each>
             </locuteurs>
             
           
				
				
                
                
			</xsl:for-each>
		</result>
	</xsl:template>

</xsl:stylesheet>