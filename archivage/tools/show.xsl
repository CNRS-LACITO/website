<?xml version="1.0" encoding="iso-8859-1"?>

<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/"
    xmlns:annot="http://crdo.risc.fr/schemas/annotation"
  	xmlns:php="http://php.net/xsl" 
	version="1.0">
	
	<xsl:output method="xml" indent="yes"/>
	<!--<xsl:output method="html"
doctype-system="about:legacy-compat" indent="yes"/>-->
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
    
    
    
    
    
		<!--<script src="showhide.js" type="text/javascript">.</script>-->
		<div style="margin-left: 5px;">
			<h2 align="center"><strong style="font-size:16px">  <xsl:value-of select="$titre"/>    <a href="show_metadatas.php?id={$id}&amp;lg={$lg}"
                target="_blank"
                onClick="window.open(this.href,'popup_lang1','width=500,height=300,scrollbars=yes,resizable=yes',1);return false"><img class="sansBordure" src="../../images/icones/info.gif"/> </a>
                 </strong>
            
            <br/>
            
            <!--   <div>
      <a	href="create_rtf.php?id={$id}">Creation fichier RTF</a>
         </div>-->
            
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
         </div>
        <!-- <div>
				   <audio controls> 
  <source src="$url_sound_wav" />
  <p class="warning">Le format *.wav n'est pas pris en charge par votre navigateur</p>
					</audio>
                    
		</div>-->
       
        <!-- <div><xsl:call-template name="player-audio_html5">
						<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
					 </xsl:call-template></div>-->
                     
                     
        <!-- <xsl:choose>
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
        
        </div>  -->
        
        
        
         <div>
        
         <xsl:choose>
         
          		<xsl:when test="contains($navigator, 'Firefox')">
          			<xsl:choose>
    					<xsl:when test="contains($url_sound_wav, 'wav')">
      						 <div>
                             	<xsl:call-template name="player-audio_html5">
									<xsl:with-param name="mediaUrl" select="$url_sound_wav"/>
						 		</xsl:call-template>
     						</div>
    					</xsl:when> 
                    </xsl:choose>
                 </xsl:when>
                 
                 
                 <xsl:when test="contains($navigator, 'Opera')">
          			<xsl:choose>
    					<xsl:when test="contains($url_sound_wav, 'wav')">
      						 <div>
                             	<xsl:call-template name="player-audio_html5">
									<xsl:with-param name="mediaUrl" select="$url_sound_wav"/>
						 		</xsl:call-template>
     						</div>
    					</xsl:when> 
                    </xsl:choose>
                 </xsl:when>
                 
                 
                 <xsl:when test="contains($navigator, 'Chrome')">
          			<xsl:choose>
    					<xsl:when test="contains($url_sound_wav, 'wav')">
      						 <div>
                             	<xsl:call-template name="player-audio_wav">
									<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
						 		</xsl:call-template>
     						</div>
    					</xsl:when> 
                    </xsl:choose>
                 </xsl:when>
                 
                <xsl:when test="contains($navigator, 'Explorer')">
          			<xsl:choose>
    					<xsl:when test="contains($url_sound_mp3, 'mp3')">
      						 <div>
                             	<xsl:call-template name="player-audio_html5">
									<xsl:with-param name="mediaUrl" select="$url_sound_mp3"/>
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
   							<div>
								<xsl:call-template name="player-audio_wav">
									<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
								</xsl:call-template>
							</div>
                            <!--<div>
                             	<xsl:call-template name="player-audio_html5_bis">
									<xsl:with-param name="mediaUrl" select="$url_sound_wav"/>
						 		</xsl:call-template>
     						</div>-->
                            <!--<div>
                             	<xsl:call-template name="player-audio_html5_bis">
									<xsl:with-param name="mediaUrl" select="$url_sound_mp3"/>
					 			</xsl:call-template>
     						</div>-->
   					</xsl:otherwise>
  					
        </xsl:choose>
        
       </div>
       
       

	</xsl:template>
<!--<audio controls> 		
			<source src="mediaUrl_wav" />;
			</audio>-->
  <xsl:template name="player-audio_html5">
<xsl:param name="mediaUrl" select="''"/>
	<audio controls="controls" id="player" name="player" autobuffer="true"> 
  <!-- <audio controls="controls" id="player" name="player">-->
		
        <!--<source src="http://fedora.tge-adonis.fr:8090/fedora/get/CRDO-Paris:235213/DEPOT_record_44k.mp3
