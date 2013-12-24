var before     = 0;
function getplayer(id) {
	var player = document.getElementById('player');
	return player;
}

function boutonStop() {
	getplayer('player').pause();
	
}


function playOne(start,end) {
	
	var time = start/1000;

	var player = getplayer('player');
	if (player) {	
		player.addEventListener("seeked", function() { player.play(); }, true);
		setposition(id,time);
		player.addEventListener("timeupdate", timeUpdate, true);  
	
	stoptime=end-start+0.1;
	setTimeout(function() { player.pause() }, stoptime);
		if (player.currentTime>=end){
			getplayer('player').pause();
		
			}
	
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