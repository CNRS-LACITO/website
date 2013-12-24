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

	<xsl:param name="id" select="'*'"/>


	<xsl:template match="/">
		<result>
			<xsl:variable name="other_id">
				<xsl:text>oai:crdo.vjf.cnrs.fr:</xsl:text><xsl:value-of select="$id"/>
			</xsl:variable>
			
			<xsl:for-each select="//oai:ListRecords/oai:record[oai:header/oai:identifier = $other_id]/oai:metadata/olac:olac">
				<url><xsl:value-of select="dc:identifier"/></url>
				
			</xsl:for-each>
		</result>
	</xsl:template>

</xsl:stylesheet>