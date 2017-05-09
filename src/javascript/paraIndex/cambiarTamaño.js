document.addEventListener('DOMContentLoaded',
function(){
	
	var contenedor = document.getElementById("contenedor");

	console.log(contenedor.children);

	var primerHijo = contenedor.children[0];
	var segundoHijoID = contenedor.children[1].id;

	if(segundoHijoID == "menuWeb"){
		primerHijo.style.width = '75%';
	}else{
		primerHijo.style.width = '100%';
	}
},false);