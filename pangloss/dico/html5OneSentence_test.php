<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">

    var before     = 0;
	var timer		=0;
function getplayer(id) {
	var player = document.getElementById('player');
	return player;
}

function boutonStop() {
	getplayer('player').pause();
	
}

function playOne(start,end) {
	
	clearTimeout(timer);

	var starttime = start*1000/60;
	var endtime = end*1000/60;
	var duration = endtime-starttime;

	var player = getplayer('player');
	if (player) {	
	

   player.addEventListener("play", function() {player.currentTime = start; }, true);
player.addEventListener("canplay", function() {
  player.play();}, true);
 

    /*player.play();*/
/*player.addEventListener("load",player.play(),true);			*/
		/*setposition('player',starttime);*/

		/*player.addEventListener("timeupdate", timeUpdate, true);  */
	
	
	timer=setTimeout(function() { player.pause() }, duration);
/*	stoptime=end-start+0.1;
	setTimeout(function() { player.pause() }, stoptime);
		if (player.currentTime>=end){
			getplayer('player').pause();
		
			}*/
	
	}
		
	
}

function timeUpdate() {  
	var player = getplayer('player');
       dohighlight(player.currentTime);
	  
}  

function setposition(id,time) {
	var player = getplayer('player');
	 
	 player.currentTime = time;
	dohighlight(time);
	 
}
</script>

</head>
<body>

<?php

ini_set('display_errors', 'off'); 

/*echo "coucou\n";*/

/*$file_audio  = $_GET["file_audio"];
$file_xml  = $_GET["file_xml"];*/

$id = $_GET["id_sound"];
$num_s    = $_GET["num_s"];

	
			 $xp = new XsltProcessor();
			  $xsl = new DomDocument;
			 // $xsl->load('http://lacito.vjf.cnrs.fr/pangloss/tools/textRsc.xsl');
			  $xsl->load('textInfo.xsl');
			  
			  $xp->setParameter('', 'id', $id);
			  $xp->importStylesheet($xsl);
			  $xml_doc = new DomDocument;
			 // $xml_doc->load('http://lacito.vjf.cnrs.fr/pangloss/tools/metadata_lacito.xml');
			  $xml_doc->load('../tools/metadata_lacito.xml');
			  
			   if ($res = $xp->transformToXML($xml_doc)) {
					$XML = new SimpleXMLElement($res);
					$file_audio  = $XML->file_audio;
					$file_xml = $XML->file_xml;
			   }



 			  $xp = new XsltProcessor();
			  $xsl = new DomDocument;
			 // $xsl->load('http://lacito.vjf.cnrs.fr/pangloss/tools/textRsc.xsl');
			  $xsl->load('getStartEnd.xsl');
			  
			  $xp->setParameter('', 'num_s', $num_s);
			  $xp->importStylesheet($xsl);
			  $xml_doc = new DomDocument;
			 // $xml_doc->load('http://lacito.vjf.cnrs.fr/pangloss/tools/metadata_lacito.xml');
			  $xml_doc->load($file_xml);
			  
			   if ($res = $xp->transformToXML($xml_doc)) {
					$XML = new SimpleXMLElement($res);
					$start  = $XML->s_start;
					$end = $XML->s_end;
			   }

echo "$file_audio\n";


/*echo"<div>coucou</div>\n";*/
echo"<div>\n";
echo"<p>\n";
echo"<audio controls=\"controls\" id=\"player\" name=\"player\" preload=\"auto\">\n";
			echo"<source src=$file_audio type=\"audio/x-wav\"/>\n";
			echo"Your browser does not support the audio tag \n";
		echo"</audio>\n";
echo"</p>\n";
echo"</div>\n";
 /*echo "<script>playOne($start,$end)</script>\n";*/
 /*playOne($start,$end);*/
echo"<script language=\"Javascript\">playOne($start,$end)</script>\n";

 ?>      




</body>
</html>      
   