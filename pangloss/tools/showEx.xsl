<?xml version="1.0" encoding="iso-8859-1"?>

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
		<!--<xsl:param name="url_sound_wav" select="''"/>-->
        <xsl:variable name="url_sound_wav" select="'../dico/audio/DEPOT_SOGHA_22km.wav'"/>
        <xsl:param name="url_sound_mp3" select="''"/>
        <xsl:param name="navigator" select="''"/>
        <xsl:param name="chercheurs" select="''"/>
        <xsl:param name="locuteurs" select="''"/>
		<xsl:param name="lg" select="''"/>
        <xsl:param name="id" select="''"/>
        <xsl:param name="s" select="''"/>
		<xsl:param name="url_text" select="''"/>
		<xsl:param name="aff_lang" select="'*'"/>
        <xsl:param name="mediaUrl"  select="''"/>
	<!-- ******************************************************** -->

	<xsl:template match="/">
    
    
    
		<!--<script src="showhide.js" type="text/javascript">.</script>-->
		<div style="margin-left: 5px;">
			<h2 align="center"><strong style="font-size:16px">  <xsl:value-of select="$titre"/>    <a href="../dico/show_metadatas.php?id={$id}&amp;lg={$lg}"
                target="_blank"
                onClick="window.open(this.href,'popup_lang1','width=500,height=300,scrollbars=yes,resizable=yes',1);return false"><img class="sansBordure" src="../../images/icones/info.gif"/> </a>
                 </strong>
            
            <br/>
            

 </h2>
 </div>

               <div>
               
 <xsl:choose>
    					<xsl:when test="contains($url_sound_wav, 'wav')">
      						 <div>
                             	<xsl:call-template name="player-audio_wav">
									<xsl:with-param name="mediaUrl_wav" select="$url_sound_wav"/>
						 		</xsl:call-template>
     						</div>
    					</xsl:when> 
                    </xsl:choose>
                    
                    </div>    
       
                    
                    <div>
                    <xsl:variable name="start" select="//annot:TEXT/annot:S[contains(@id,$s)]/annot:AUDIO/@start"/>
                    <xsl:variable name="end" select="//annot:TEXT/annot:S[contains(@id,$s)]/annot:AUDIO/@end"/>
                    
<script type="application/javascript">

	  var audio = document.getElementById('player');
	      audio.currentTime += 50;
		  audio.play();

</script>
		
		
                  <xsl:value-of select="$start"/>
                    </div>
                     
                    
 </xsl:template>
  





	<!--<xsl:template name="player-html5_wav">
		<xsl:param name="mediaUrl_wav" select="''"/>
		
		
		
		<AUDIO src="{$mediaUrl_wav}" controls="true"></AUDIO>
       
        <script language="javascript">
					
	

		var audioElement = document.createElement('audio');
audioElement.setAttribute('src', '{$url_sound_wav}');
audioElement.load()
audioElement.addEventListener("load", function() { 
  audioElement.play(); 
  $(".duration span").html(audioElement.duration);
  $(".filename span").html(audioElement.src);
}, true);
audioElement.currentTime=35;
audioElement.play();
		timer = setTimeout("loop()", 250);
					
					</script>
        </xsl:template>-->
       
   <xsl:template name="player-audio_wav">
		<xsl:param name="mediaUrl_wav" select="''"/>
		
	
        
    <audio id="player" src="{$mediaUrl_wav}" preload="auto" controls="controls"></audio>
  
      
      <!-- <embed classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"
                id="QTPlayer"
                src="{$mediaUrl_wav}"
                volume="100"
                enablejavascript="true"
                type="audio/wav"
                height="16"
                width="200"
                style='position:absolute;left:-1000;top:-1000'/>-->


        
        
        
        <script type="text/javascript" src="evtPlayerManager.js">.</script>
		<script type="text/javascript" src="qtPlayerManager.js">.</script>
        </xsl:template>
    
</xsl:stylesheet>