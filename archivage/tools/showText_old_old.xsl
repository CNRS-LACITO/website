<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/"
    xmlns:annot="http://crdo.risc.fr/schemas/annotation"
  	xmlns:php="http://php.net/xsl" 
	version="1.0">
	
	<xsl:output method="xml" indent="yes"/>
	
		<xsl:param name="titre" select="''"/>
		<xsl:param name="url_sound_wav" select="''"/>
        <xsl:param name="url_sound_mp3" select="''"/>
        <xsl:param name="navigator" select="''"/>
		<xsl:param name="lg" select="''"/>
        <xsl:param name="id" select="''"/>
		<xsl:param name="url_text" select="''"/>
		<xsl:param name="aff_lang" select="'*'"/>
	<!-- ******************************************************** -->

	<xsl:template match="/">
    
    
    
    
    
		<script src="showhide.js" type="text/javascript">.</script>
		<div style="margin-left: 5px;">
			<h2 align="center"><strong style="font-size:16px">  <xsl:value-of select="$titre"/>    <a href="show_metadatas.php?id={$id}&amp;lg={$lg}"
                target="_blank"
                onClick="window.open(this.href,'popup_lang1','width=500,height=300,scrollbars=yes,resizable=yes',1);return false"><img class="sansBordure" src="../../images/icones/info.gif"/> </a>
                 </strong>
            
            <br/>
            
             <div>
        <a	href="create_rtf.php?id={$id}">Creation fichier RTF</a>
         </div>
            
           			 <xsl:choose>
						<xsl:when test="$aff_lang='fr'">
                        	Langue : 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Language : 
                        </xsl:otherwise>
                    </xsl:choose>
				 <a href="http://lacito.vjf.cnrs.fr/ALC/Languages/{$lg}_popup.htm"
                target="_blank"
                onClick="window.open(this.href,'popup_lang1','width=500,height=300,scrollbars=yes,resizable=yes',1);return false"><xsl:value-of select="$lg"/></a>
                
	
    
			</h2>
                   
         <br />
         
          <xsl:choose>
          		<xsl:when test="contains($navigator, 'Firefox')">
          			<xsl:choose>
    					<xsl:when test="contains($url_sound_mp3, 'mp3')">
      						<div>
								<xsl:call-template name="player-audio_mp3">
									<xsl:with-param name="mediaUrl_mp3" select="$url_sound_mp3"/>
            						<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
								</xsl:call-template>
							</div>
    					</xsl:when>  
    				<xsl:otherwise>
   						 <div>
							<xsl:call-template name="player-audio_wav">
							<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
							</xsl:call-template>
     					</div>
   					</xsl:otherwise>
  					</xsl:choose>
                    </xsl:when> 
    		 	<xsl:otherwise>
    		 		<xsl:call-template name="player-audio_wav">
						<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
					 </xsl:call-template>
    			 </xsl:otherwise>
         		
        </xsl:choose>   
         <div>
               
        <table width="100%">
         <tr>
        
        
           <xsl:if test="annot:TEXT/annot:S/annot:FORM[@kindOf='phono']">
          
           <td>
         <table>
			<tr>
        	<td align="center">
         		<xsl:choose>
         			<xsl:when test="$aff_lang='fr'">
                       	Phonologique
                        </xsl:when>
                        <xsl:otherwise> 
                    		Phonologic
                        </xsl:otherwise>
                    </xsl:choose>
      		</td>
      		</tr>
     		 <tr>
      		<td align="center">
         		<input checked="checked" name="transcription1" onclick="javascript:showhide(this, 14, 'inline')"  type="checkbox"/>
       		</td>
       		</tr>
       </table> 
       </td>
       <td>
       </td>
      		
         	</xsl:if>
            
         	<xsl:if test="annot:TEXT/annot:S/annot:FORM[@kindOf='ortho']">
         
         <td>
        <table>
			<tr>
        	<td align="center">
         		<xsl:choose>
         			<xsl:when test="$aff_lang='fr'">
                       	Orthographique 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Orthographic 
                        </xsl:otherwise>
                    </xsl:choose>
         		
         		</td>
      		</tr>
     		 <tr>
      		<td align="center">
           
         		
         		<input checked="checked" name="transcription2" onclick="javascript:showhide(this, 15, 'inline')"  type="checkbox"/>
         		</td>
             </tr>
             </table>
              </td>
             <td>
      		 </td>
         	</xsl:if>
            
         	<xsl:if test="annot:TEXT/annot:S/annot:FORM[@kindOf='phone']">
        
          <td>
          <table>
			<tr>
        	<td align="center">	
         		<xsl:choose>
         			<xsl:when test="$aff_lang='fr'">
                       	Phonétique 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Phonetic 
                        </xsl:otherwise>
                    </xsl:choose>
         		</td>
      		</tr>
     		 <tr>
      		<td align="center">
         		
         		<input checked="checked" name="transcription3" onclick="javascript:showhide(this, 16, 'inline')"  type="checkbox"/>
         	</td>
             </tr>
             </table>
             </td>
              <td>
      		 </td>
         	</xsl:if>
            
         	<xsl:if test="annot:TEXT/annot:S/annot:FORM[@kindOf='transliter']">
        
         <td>
         <table>
			<tr>
        	<td align="center">	
         		<xsl:choose>
         			<xsl:when test="$aff_lang='fr'">
                       	Translittéré 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Transliterated 
                        </xsl:otherwise>
                    </xsl:choose>
         		</td>
      		</tr>
     		 <tr>
      		<td align="center">
         		
         		<input checked="checked" name="transcription4" onclick="javascript:showhide(this, 17, 'inline')"  type="checkbox"/>
         	</td>
             </tr>
             </table>	
             </td>
              <td>
      		 </td>
         	</xsl:if>
         
         <xsl:if test="annot:TEXT/annot:S/annot:W[annot:TRANSL or annot:M/annot:TRANSL]">
    	
         <td>
         <table>
			<tr>
        	<td align="center">	
            <xsl:choose>
						<xsl:when test="$aff_lang='fr'">
                        	Mot à mot 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Glosses
                        </xsl:otherwise>
                    </xsl:choose>
                </td>
      		</tr>
     		 <tr>
      		<td align="center">    
                    <input checked="checked" name="interlinear" onclick="javascript:showhide(this, 9, 'inline')" type="checkbox"/>
   			</td>
             </tr>
             </table> 
             </td>
              <td>
      		 </td>
   		 </xsl:if>
         
         
		<xsl:if test="annot:TEXT/annot:S/annot:TRANSL[@xml:lang='en']">
    	
         <td>
         <table>
			<tr>
        	<td align="center">	
             <xsl:choose>
					<xsl:when test="$aff_lang='fr'">
                        Trad (EN)
                    </xsl:when>
                    <xsl:otherwise> 
                    	Transl (EN) 
                    </xsl:otherwise>
             </xsl:choose>
    		 
            </td>
      		</tr>
     		 <tr>
      		<td align="center">
            <input checked="checked" name="translation1" onclick="javascript:showhide(this, 6, 'block')"  type="checkbox"/>
   			</td>
             </tr>
             </table>
             </td>
              <td>
      		 </td>
             
   		 </xsl:if>
         
         <xsl:if test="annot:TEXT/annot:S/annot:TRANSL[@xml:lang='fr']">
         
         <td>
         <table>
			<tr>
        	<td align="center">    
            <xsl:choose>
					<xsl:when test="$aff_lang='fr'">
                        Trad (FR)  
                    </xsl:when>
                    <xsl:otherwise> 
                    	Transl (FR) 
                    </xsl:otherwise>
             </xsl:choose>
    		 </td>
      		</tr>
     		 <tr>
      		<td align="center">
            
            <input checked="checked" name="translation1" onclick="javascript:showhide(this, 7, 'block')"  type="checkbox"/>
   			</td>
             </tr>
             </table>
             </td>
              <td>
      		 </td>
   		 </xsl:if>
			
            <xsl:if test="annot:TEXT/annot:S/annot:TRANSL[@xml:lang!='fr' and @xml:lang!='en']">
    	
       
        <td>
         <table>
			<tr>
        	<td align="center">	
    		<xsl:choose>
					<xsl:when test="$aff_lang='fr'">
                        Trad (autre) 
                    </xsl:when>
                    <xsl:otherwise> 
                    	Transl (other)
                    </xsl:otherwise>
             </xsl:choose>
             </td>
      		</tr>
     		 <tr>
      		<td align="center">
              <input checked="checked" name="translation1" onclick="javascript:showhide(this, 8, 'block')"  type="checkbox"/>
   			 </td>
             </tr>
             </table>
             </td>
              <td>
      		 </td>
   		 </xsl:if>
         
             </tr>  
         </table> 
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
                        <!-- Cree la numerotation des phrases : Si (phrase numero i)-->
							<xsl:for-each select="annot:S">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">S<xsl:value-of select="position()"/>
									</td>
									<td class="segmentContent" id="{@id}">
										<xsl:choose>
          									<xsl:when test="contains($navigator, 'Firefox')">
                                            		<xsl:choose>
    													<xsl:when test="contains($url_sound_mp3, 'mp3')">
                                                        </xsl:when>
                                                    	<xsl:otherwise>
                                                        <a href="javascript:boutonStop()">
														<img src="stop.gif" alt="stop"/>
														</a>
														<a href="javascript:playFrom('{@id}')">
														<img src="play.gif" alt="écouter"/>
														</a>
                                                        </xsl:otherwise>
                                                    </xsl:choose>
                                            </xsl:when>
                                            <xsl:otherwise>
											<a href="javascript:boutonStop()">
												<img src="stop.gif" alt="stop"/>
											</a>
											<a href="javascript:playFrom('{@id}')">
												<img src="play.gif" alt="écouter"/>
											</a>
                                            </xsl:otherwise>
                                        </xsl:choose>
											<!-- affiche le nom du locuteur si il y en a -->
											<xsl:if test="((@who) and (not(@who='')) and (not(@who=ancestor::annot:TEXT/annot:S[number(position())-1]/@who)))">
												<span class="speaker">
													<xsl:value-of select="@who"/><xsl:text>: </xsl:text>
												</span>
											</xsl:if>
											
										<!--	<xsl:if test="not(annot:W/annot:FORM) and not(annot:W/annot:M/annot:FORM) and annot:FORM">
												<span class="transcription">
													<xsl:value-of select="annot:FORM"/>
												</span>
											</xsl:if>
										-->
                                        
                                       
                                       
                                       
                                       
                                       <!-- cas ou S contient la balise FORM -->
                                       <!-- <xsl:if test="annot:FORM">-->
                                        
                                        <!-- Recuperation de la phrase -->
                                       <!--<xsl:for-each select="annot:FORM">-->
											<!--<div class="word_sentence">
                                            
												<xsl:value-of select="."/>
                                               
											</div>
                                            <br />
										</xsl:for-each>
                                        
                                        </xsl:if>-->
                                       
                                            
                                       
                                        
                                        <xsl:if test="annot:FORM">
                                        	<div class="word_sentence">
                                        <!-- Recuperation de la phrase -->
                                        <xsl:for-each select="annot:FORM">
                                        	<xsl:choose>
                                        		<xsl:when test="@kindOf">
                                        	<xsl:if test="@kindOf='phono'">
                                        		<div class="transcription1">
                                        		 <xsl:value-of select="."/>
                                        		</div>
                                        		
                                        	</xsl:if>
                                        	<xsl:if test="@kindOf='ortho'">
                                        		<div class="transcription2">
                                        		<xsl:value-of select="."/>
                                        		</div>
                                        		
                                        	</xsl:if>
                                        	<xsl:if test="@kindOf='phone'">
                                        		<div class="transcription3">
                                        		<xsl:value-of select="."/>
                                        		</div>
                                        		
                                        	</xsl:if>
                                        	<xsl:if test="@kindOf='transliter'">
                                        		<div class="transcription4">
                                        		<xsl:value-of select="."/>
                                        		</div>
                                        		
                                        	</xsl:if>
                                        		</xsl:when>
                                        		<xsl:otherwise>
                                        			<xsl:value-of select="."/>
                                        		</xsl:otherwise>
                                        	</xsl:choose>
                                        	
                                        	<br />
                                        </xsl:for-each>
											</div>
                                         
                                        
                                        </xsl:if>
                                        
                                        
                                        
                                        <!-- Cas ou W ou M contiennent la balise FORM et ou S ne contient pas la balise FORM -->
                                        <xsl:if test="not(annot:FORM) and (annot:W/annot:FORM or annot:W/annot:M/annot:FORM)">
                                      	
                                       	
                                                    
                                        <!-- Recuperation des mots ou morphemes puis concatenation pour former une phrase --> 
                                        <xsl:for-each select="annot:W">
											
                                           
                                            
														<div class="word_sentence">
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
														</div>
                                                        
                                                        
                                     
                                          </xsl:for-each>
                                     
                                      
											
                                        </xsl:if>
                                       
                                    <br />
                                     
                                    <xsl:if test="annot:TRANSL">
                                       
                                    <!-- Recupere la traduction si il en existe une -->
                                        
									
                                      
                                      <xsl:for-each select="annot:TRANSL[@xml:lang='en']">
											<div class="translation1">
												<xsl:value-of select="."/>
											</div>
                                          </xsl:for-each> 
                                          
                                          <xsl:for-each select="annot:TRANSL[@xml:lang='fr']">
											<div class="translation2">
												<xsl:value-of select="."/>
											</div>
                                          </xsl:for-each> 
                                    
                                          
                                          <xsl:for-each select="annot:TRANSL[@xml:lang!='fr' and @xml:lang!='en']">
											<div class="translation3">
												<xsl:value-of select="."/>
											</div>
                                        
                                          </xsl:for-each>
                                         
                                        </xsl:if>
                                        
                                        <br />
                                 
										<!-- Recupere les mots avec leur glose -->
                                        <xsl:if test="(annot:W/annot:FORM and annot:W/annot:TRANSL) or (annot:W/annot:M/annot:FORM and annot:W/annot:M/annot:TRANSL) ">
                                        	
                                       	<xsl:for-each select="annot:W">
                                       
                                      
										<!--	<table class="word">
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
																<xsl:when test="annot:TRANSL[@xml:lang='fr']">
																	<xsl:value-of select="annot:TRANSL[@xml:lang='fr']"/>
																</xsl:when>
                                                                <xsl:when test="not(annot:TRANSL[@xml:lang='en']) and not(annot:TRANSL[@xml:lang='fr'])">
																		<xsl:value-of select="annot:TRANSL"/>
																		
																	</xsl:when>
																<xsl:when test="annot:TRANSL">
																	<xsl:value-of select="annot:TRANSL[1]"/>
																</xsl:when>
															</xsl:choose>
													</td>
													</tr>
												</tbody>
											</table>-->
                                            
                                            
                                            
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
																<xsl:when test="annot:M/annot:TRANSL">
																	<xsl:for-each select="annot:M/annot:TRANSL[@xml:lang='fr']">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
                                                      			<xsl:when test="annot:TRANSL[@xml:lang='fr']">
																	<xsl:value-of select="annot:TRANSL[@xml:lang='fr']"/>
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
                                                                <xsl:when test="annot:TRANSL[@xml:lang='en']">
																	<xsl:value-of select="annot:TRANSL[@xml:lang='en']"/>
																</xsl:when>
                                                                </xsl:choose>
                                                      
																
													</td>
													</tr>
                                                     <tr>
                                                   
														<td class="word_transl">
														
															<xsl:choose>
																<xsl:when test="annot:M/annot:TRANSL[@xml:lang!='fr' and @xml:lang!='en']">
																	<xsl:for-each select="annot:M/annot:TRANSL[@xml:lang!='fr' and @xml:lang!='en']">
																		<xsl:value-of select="."/>
																		<xsl:if test="position()!=last()">-</xsl:if>
																	</xsl:for-each>
																</xsl:when>
                                                                <xsl:when test="annot:TRANSL[@xml:lang!='fr' and @xml:lang!='en']">
																	<xsl:value-of select="annot:TRANSL[@xml:lang!='fr' and @xml:lang!='en']"/>
																</xsl:when>
                                                                </xsl:choose>
                                                      
																
													</td>
													</tr>
												</tbody>
											</table>
                                            
                                            
                                            
                                            
												
													</xsl:for-each>
                                                   
                                                 
                                        </xsl:if>
                                        
                                        
                                        
                                        
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
                       <!-- <th>
                        <xsl:for-each select="annot:W/annot:TRANSL[@xml:lang]">
                        <tr><xsl:value-of select="."/></tr>
                        </xsl:for-each>
                        </th>-->
							<xsl:for-each select="annot:W">
								<tr class="transcriptTable">
									<td class="segmentInfo" width="25">W<xsl:value-of select="position()"/></td>
									<td id="{@id}">
                                    <xsl:choose>
          									<xsl:when test="contains($navigator, 'Firefox')">
                                            		<xsl:choose>
    													<xsl:when test="contains($url_sound_mp3, 'mp3')">
                                                        </xsl:when>
                                                    	<xsl:otherwise>
                                                        <a href="javascript:boutonStop()">
														<img src="stop.gif" alt="stop"/>
														</a>
														<a href="javascript:playFrom('{@id}')">
														<img src="play.gif" alt="écouter"/>
														</a>
                                                        </xsl:otherwise>
                                                    </xsl:choose>
                                            </xsl:when>
                                            <xsl:otherwise>
											<a href="javascript:boutonStop()">
												<img src="stop.gif" alt="stop"/>
											</a>
											<a href="javascript:playFrom('{@id}')">
												<img src="play.gif" alt="écouter"/>
											</a>
                                            </xsl:otherwise>
                                        </xsl:choose>
										
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
	</xsl:template>

	<xsl:template name="player-audio_wav">
		<xsl:param name="mediaUrl_wav" select="''"/>
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
			<param name="src" value="{$mediaUrl_wav}"/>
			<param name="AUTOPLAY" value="false"/>
			<param name="CONTROLLER" value="true"/>
			<embed width="350pt" height="16px" pluginspace="http://www.apple.com/quicktime/download/" controller="true" src="{$mediaUrl_wav}" name="player" autostart="false" enablejavascript="true">
       			</embed>
		</object>
        
     
       <!--<object data="quicktimealt311.exe" width="400" height="18" id="quicktimealt311" name="quicktimealt311">