" type="audio/mpeg" />-->
        <source src="{$mediaUrl}" />
	</audio>
     
    <script language="Javascript">
	<xsl:text>var audioElement = document.createElement('player');
	audioElement.setAttribute('src', "{$mediaUrl}");
	audioElement.addEventListener("load", function() { 
		audioElement.play()
		$(".duration span").html(audioElement.duration);
		$(".filename span").html(audioElement.src);
	}, true);
	</xsl:text>
	</script>
   
    <script language="Javascript">
			<xsl:text>var IDS    = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S | //annot:WORDLIST/annot:W">
	   			"<xsl:value-of select="@id"/>"
	  	 		<xsl:if test="position()!=last()">
				<xsl:text>,</xsl:text>
				</xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var STARTS = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S/annot:AUDIO | //annot:WORDLIST/annot:W/annot:AUDIO">
	   			"<xsl:value-of select="@start"/>"
	   			<xsl:if test="position()!=last()">
				<xsl:text>,</xsl:text>
				</xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var ENDS   = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S/annot:AUDIO | //annot:WORDLIST/annot:W/annot:AUDIO">
	  	 		"<xsl:value-of select="@end"/>"
	  	 		<xsl:if test="position()!=last()">
				<xsl:text>,</xsl:text>
				</xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
		</script>
        
        
        
        <!--<object id="player" width="350" height="16" classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab">
			<param name="src" value="{$mediaUrl_wav}"/>
			<param name="AUTOPLAY" value="false"/>
			<param name="CONTROLLER" value="true"/>
			<embed width="350pt" height="16px" pluginspace="http://www.apple.com/quicktime/download/" controller="true" src="{$mediaUrl_wav}" name="player" autostart="false" enablejavascript="true">
       			</embed>
		</object>-->
        
<!-- <xsl:choose>
		<xsl:when test="$aff_lang='fr'">
                        	<span style="margin-left:10px">Lecture en continu :</span><input id="karaoke" name="karaoke" checked="checked" type="checkbox"/>
                        </xsl:when>
                        <xsl:otherwise> 
                    		<span style="margin-left:10px">Continuous playing:</span><input id="karaoke" name="karaoke" checked="checked" type="checkbox"/>
                        </xsl:otherwise>
                        </xsl:choose>-->
		<script type="text/javascript" src="showhide.js">.</script>
        <script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="html5PlayerManager.js">.</script>
		
</xsl:template>





<xsl:template name="player-audio_html5_bis">
<xsl:param name="mediaUrl" select="''"/>
	<audio controls="controls" id="player" name="player" autobuffer="true"> 

        <source src="{$mediaUrl}" />
	</audio>
     
    <script language="Javascript">
	<xsl:text>var audioElement = document.createElement('player');
	audioElement.setAttribute('src', "{$mediaUrl}");
	audioElement.addEventListener("load", function() { 
		audioElement.play()
		$(".duration span").html(audioElement.duration);
		$(".filename span").html(audioElement.src);
	}, true);
	</xsl:text>
	</script>
   
    <script language="Javascript">
			<xsl:text>var IDS    = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S | //annot:WORDLIST/annot:W">
	   			"<xsl:value-of select="@id"/>"
	  	 		<xsl:if test="position()!=last()">
				<xsl:text>,</xsl:text>
				</xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var STARTS = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S/annot:AUDIO | //annot:WORDLIST/annot:W/annot:AUDIO">
	   			"<xsl:value-of select="@start"/>"
	   			<xsl:if test="position()!=last()">
				<xsl:text>,</xsl:text>
				</xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
			
			<xsl:text>var ENDS   = new Array(</xsl:text>
			<xsl:for-each select="//annot:TEXT/annot:S/annot:AUDIO | //annot:WORDLIST/annot:W/annot:AUDIO">
	  	 		"<xsl:value-of select="@end"/>"
	  	 		<xsl:if test="position()!=last()">
				<xsl:text>,</xsl:text>
				</xsl:if>
			</xsl:for-each>
			<xsl:text>);</xsl:text>
		</script>
     
		<script type="text/javascript" src="showhide.js">.</script>
        <script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="html5PlayerManager_bis.js">.</script>
		
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
    
</xsl:stylesheet>