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

	<!-- ******************************************************** -->

	<xsl:template match="/">
    
    <div style="margin-left: 5px;">
			<h2 align="center"><strong style="font-size:16px">  <xsl:value-of select="$titre"/>    <a href="show_metadatas.php?id={$id}&amp;lg={$lg}"
                target="_blank"
                onClick="window.open(this.href,'popup_lang1','width=500,height=300,scrollbars=yes,resizable=yes',1);return false"><img class="sansBordure" src="../../images/icones/info.gif"/> </a>
                 </strong>
            
            <br/>
            
           
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
        
        
         <br/>
            
           
				
        
         </div>
         
    
   
		
       
	</xsl:template>	
	
	
	
	<xsl:template name="player-audio_wav">
		<xsl:param name="mediaUrl_wav" select="''"/>
		
		
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

    
        
		
		
		<script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="qtPlayerManager.js">.</script>
	</xsl:template>
    
</xsl:stylesheet>