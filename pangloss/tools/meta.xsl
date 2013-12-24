<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="file:///D|/LACITO/DALLITH/source BDD XML/catalog/metadata.xml" --> 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                xmlns:dc="http://purl.org/dc/elements/1.1/"
		xmlns:dcterms="http://purl.org/dc/terms/"
		xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/"
		xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		xmlns:olac="http://www.language-archives.org/OLAC/1.1/"
		xmlns:oai_dc="http://purl.org/dc/elements/1.1/"
		xmlns:oai="http://www.openarchives.org/OAI/2.0/"
		xmlns:xalan="http://xml.apache.org/xalan"
		exclude-result-prefixes="xsi dcterms olac oai_dc oai"
		version="1.0">
		
	<xsl:output method="xml" indent="yes" encoding="UTF-8"/>


<xsl:variable name="lg"><xsl:value-of select="//crdo:item/dc:subject"/></xsl:variable>
<xsl:variable name="title"><xsl:value-of select="//crdo:item/dc:title"/></xsl:variable>
<xsl:variable name="lastupdate"><xsl:value-of select="//metadata/crdo:item[1]/dcterms:modified"/></xsl:variable>

<!-- ******************************************************** -->
<xsl:template match="/">
	<link rel="stylesheet" type="text/css" href="LacitoStyle.css"/>
	<table class="meta">	
		<tr><td class="rubrique" colspan="2"></td></tr>
		<xsl:call-template name="title"/>
		<xsl:call-template name="langue"/>
		<xsl:call-template name="date"/>		
		<xsl:call-template name="contributor"/>
		<xsl:call-template name="description"/>
		<xsl:call-template name="coverage"/>
		<xsl:call-template name="coordGeo"/>
		<xsl:call-template name="identifier_Text"/>
		<xsl:call-template name="error"/>
		<xsl:call-template name="rights"/>		
		<tr height="10px"></tr>		
	</table>	
</xsl:template>

<!-- 
 ********************************************************
 *** General Description                              ***
 ********************************************************
 -->
 
<!--  normalement le titre est suppose unique mais on ne sais jamais
      Les titres alternatifs peuvent etre plusieurs dans des langues diverses -->
<xsl:template name="title">
	<xsl:if test="//crdo:item/oai_dc:title">
		<xsl:for-each select="xalan:distinct(//crdo:item/oai_dc:title)[1]">
			<h2>A propos de "<i><xsl:apply-templates select="."/></i>"</h2>
		</xsl:for-each>
	</xsl:if>
</xsl:template>

<!--  normalement le titre est suppose unique mais on ne sais jamais
      Les titres alternatifs peuvent etre plusieurs dans des langues diverses -->
      
<xsl:template name="langue">
	<xsl:if test="//crdo:item/dc:subject[@xsi:type='olac:language']">
		<tr>
			<td class="descripteur">Langue </td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item/dc:subject[@xsi:type='olac:language'])">
					<xsl:apply-templates select="."/>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>

<!-- les date peuvent aussi etre des modified available created dateAccepted dateCopyrighted dateSubmitted issued valid -->
<xsl:template name="date">
	<xsl:if test="(//crdo:item/dcterms:created)">
		<tr>
			<td class="descripteur">Enregistré en </td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item/dcterms:created)">
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
	<xsl:if test="//crdo:item/dcterms:extent">

		<xsl:for-each select="xalan:distinct(//crdo:item/dcterms:extent)">
			(<xsl:apply-templates select="."/>)
		<xsl:if test="position()!=last()"><br/></xsl:if>
		</xsl:for-each>
		
	</xsl:if>
</xsl:template>

<xsl:template name="contributor">
	<xsl:if test="//crdo:item/oai_dc:contributor[@olac:code='researcher']|//crdo:item/oai_dc:contributor[@olac:code='speaker']|//crdo:item/oai_dc:contributor[@olac:code='performer']|//crdo:item/oai_dc:contributor[@olac:code='depositor']|//crdo:item/oai_dc:contributor[@olac:code='interviewer']">
		<tr>
			<td class="descripteur">Participant(s):</td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item/oai_dc:contributor[@olac:code='researcher']|//crdo:item/oai_dc:contributor[@olac:code='speaker']|//crdo:item/oai_dc:contributor[@olac:code='performer']|//crdo:item/oai_dc:contributor[@olac:code='depositor']|//crdo:item/oai_dc:contributor[@olac:code='interviewer'])">
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
	<xsl:if test="(//crdo:item/oai_dc:description) or (//crdo:item/dcterms:abstract) or (//crdo:item/dcterms:tableOfContents)">
		<tr>
			<td class="descripteur">Description(s):</td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item/oai_dc:description|//crdo:item/dcterms:abstract|//crdo:item/dcterms:tableOfContents)">
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
	<xsl:if test="(//crdo:item/oai_dc:coverage) or (//crdo:item/dcterms:spatial[not(@xsi:type)]) or (//crdo:item/dcterms:temporal)">
		<tr>
			<td class="descripteur">Lieu :</td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item/oai_dc:coverage|//crdo:item/dcterms:spatial[not(@xsi:type)]|//crdo:item/dcterms:temporal)">
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
		<xsl:if test="((//coord=''))">
				<script type="text/javascript">
				function load() &#x7b;
				&#x7d;
				function GUnload() &#x7b;
				&#x7d;
				</script>
		</xsl:if>
		<xsl:if test="(not(//coord=''))">
			<tr>
			<td class="descripteur"></td>
			<td class="valeur">
			<xsl:for-each select="(//coord)[1]">
			
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

					<script type="text/javascript">
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
					</script>
				  <div>
					<div id="map" style="width: 500px; height: 320px">x</div>
				  </div>
				</span>		
		  	</xsl:for-each>
		  	<br/><br/>
			</td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>
		</xsl:if>
</xsl:template>

<xsl:template name="identifier_Text">
	<xsl:if test="(//crdo:item[not(contains(oai_dc:identifier,'.wav'))]/oai_dc:identifier)">
		<tr>
			<td class="descripteur">Fichier(s) source texte: </td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item[not(contains(oai_dc:identifier,'.wav'))]/oai_dc:identifier)">					
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"></xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
	
	<xsl:if test="(//crdo:item[contains(oai_dc:identifier,'.wav')]/oai_dc:identifier)">
		<tr>
			<td class="descripteur">Fichier(s) source audio : </td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item[contains(oai_dc:identifier,'.wav')]/oai_dc:identifier)">
					<xsl:apply-templates select="."/>
					<xsl:if test="position()!=last()"></xsl:if>
				</xsl:for-each>
			</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
	</xsl:if>
</xsl:template>

<xsl:template name="error">
	<xsl:if test="//error">
		<tr>
			<td class="descripteur"></td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//error)">
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
	<xsl:if test="(//crdo:item[contains(dcterms:medium,'audio')]/oai_dc:rights) or (//crdo:item[contains(dcterms:medium,'audio')]/dcterms:accessRights)">
		<tr>
			<td class="descripteur">Rights:</td>
			<td class="valeur">
				<xsl:for-each select="xalan:distinct(//crdo:item[contains(dcterms:medium,'audio')]/oai_dc:rights|//crdo:item[contains(dcterms:medium,'audio')]/dcterms:accessRights)"> 
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
							<xsl:when test="contains($content, '.wav')">
								<a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/wav.gif"/></a><xsl:call-template name="extent"/>							</xsl:when>
							<xsl:when test="contains($content, '.xml')">
								<a target="_blank" href="{$content}"><img class="sansBordure" src="../../images/icones/xml.gif"/></a> 
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
