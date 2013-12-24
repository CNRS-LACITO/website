//Javascript Document


function version(){

var url_page=document.URL;
url_length=url_page.length;

if (url_page.substring(url_length-1,url_length)=="/"){
	url_new=url_page+"index_en.htm";
}


if(url_page.indexOf("_en")==-1){
	
	if (url_page.indexOf(".htm")!=-1){
		indexof_htm=url_page.indexOf(".htm")
		url1=url_page.substring(0,indexof_htm);
		url3=url_page.substring(indexof_htm+4,url_length);
		url_new=url1+"_en.htm"+url3;
	}
	if (url_page.indexOf(".html")!=-1){
		indexof_html=url_page.indexOf(".html")
		url1=url_page.substring(0,indexof_html);
		url3=url_page.substring(indexof_html+5,url_length);
		url_new=url1+"_en.html"+url3;
	}
	if (url_page.indexOf(".php")!=-1){
		indexof_php=url_page.indexOf(".php")
		url1=url_page.substring(0,indexof_php);
		url3=url_page.substring(indexof_php+4,url_length);
		url_new=url1+"_en.php"+url3;
	}
	if (url_page == "http://lacito.vjf.cnrs.fr/"){
		
		url_new="http://lacito.vjf.cnrs.fr/index_en.htm";
	}
	
}
else{
	
	if (url_page.indexOf(".htm")!=-1){
		indexof_htm=url_page.indexOf(".htm")
		url1=url_page.substring(0,indexof_htm-3);
		url3=url_page.substring(indexof_htm+4,url_length);
		url_new=url1+".htm"+url3;
	}
	if (url_page.indexOf(".html")!=-1){
		indexof_html=url_page.indexOf(".html")
		url1=url_page.substring(0,indexof_html-3);
		url3=url_page.substring(indexof_html+5,url_length);
		url_new=url1+".html"+url3;
	}
	if (url_page.indexOf(".php")!=-1){
		indexof_php=url_page.indexOf(".php")
		url1=url_page.substring(0,indexof_php-3);
		url3=url_page.substring(indexof_php+4,url_length);
		url_new=url1+".php"+url3;
	}
}

	document.location.href=url_new;

}