var before     = 0;

function getplayer(id) {
	var player = document.getElementById(id);
	return player;
}
function boutonStop() {
	getplayer('player').pause();
	
}
function playFrom(id) {
	
	var node = document.getElementById('karaoke');
	if (node && node.checked) {
	
	var i=0;
	while ((i<IDS.length) && (IDS[i] != id)) {
		i++;
	}
	var time = STARTS[i];
	var player = getplayer('player');
	if (player) {	
		//player.addEventListener("seeked", placement(player,time), true);
		player.addEventListener("seeked", function() { player.play(); }, true);
		setposition(id,time);
		player.addEventListener("timeupdate", timeUpdate, true);  
	
	stoptime=ENDS[i]-STARTS[i];
	//setTimeout(function() { player.pause() }, stoptime*1000);
		if (player.currentTime>=ENDS[i]){
			getplayer('player').pause();
		
			}
	
	}
	
	}
	else {
		playOne(id);
	}
}


/*function playFrom(start) {
	
	var time = start;

	var player = getplayer('player');
	if (player) {	
		//player.addEventListener("seeked", placement(player,time), true);
		player.addEventListener("seeked", function() { player.play(); }, true);
		setposition(id,time);
		player.addEventListener("timeupdate", timeUpdate, true);  
	
	
	}
}*/


function playOne(id) {
	var i=0;
	while ((i<IDS.length) && (IDS[i] != id)) {
		i++;
	}
	var time = STARTS[i];

	var player = getplayer('player');
	if (player) {	
		//player.addEventListener("seeked", placement(player,time), true);
		player.addEventListener("seeked", function() { player.play(); }, true);
		setposition(id,time);
		player.addEventListener("timeupdate", timeUpdate, true);  
	
	stoptime=ENDS[i]-STARTS[i]+0.1;
	setTimeout(function() { player.pause() }, stoptime*1000);
		if (player.currentTime>=ENDS[i]){
			getplayer('player').pause();
		
			}
	
	}
		
	
}

function playFrom_W(id) {
	var i=0;
	while ((i<IDS.length) && (IDS[i] != id)) {
		i++;
	}
	var time = STARTS[i];

	var player = getplayer('player');
	if (player) {	
		//player.addEventListener("seeked", placement(player,time), true);
		player.addEventListener("seeked", function() { player.play(); }, true);
		setposition(id,time);
		player.addEventListener("timeupdate", timeUpdate, true);  
	
	stoptime=ENDS[i]-STARTS[i]+0.1;
	setTimeout(function() { player.pause() }, stoptime*1000);
		if (player.currentTime>=ENDS[i]){
			getplayer('player').pause();
		
			}
	
	}
		
	
}

function placement(player,time){

	var player = getplayer('player');
	player.currentTime = time;
	
	player.play();
	//dohighlight(time);
	
    dohighlight(player.currentTime);
	
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

function dohighlight(time) {
	for (var i=0;i<STARTS.length;i++) {
		var node = document.getElementById(IDS[i]);
		if (STARTS[i] < time) {
			if (ENDS[i] > time) {
				//startplay(IDS[i]);
				//if (i+1 <STARTS.length) i = i+1;
			
				node.style.backgroundColor="#D9D9F3";
				var elt = node.getElementsByTagName('a');
					
					
     
     			
								
				if (elt) {
					//elt[elt.length -1].focus();
				
				}
			} 
			else {
				node.style.backgroundColor="";
				
				//player.pause();
				
			}
		} else {
			node.style.backgroundColor="";
			
				//player.pause();
				
		}
		
	}

}