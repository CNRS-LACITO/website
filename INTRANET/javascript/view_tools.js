// JavaScript Document


function show_content(id_select){
	if(document.getElementById){
		var select_content= document.getElementById(id_select).value ;
		id_content='infos_'+select_content ;
		var style_content= document.getElementById('infos_COLLOQUE').style ;
			if (select_content=='COLLOQUE') {
				style_content.display = 'inline' ;
			} else {
				style_content.display = 'none' ;
			}
		return true;
	} else {
		return false;
	}
}

function reset_infos(id_frais){
	if(document.getElementById){
		var frais= document.getElementById(id_frais).value ;
		id_content='infos_'+id_frais;
		var style_content= document.getElementById(id_content).style ;
			if (frais==0) {
				style_content.fontStyle = 'normal' ;
				document.getElementById(id_content).innerHTML='z&eacute;ro : pas de frais demand&eacute;s aupr&egrave;s du LACITO' ;
			} else {
				document.getElementById(id_content).value='' ;
				style_content.fontStyle  = 'normal' ;
			}
		return true;
	} else {
		return false;
	}

}