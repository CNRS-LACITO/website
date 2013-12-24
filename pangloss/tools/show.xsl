<?xml version="1.0" encoding="utf-8"?>

<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns:crdo="http://crdo.risc.cnrs.fr/schemas/"
    xmlns:annot="http://crdo.risc.fr/schemas/annotation"
  	xmlns:php="http://php.net/xsl" 
    xmlns:xi="http://www.w3.org/2001/XInclude"
	xmlns:xalan="http://xml.apache.org/xalan"
	exclude-result-prefixes="xi xalan"
	version="1.0">
	
	<xsl:output method="xml" indent="yes"/>
	<!--<xsl:output method="html"
doctype-system="about:legacy-compat" indent="yes"/>-->
		<xsl:param name="titre" select="''"/>
		<xsl:param name="url_sound_wav" select="''"/>
        <xsl:param name="url_sound_mp3" select="''"/>
        <xsl:param name="navigator" select="''"/>
        <xsl:param name="chercheurs" select="''"/>
        <xsl:param name="locuteurs" select="''"/>
		<xsl:param name="lg" select="''"/>
        <xsl:param name="lg_rect" select="''"/>
        <xsl:param name="lg_code" select="''"/>
        <xsl:param name="id" select="''"/>
        <xsl:param name="date_sound" select="''"/>
        <xsl:param name="date_text" select="''"/>
		<xsl:param name="url_text" select="''"/>
		<xsl:param name="aff_lang" select="'*'"/>
        <xsl:param name="mediaUrl"  select="''"/>
	<!-- ******************************************************** -->

	<xsl:template match="/">
    	
        <!--<div align="right">
    		<a target="_blank" href="citation.php?titre={$titre}&amp;lg={$lg}&amp;chercheurs={$chercheurs}&amp;url_text={$url_text}&amp;url_sound={$url_sound_wav}&amp;id={$id}&amp;date_sound={$date_sound}&amp;date_text={$date_text}" onClick="window.open(this.href,'popupLink','width=600,height=100,scrollbars=yes,resizable=yes',1);return false">Citer la ressource</a>
    	</div>-->
		
     
            
               <div style="margin-left: 5px;">
			<h2 align="center"><strong style="font-size:16px">  <xsl:value-of select="$titre"/>    <a href="show_metadatas.php?id={$id}&amp;lg={$lg}"
                target="_blank"
                onClick="window.open(this.href,'popup_lang1','width=500,height=300,scrollbars=yes,resizable=yes',1);return false"><img class="sansBordure" src="../../images/icones/info_marron.jpg"/> </a>
                 </strong>
         </h2>
         </div>  
            <br/>
         
            
           			 <xsl:choose>
						<xsl:when test="$aff_lang='fr'">
                        	Langue : 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Language : 
                        </xsl:otherwise>
                    </xsl:choose>
				
                
                <a href="../../ALC/Languages/{$lg_rect}_popup.htm" target="_blank" onClick="window.open(this.href,'popupLink','width=400,height=400,scrollbars=yes,resizable=yes',pop.focus(),1);return false"><xsl:value-of select="$lg"/></a>
                
               <br/> 
	<br/>
   <table width="100%">
    <tr>
    <td align="left">
    <xsl:if test="$chercheurs"> 
    				<xsl:choose>
						<xsl:when test="$aff_lang='fr'">
                        	Chercheur(s) : 
                        </xsl:when>
                        <xsl:otherwise> 
                    		Researcher(s) : 
                        </xsl:otherwise>
                    </xsl:choose>
    
    				<span style="color:#333"><xsl:value-of select="$chercheurs"/></span>
    </xsl:if>
    </td>
    <td align="right">
    <xsl:if test="$locuteurs">
   				 <xsl:choose>
   				 <xsl:when test="$aff_lang='fr'">
                        	Locuteur(s) :
                        </xsl:when>
                        <xsl:otherwise> 
                    		Speaker(s) :
                        </xsl:otherwise>
                    </xsl:choose> 
                    
                    <span style="color:#333"><xsl:value-of select="$locuteurs"/></span>
    </xsl:if>
    </td>
    </tr>   
    </table>
   
			
            
                   
         <br />

        
       <div>
           <xsl:call-template name="player-audio_html5">
				<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
                 <xsl:with-param name="mediaUrl_mp3" select="$url_sound_mp3"/>
			</xsl:call-template>
								
		</div>
	</xsl:template>
    
    
    
    <xsl:template name="player-audio_html5">
<xsl:param name="mediaUrl_wav" select="''"/>
<xsl:param name="mediaUrl_mp3" select="''"/>
	
		<audio controls="controls" id="player" name="player">
			<source src="{$mediaUrl_mp3}" type="audio/mpeg"/>
			<source src="{$mediaUrl_wav}" type="audio/x-wav"/>
			Your browser does not support the audio tag 
		</audio>
      
	
		
</xsl:template>
    
    
<!--<audio controls> 		
			<source src="mediaUrl_wav" />;
			</audio>-->
  <!--<xsl:template name="player-audio_html5">
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
		<script type="text/javascript" src="html5PlayerManager.js">.</script>
		
</xsl:template>-->





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