document.addEventListener('DOMContentLoaded',
function(){
	
	var contenedor = document.getElementById("contenedor");

	var label = contenedor.children[1];
	var aside = contenedor.children[2];
	var ul = aside.children[0].className;

	if(ul == "menu__list"){
		label.style.display = 'inline';
	}else{
		label.style.display = 'none';
	}


},false);