<param name="src" value="{$mediaUrl_wav}"/>
<embed width="350pt" height="16px" pluginspace="quicktimealt31.exe" controller="true" src="{$mediaUrl_wav}" name="player" autostart="false" enablejavascript="true">
       			</embed>
</object>-->
        <xsl:choose>
		<xsl:when test="$aff_lang='fr'">
                        	<span style="margin-left:10px">Lecture en continu :</span><input id="karaoke" name="karaoke" checked="checked" type="checkbox"/>
                        </xsl:when>
                        <xsl:otherwise> 
                    		<span style="margin-left:10px">Continuous playing:</span><input id="karaoke" name="karaoke" checked="checked" type="checkbox"/>
                        </xsl:otherwise>
                        </xsl:choose>
		<script type="text/javascript" src="showhide.js">.</script>
		<script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="qtPlayerManager.js">.</script>
        
        </xsl:template>
        
        
	<xsl:template name="player-audio_mp3">
		<xsl:param name="mediaUrl_mp3" select="''"/>
        <!--<xsl:param name="mediaUrl_wav" select="''"/>
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
		</script>-->

	<!--<object type="application/x-shockwave-flash"
	data="dewplayer.swf?son={$mediaUrl_mp3}"
	width="350" height="20"> <param name="movie" value="{$mediaUrl_mp3}"/>
	</object>-->
    
   <!-- <object type="application/x-shockwave-flash" data="dewplayer.swf" width="400" height="18" id="dewplayer" name="dewplayer">
<param name="wmode" value="transparent" />
<param name="movie" value="dewplayer.swf" />
<param name="flashvars" value="mp3={$mediaUrl_mp3}&amp;showtime=1" />
</object>-->
     
     <object type="application/x-shockwave-flash" data="dewplayer.swf?mp3={$mediaUrl_mp3}&amp;bgcolor=CCCCCC&amp;volume=100&amp;showtime=1" width="200" height="20">
  <param name="movie" value="dewplayer.swf?mp3={$mediaUrl_mp3}&amp;bgcolor=CCCCCC&amp;volume=100&amp;showtime=1&amp;autoplay=false" />
</object>

    
        
		
		<script type="text/javascript" src="showhide.js">.</script>
		<script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="qtPlayerManager.js">.</script>
	</xsl:template>
    
</xsl:stylesheet>