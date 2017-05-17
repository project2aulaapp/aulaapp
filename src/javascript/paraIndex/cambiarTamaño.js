document.addEventListener('DOMContentLoaded',
function(){
	
	var contenedor = document.getElementById("contenedor");

	console.log(contenedor.children);

	var primerHijo = contenedor.children[0];
	var segundoHijoID = contenedor.children[1].id;

	if(segundoHijoID == "menuWeb"){
		contenedor.style.flexDirection = 'column-reverse';
	}else{
		contenedor.style.flexDirection = 'column';
	}
},false);