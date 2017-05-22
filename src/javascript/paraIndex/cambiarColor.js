document.addEventListener('DOMContentLoaded',
function(){
	
	var contenedor = document.getElementById("contenedor");

	var header = document.getElementsByTagName("header")[0];
	var aside = contenedor.children[2];

	if(aside == "aside"){
		header.style.background = 'linear-gradient(#de9c6a,#f0d9a5);';
	}else{
		header.style.background = 'linear-gradient(#de9c6a,#ebe8c8);';
	}
},false);