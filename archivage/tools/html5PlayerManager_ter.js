function getplayer(id) {
	var player = document.getElementById(id);
	return player;
}
function boutonStop() {
	var player=getplayer('player');
	player.pause();
	
	//document.write(player.currentTime);
}
function playFrom(id) {
	var i=0;
	
	while ((i<IDS.length) && (IDS[i] != id)) {
		i++;
	}
	var time = STARTS[i];

	var player = getplayer('player');
	if (player) {	
		player.addEventListener("seeked", placement(player,time), true);
		//player.addEventListener("seeked", function() { player.play(); }, true);
		//setposition(id,time);
		//player.addEventListener("timeupdate", timeUpdate, true);  
		if (player.currentTime>=ENDS[i]){
	getplayer('player').pause();
	}
	
	}
}

function placement(player,time){

	//player.load();
	//  player.currentTime ; 

//player.pause();



	
	var player = getplayer('player');
	player.currentTime = time;
	
	player.play();
	dohighlight(time);
	
	//var player = getplayer('player');
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
			} else {
				node.style.backgroundColor="";
				endplay(IDS[i]);
			}
		} else {
			node.style.backgroundColor="";
			endplay(IDS[i]);
		}
	}
}