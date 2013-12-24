<?xml version="1.0" encoding="UTF-8"?>



<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/"
    xmlns:annot="http://crdo.risc.fr/schemas/annotation"
  	xmlns:php="http://php.net/xsl" 
	xmlns:xlink="http://www.w3.org/1999/xlink"
    version="1.0">
    
    
<xsl:output method="xml" encoding="UTF-8" indent="yes" />
	

 
    
		<xsl:param name="titre" select="''"/>
		<xsl:param name="url_sound" select="''"/>
		<xsl:param name="lg" select="''"/>
		<xsl:param name="url_text" select="''"/>
		
	<!-- ******************************************************** -->
 
  
	<xsl:template match="/">
    
  
		<div style="margin-left: 5px;">
			Titre: <xsl:value-of select="$titre"/> 
				(Langue: <xsl:value-of select="$lg"/>)
	
			
         
		</div>
        
        <div>
               
<!--<xsl:call-template name="rtf">

    
        <xsl:text select="php:function('essai')"/>

        </xsl:call-template>-->
        </div>
        
		<xsl:apply-templates select=".//annot:TEXT|.//annot:WORDLIST"/>
	</xsl:template>	
	
	
	<xsl:template match="annot:TEXT">
    
    				<div><script language="php"> echo 'chouette';</script></div>
		
                        <!-- Cree la numerotation des phrases : Si (phrase numero i)-->
							<xsl:for-each select="annot:S">
								

										
										<!--	<xsl:if test="not(annot:W/annot:FORM) and not(annot:W/annot:M/annot:FORM) and annot:FORM">
												<span class="transcription">
													<xsl:value-of select="annot:FORM"/>
												</span>
											</xsl:if>
										-->
                                        
                                       
                                       
                                       
                                       
                                       
                                       
                                            
                                       <!-- cas ou S contient la balise FORM -->
                                        <xsl:if test="annot:FORM">
                                        <div>
                                        <xsl:text> Transcription :  </xsl:text>
                                        <!-- Recuperation de la phrase -->
                                        <xsl:for-each select="annot:FORM">
											
                                            
												<xsl:value-of select="."/>
                                               	<xsl:text> </xsl:text>
											
                                            
										</xsl:for-each>
                                        </div>
                                        </xsl:if>
                                        
                                        
                                        <!-- Cas ou W ou M contiennent la balise FORM et ou S ne contient pas la balise FORM -->
                                        <xsl:if test="not(annot:FORM) and (annot:W/annot:FORM or annot:W/annot:M/annot:FORM)">
                                      	
                                       <div>	
                                                  
                                       <xsl:text> Mots ou Morphemes :  </xsl:text>
                                                    
                                        <!-- Recuperation des mots ou morphemes puis concatenation pour former une phrase --> 
                                        <xsl:for-each select="annot:W">
											
                                           
                                            
														
															<xsl:choose>
																<xsl:when test="annot:M/annot:FORM">
																	<xsl:for-each select="annot:M/annot:FORM">
																		<xsl:value-of select="."/>
                                                                         <xsl:text> </xsl:text>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="annot:FORM">
																	<xsl:value-of select="annot:FORM"/>
                                                                    <xsl:text> </xsl:text>
																</xsl:when>
															</xsl:choose>
														
                                                        
                                                        
                                     
                                          </xsl:for-each>
                                     
                                      </div>
											
                                        </xsl:if>
                                       
                                   
                                       
                                    <!-- Recupere la traduction si il en existe une -->
                                        <xsl:if test="annot:TRANSL">
                                       <div>
                                       <xsl:text> Traduction :  </xsl:text>
                                        <xsl:for-each select="annot:TRANSL">
											
												<xsl:value-of select="."/>
											
                                            
										</xsl:for-each>
                                       </div>
                                        </xsl:if>
                                         
                                        
                                 
										<!-- Recupere les mots avec leur glose -->
                                        <xsl:if test="(annot:W/annot:FORM and annot:W/annot:TRANSL) or (annot:W/annot:M/annot:FORM and annot:W/annot:M/annot:TRANSL) ">
                                        <div>
                                        <xsl:text> Mots et gloses : </xsl:text>	
                                       	<xsl:for-each select="annot:W">
                                       
                                      
											
										
															<xsl:choose>
																<xsl:when test="annot:M/annot:FORM">
																	<xsl:for-each select="annot:M/annot:FORM">
                                                                    	
																		<xsl:value-of select="."/>
                                                                        <xsl:text> </xsl:text>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
																<xsl:when test="annot:FORM">
                                                                
																	<xsl:value-of select="annot:FORM"/>
                                                                    	<xsl:text> </xsl:text>
																</xsl:when>
															</xsl:choose>
                                              	
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
													
													</xsl:for-each>
                                                  </div> 
                                                 
                                        </xsl:if>
                                        
                                        
                                        
                                        
									
							</xsl:for-each>
						
	</xsl:template>
	<!--<xsl:template match="annot:WORDLIST">
		<table width="100%" border="1"  bordercolor="#993300" cellspacing="0" cellpadding="0">
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#993300" class="it">
						<tbody>
							<xsl:for-each select="annot:W">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">W<xsl:value-of select="position()"/></td>
									<td id="{@id}">
									
									</td>
									<xsl:for-each select="annot:FORM">
										<xsl:sort select="@kindOf"/>
										<td class="word_form">
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
	</xsl:template>-->
<!--<xsl:template name="rtf">
coucoucoucou
	 <script language="php">

PHPRtfLite::registerAutoloader();

require '/fpdf17/pdf.php';

$rtf = new PHPRtfLite();
$sect = $rtf->addSection();
$sect->writeText('<i>coucou<b>World</b></i>.', new PHPRtfLite_Font(12), new PHPRtfLite_ParFormat('center'));

$rtf->sendRtf('Test');

echo "croucrou";



  </script>

  </xsl:template>-->

	
</xsl:stylesheet>

   