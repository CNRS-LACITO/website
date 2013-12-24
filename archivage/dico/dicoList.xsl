<?xml version="1.0" encoding="iso-8859-1"?> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
		xmlns:java="http://xml.apache.org/xslt/java"
		xmlns:xlink="http://www.w3.org/1999/xlink"
		exclude-result-prefixes="xlink java"
		version="1.0">

<xsl:output method="html" indent="yes" encoding="iso-8859-1"/>

<xsl:template match="/">
			<UL>
					<xsl:sort select="number(java:mysort.mysortvalue(string(form/pron[@type='headword']), string('2')))" data-type="number"/>
					<xsl:apply-templates select="."/>
<xsl:template match="entry">
			<xsl:attribute name="href">dico.htm#<xsl:value-of select="translate(@id,'ELMNOYZVW','fgjxv08')"/></xsl:attribute>
			<nobr><xsl:apply-templates select="form/pron[@type='headword']"/></nobr>
	</LI>
<xsl:template match="foreign">
</xsl:stylesheet>